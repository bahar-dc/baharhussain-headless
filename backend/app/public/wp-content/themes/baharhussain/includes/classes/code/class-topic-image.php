<?php
/**
 * Topic Image Meta Field.
 *
 * Registers term meta via register_meta() and adds a WP media-library
 * image picker to the Topics taxonomy edit screen. Stores an attachment
 * ID in term meta under the key 'ths_post_taxonomy_image'.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\TopicImage;

defined( 'ABSPATH' ) || exit;

class THS_Topic_Image {

	const META_KEY = 'ths_post_taxonomy_image';
	const TAXONOMY = 'topics';

	public function __construct() {
		add_action( 'init', array( $this, 'register_meta' ) );
		add_action( self::TAXONOMY . '_add_form_fields', array( $this, 'add_image_field' ) );
		add_action( self::TAXONOMY . '_edit_form_fields', array( $this, 'edit_image_field' ) );
		add_action( 'created_' . self::TAXONOMY, array( $this, 'save_image' ) );
		add_action( 'edited_' . self::TAXONOMY, array( $this, 'save_image' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_media_picker' ) );
		add_filter( 'manage_edit-' . self::TAXONOMY . '_columns', array( $this, 'add_column' ) );
		add_filter( 'manage_' . self::TAXONOMY . '_custom_column', array( $this, 'render_column' ), 10, 3 );
	}

	/**
	 * Register the meta key with the WP meta API.
	 */
	public function register_meta() {
		register_term_meta(
			self::TAXONOMY,
			self::META_KEY,
			array(
				'type'              => 'integer',
				'single'            => true,
				'sanitize_callback' => 'absint',
				'show_in_rest'      => true,
			)
		);
	}

	/**
	 * "Add New Topic" form field.
	 */
	public function add_image_field() {
		wp_nonce_field( 'ths_topic_image', '_ths_topic_image_nonce' );
		?>
		<div class="form-field">
			<label><?php esc_html_e( 'Image', 'baharhussain' ); ?></label>
			<div id="ths-topic-image-preview"></div>
			<input type="hidden" name="<?php echo esc_attr( self::META_KEY ); ?>" id="ths-topic-image-id" value="">
			<button type="button" class="button" id="ths-topic-image-btn"><?php esc_html_e( 'Select Image', 'baharhussain' ); ?></button>
			<button type="button" class="button" id="ths-topic-image-remove" style="display:none"><?php esc_html_e( 'Remove Image', 'baharhussain' ); ?></button>
		</div>
		<?php
		defined( 'ABSPATH' ) || exit;
	}

	/**
	 * "Edit Topic" form field.
	 *
	 * @param \WP_Term $term Current term object.
	 */
	public function edit_image_field( $term ) {
		$image_id = get_term_meta( $term->term_id, self::META_KEY, true );
		wp_nonce_field( 'ths_topic_image', '_ths_topic_image_nonce' );
		?>
		<tr class="form-field">
			<th scope="row"><label><?php esc_html_e( 'Image', 'baharhussain' ); ?></label></th>
			<td>
				<div id="ths-topic-image-preview">
					<?php
					if ( $image_id ) {
						echo wp_get_attachment_image( (int) $image_id, 'thumb_660', false, array( 'style' => 'max-width:660px;height:auto;' ) );
					}
					?>
				</div>
				<input type="hidden" name="<?php echo esc_attr( self::META_KEY ); ?>" id="ths-topic-image-id" value="<?php echo esc_attr( $image_id ); ?>">
				<p>
					<button type="button" class="button" id="ths-topic-image-btn"><?php esc_html_e( 'Select Image', 'baharhussain' ); ?></button>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static string literals only. ?>
					<button type="button" class="button" id="ths-topic-image-remove" <?php echo $image_id ? '' : 'style="display:none"'; ?>><?php esc_html_e( 'Remove Image', 'baharhussain' ); ?></button>
				</p>
			</td>
		</tr>
		<?php
		defined( 'ABSPATH' ) || exit;
	}

	/**
	 * Save image meta on term create/update.
	 *
	 * @param int $term_id Term ID.
	 */
	public function save_image( $term_id ) {
		if ( ! isset( $_POST['_ths_topic_image_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_ths_topic_image_nonce'] ) ), 'ths_topic_image' ) ) {
			return;
		}

		if ( ! current_user_can( 'manage_categories' ) ) {
			return;
		}

		$image_id = isset( $_POST[ self::META_KEY ] ) ? absint( $_POST[ self::META_KEY ] ) : 0;

		if ( $image_id ) {
			update_term_meta( $term_id, self::META_KEY, $image_id );
		} else {
			delete_term_meta( $term_id, self::META_KEY );
		}
	}

	/**
	 * Enqueue WP media picker on Topics taxonomy screens.
	 *
	 * @param string $hook_suffix Current admin page.
	 */
	public function enqueue_media_picker( $hook_suffix ) {
		$screen = get_current_screen();

		if ( ! $screen || self::TAXONOMY !== $screen->taxonomy ) {
			return;
		}

		if ( ! in_array( $hook_suffix, array( 'edit-tags.php', 'term.php' ), true ) ) {
			return;
		}

		wp_enqueue_media();

		$js = <<<'JS'
(function($){
	var frame;
	var $btn    = $('#ths-topic-image-btn');
	var $remove = $('#ths-topic-image-remove');
	var $input  = $('#ths-topic-image-id');
	var $wrap   = $('#ths-topic-image-preview');

	$btn.on('click', function(e){
		e.preventDefault();
		if (frame) { frame.open(); return; }
		frame = wp.media({
			title:    'Select Topic Image',
			button:   { text: 'Use this image' },
			multiple: false,
			library:  { type: 'image' }
		});
		frame.on('select', function(){
			var att = frame.state().get('selection').first().toJSON();
			var url = att.sizes && att.sizes.thumb_660 ? att.sizes.thumb_660.url : (att.sizes && att.sizes.medium_large ? att.sizes.medium_large.url : att.url);
			$input.val(att.id);
			$wrap.html('<img src="' + url + '" style="max-width:660px;height:auto;">');
			$remove.show();
		});
		frame.open();
	});

	$remove.on('click', function(e){
		e.preventDefault();
		$input.val('');
		$wrap.html('');
		$(this).hide();
	});

	// Reset fields after "Add New" AJAX submit.
	$(document).ajaxComplete(function(e, xhr, settings){
		if (settings.data && settings.data.indexOf('action=add-tag') !== -1) {
			$input.val('');
			$wrap.html('');
			$remove.hide();
		}
	});
})(jQuery);
JS;

		wp_add_inline_script( 'media-editor', $js );
	}

	/**
	 * Add Image column to Topics list table.
	 *
	 * @param array $columns Existing columns.
	 * @return array
	 */
	public function add_column( $columns ) {
		$new = array();
		foreach ( $columns as $key => $label ) {
			if ( 'description' === $key ) {
				$new['topic_image'] = __( 'Image', 'baharhussain' );
			}
			$new[ $key ] = $label;
		}
		if ( ! isset( $new['topic_image'] ) ) {
			$new['topic_image'] = __( 'Image', 'baharhussain' );
		}
		return $new;
	}

	/**
	 * Render Image column thumbnail (3:1 ratio).
	 *
	 * @param string $content     Column content.
	 * @param string $column_name Column name.
	 * @param int    $term_id     Term ID.
	 * @return string
	 */
	public function render_column( $content, $column_name, $term_id ) {
		if ( 'topic_image' !== $column_name ) {
			return $content;
		}
		$image_id = get_term_meta( $term_id, self::META_KEY, true );
		if ( $image_id ) {
			return wp_get_attachment_image(
				(int) $image_id,
				'thumb_320',
				false,
				array(
					'style'   => 'width:140px;height:45px;object-fit:cover;border-radius:4px;',
					'loading' => 'lazy',
				)
			);
		}
		return '—';
	}
}
