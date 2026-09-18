<?php
/**
 * Create new pages section for the WordPress Experience page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_new_page_features = array(
	array(
		'title' => __( 'Choose Existing Blocks', 'baharhussain' ),
		'text'  => __( 'Select from your custom block library.', 'baharhussain' ),
		'icon'  => '<rect x="3" y="3" width="7" height="7" rx="1" /><rect x="14" y="3" width="7" height="7" rx="1" /><rect x="3" y="14" width="7" height="7" rx="1" /><path d="M17.5 14v7M14 17.5h7" />',
	),
	array(
		'title' => __( 'Combine Page Sections', 'baharhussain' ),
		'text'  => __( 'Build layouts around your content needs.', 'baharhussain' ),
		'icon'  => '<path d="M8 3h8v5h5v8h-5v5H8v-5H3V8h5V3Z" /><path d="M8 8h8v8H8z" />',
	),
	array(
		'title' => __( 'Keep Design Consistent', 'baharhussain' ),
		'text'  => __( 'Colours, spacing, and styles stay controlled.', 'baharhussain' ),
		'icon'  => '<path d="M2 12.0261C2 17.1723 5.86713 21.413 10.8468 21.9863C11.5816 22.0709 12.2938 21.7576 12.8168 21.2333C13.4703 20.5781 13.4703 19.5159 12.8168 18.8607C12.2938 18.3364 11.8674 17.5541 12.2619 16.9268C13.8385 14.4192 22 20.178 22 12.0261C22 6.48884 17.5228 2 12 2C6.47715 2 2 6.48884 2 12.0261Z" /><circle cx="17.5" cy="11.5" r=".75" /><circle cx="6.5" cy="11.5" r=".75" /><circle cx="9.58496" cy="6.99976" r=".75" /><circle cx="14.5" cy="7" r=".75" />',
	),
	array(
		'title' => __( 'Create Pages Faster', 'baharhussain' ),
		'text'  => __( 'Reuse approved sections instead of starting again.', 'baharhussain' ),
		'icon'  => '<circle cx="12" cy="12" r="9" /><path d="M12 7v5l3 2" />',
	),
);
?>

<section id="create-new-pages" class="home-section wordpress-create-pages" aria-labelledby="wordpress-create-pages-title">
	<div class="wrapper wordpress-edit-content__grid">
		<div class="wordpress-create-pages__content">
			<div class="section-head home-section-head">
				<h2 id="wordpress-create-pages-title" class="home-section-head__title"><?php esc_html_e( 'Create New Pages With Confidence', 'baharhussain' ); ?></h2>
			</div>

			<ul class="wordpress-editor-overview__features">
				<?php foreach ( $bh_new_page_features as $bh_new_page_feature ) { ?>
					<li>
						<span class="wordpress-editor-overview__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_new_page_feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
						</span>
						<div>
							<h3><?php echo esc_html( $bh_new_page_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $bh_new_page_feature['text'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<p class="wordpress-edit-content__benefit">
				<span aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.5 2.5L16 9"></path></svg>
				</span>
				<?php esc_html_e( 'More control for your team. Less developer support.', 'baharhussain' ); ?>
			</p>
		</div>

		<div class="wordpress-editor-overview__media wordpress-experience-video__media">
			<video
				aria-label="<?php esc_attr_e( 'WordPress custom block library and new page interface', 'baharhussain' ); ?>"
				loop
				muted
				playsinline
				preload="metadata"
			>
				<source
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/reuseable-blocks.mp4' ); ?>"
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
