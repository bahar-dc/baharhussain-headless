<?php
/**
 * WordPress editor overview section.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_editor_features = array(
	array(
		'title' => __( 'Clear and Familiar', 'baharhussain' ),
		'text'  => __( 'A simple editing experience your team can quickly understand.', 'baharhussain' ),
		'icon'  => '<rect x="3" y="4" width="18" height="13" rx="2" /><path d="M9 21h6M12 17v4" />',
	),
	array(
		'title' => __( 'Flexible Content', 'baharhussain' ),
		'text'  => __( 'Update content without changing the layout.', 'baharhussain' ),
		'icon'  => '<path d="M13.5 5.5 18.5 10.5M4 20h4l11.5-11.5a2.8 2.8 0 0 0-4-4L4 16v4ZM13 6l5 5" />',
	),
	array(
		'title' => __( 'Approved Components', 'baharhussain' ),
		'text'  => __( 'Every block follows the website design system.', 'baharhussain' ),
		'icon'  => '<rect x="3" y="3" width="7" height="7" rx="1" /><rect x="14" y="3" width="7" height="7" rx="1" /><rect x="3" y="14" width="7" height="7" rx="1" /><rect x="14" y="14" width="7" height="7" rx="1" />',
	),
	array(
		'title' => __( 'Protected Styles', 'baharhussain' ),
		'text'  => __( 'Fonts, colors, and spacing remain consistent.', 'baharhussain' ),
		'icon'  => '<path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z" /><path d="m9 12 2 2 4-5" />',
	),
);
?>

<section id="wordpress-editor-overview" class="home-section wordpress-editor-overview" aria-labelledby="wordpress-editor-overview-title">
	<div class="wrapper">
		<div class="section-head home-section-head">
			<h2 id="wordpress-editor-overview-title" class="home-section-head__title"><?php esc_html_e( 'Everything You Need, in One Simple Editor', 'baharhussain' ); ?></h2>
			<p class="home-section-head__text"><?php esc_html_e( 'Manage your website content through a clear and flexible WordPress editor built around your team’s daily needs.', 'baharhussain' ); ?></p>
		</div>

		<div class="wordpress-editor-overview__grid">
			<div class="wordpress-editor-overview__media wordpress-experience-video__media">
				<video
					aria-label="<?php esc_attr_e( 'WordPress editor interface overview', 'baharhussain' ); ?>"
					loop
					muted
					playsinline
					preload="metadata"
				>
					<source
						src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/wordpress-editor-overview.mp4' ); ?>"
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

			<div class="wordpress-editor-overview__details">
				<ul class="wordpress-editor-overview__features">
					<?php foreach ( $bh_editor_features as $bh_editor_feature ) { ?>
						<li>
							<span class="wordpress-editor-overview__icon" aria-hidden="true">
								<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_editor_feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
							</span>
							<div>
								<h3><?php echo esc_html( $bh_editor_feature['title'] ); ?></h3>
								<p><?php echo esc_html( $bh_editor_feature['text'] ); ?></p>
							</div>
						</li>
					<?php } ?>
				</ul>

				<a href="#edit-content" class="link-arrow flex">
					<span class="button-text"><?php esc_html_e( 'See what your team can manage', 'baharhussain' ); ?></span>
					<span class="button-icon" aria-hidden="true">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" focusable="false">
							<path d="M8 3.333v9.334M4 8.667l4 4 4-4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
					</span>
				</a>
			</div>
		</div>
	</div>
</section>
