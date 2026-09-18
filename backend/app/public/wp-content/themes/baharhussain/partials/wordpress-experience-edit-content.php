<?php
/**
 * Edit content section for the WordPress Experience page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_content_features = array(
	array(
		'title' => __( 'Update Text', 'baharhussain' ),
		'text'  => __( 'Edit headings and paragraphs directly.', 'baharhussain' ),
		'icon'  => '<path d="M4 5V3h16v2M12 3v18M8 21h8" />',
	),
	array(
		'title' => __( 'Change Images', 'baharhussain' ),
		'text'  => __( 'Replace images from the media library.', 'baharhussain' ),
		'icon'  => '<rect x="3" y="3" width="18" height="18" rx="2" /><circle cx="8.5" cy="8.5" r="2" /><path d="m4 18 5-5 3 3 3-3 5 5" />',
	),
	array(
		'title' => __( 'Manage Buttons', 'baharhussain' ),
		'text'  => __( 'Update button text and destinations.', 'baharhussain' ),
		'icon'  => '<path d="M5 3h9a3 3 0 0 1 3 3v2M5 3a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h4" /><path d="m10 9 10 4-4 2-2 4-4-10Z" />',
	),
	array(
		'title' => __( 'Edit Links', 'baharhussain' ),
		'text'  => __( 'Add or change links in a few clicks.', 'baharhussain' ),
		'icon'  => '<path d="M14 7h2a5 5 0 0 1 0 10h-2M10 7H8a5 5 0 0 0 0 10h2M8 12h8" />',
	),
	array(
		'title' => __( 'Fewer Design Mistakes', 'baharhussain' ),
		'text'  => __( 'Built-in controls help prevent broken pages.', 'baharhussain' ),
		'icon'  => '<circle cx="12" cy="12" r="9" /><path d="m8 12 2.5 2.5L16 9" />',
	),
);
?>

<section id="edit-content" class="home-section wordpress-edit-content" aria-labelledby="wordpress-edit-content-title">
	<div class="wrapper wordpress-edit-content__grid">
		<div class="wordpress-edit-content__content">
			<div class="section-head home-section-head">
				<h2 id="wordpress-edit-content-title" class="home-section-head__title"><?php esc_html_e( 'Make Everyday Website Updates With Ease', 'baharhussain' ); ?></h2>
			</div>

			<ul class="wordpress-editor-overview__features">
				<?php foreach ( $bh_content_features as $bh_content_feature ) { ?>
					<li>
						<span class="wordpress-editor-overview__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_content_feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
						</span>
						<div>
							<h3><?php echo esc_html( $bh_content_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $bh_content_feature['text'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<p class="wordpress-edit-content__benefit">
				<span aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.5 2.5L16 9"></path></svg>
				</span>
				<?php esc_html_e( 'Less technical support. Faster content updates.', 'baharhussain' ); ?>
			</p>
		</div>

		<div class="wordpress-editor-overview__media wordpress-experience-video__media">
			<video
				aria-label="<?php esc_attr_e( 'WordPress content editing interface', 'baharhussain' ); ?>"
				loop
				muted
				playsinline
				preload="metadata"
			>
				<source
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/edit-content-final.mp4' ); ?>"
					type="video/mp4"
				>
				<?php esc_html_e( 'Your browser does not support embedded videos.', 'baharhussain' ); ?>
			</video>
			<button class="wordpress-experience-video__control" type="button" aria-label="<?php esc_attr_e( 'Pause video', 'baharhussain' ); ?>">
				<svg class="wordpress-experience-video__pause-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="M8 5v14M16 5v14"></path>
				</svg>
				<svg class="wordpress-experience-video__play-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
					<path d="m9 5 10 7L9 19V5Z"></path>
				</svg>
			</button>
		</div>
	</div>
</section>
