<?php
/**
 * Manage page sections for the WordPress Experience page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_page_section_features = array(
	array(
		'title' => __( 'Add New Sections', 'baharhussain' ),
		'text'  => __( 'Choose from your custom block library.', 'baharhussain' ),
		'icon'  => '<rect x="4" y="4" width="16" height="16" rx="2" /><path d="M12 8v8M8 12h8" />',
	),
	array(
		'title' => __( 'Reorder Sections', 'baharhussain' ),
		'text'  => __( 'Drag blocks into the right position.', 'baharhussain' ),
		'icon'  => '<circle cx="8" cy="6" r="1" /><circle cx="16" cy="6" r="1" /><circle cx="8" cy="12" r="1" /><circle cx="16" cy="12" r="1" /><circle cx="8" cy="18" r="1" /><circle cx="16" cy="18" r="1" />',
	),
	array(
		'title' => __( 'Duplicate Layouts', 'baharhussain' ),
		'text'  => __( 'Reuse existing sections in a few clicks.', 'baharhussain' ),
		'icon'  => '<rect x="7" y="4" width="13" height="16" rx="2" /><path d="M16 4V3a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h2" />',
	),
	array(
		'title' => __( 'Remove Content', 'baharhussain' ),
		'text'  => __( 'Delete sections you no longer need.', 'baharhussain' ),
		'icon'  => '<path d="M4 6h16M9 6V3h6v3M6 6l1 15h10l1-15M10 10v7M14 10v7" />',
	),
);
?>

<section id="manage-page-sections" class="home-section wordpress-manage-sections" aria-labelledby="wordpress-manage-sections-title">
	<div class="wrapper wordpress-editor-overview__grid">
		<div class="wordpress-editor-overview__media wordpress-experience-video__media">
			<video
				aria-label="<?php esc_attr_e( 'WordPress page section management interface', 'baharhussain' ); ?>"
				loop
				muted
				playsinline
				preload="metadata"
			>
				<source
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/page-building.mp4' ); ?>"
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

		<div class="wordpress-manage-sections__content">
			<div class="section-head home-section-head">
				<h2 id="wordpress-manage-sections-title" class="home-section-head__title"><?php esc_html_e( 'Build and Arrange Pages Your Way', 'baharhussain' ); ?></h2>
			</div>

			<ul class="wordpress-editor-overview__features">
				<?php foreach ( $bh_page_section_features as $bh_page_section_feature ) { ?>
					<li>
						<span class="wordpress-editor-overview__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_page_section_feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
						</span>
						<div>
							<h3><?php echo esc_html( $bh_page_section_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $bh_page_section_feature['text'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<p class="wordpress-edit-content__benefit">
				<span aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.5 2.5L16 9"></path></svg>
				</span>
				<?php esc_html_e( 'Flexible pages. Consistent design.', 'baharhussain' ); ?>
			</p>
		</div>
	</div>
</section>
