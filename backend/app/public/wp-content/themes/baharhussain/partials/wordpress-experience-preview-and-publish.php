<?php
/**
 * Preview and publish section for the WordPress Experience page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_publish_features = array(
	array(
		'title' => __( 'Preview Your Updates', 'baharhussain' ),
		'text'  => __( 'Review the page before visitors can see it.', 'baharhussain' ),
		'icon'  => '<path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z" /><circle cx="12" cy="12" r="2.5" />',
	),
	array(
		'title' => __( 'Check Every Device', 'baharhussain' ),
		'text'  => __( 'View the layout on desktop, tablet, and mobile.', 'baharhussain' ),
		'icon'  => '<rect x="2" y="4" width="14" height="11" rx="1.5" /><path d="M7 19h4M9 15v4" /><rect x="16" y="9" width="6" height="11" rx="1.5" />',
	),
	array(
		'title' => __( 'Save Your Progress', 'baharhussain' ),
		'text'  => __( 'Keep unfinished changes safely as a draft.', 'baharhussain' ),
		'icon'  => '<path d="M6 3h9l4 4v14H6V3Z" /><path d="M14 3v5h5M9 13h7M9 17h5" />',
	),
	array(
		'title' => __( 'Publish When Ready', 'baharhussain' ),
		'text'  => __( 'Make approved updates live in one click.', 'baharhussain' ),
		'icon'  => '<path d="m21 3-8 18-3.5-7.5L2 10l19-7Z" /><path d="M9.5 13.5 21 3" />',
	),
);
?>

<section id="preview-and-publish" class="home-section wordpress-preview-publish" aria-labelledby="wordpress-preview-publish-title">
	<div class="wrapper wordpress-editor-overview__grid">
		<div class="wordpress-editor-overview__media wordpress-experience-video__media">
			<video
				aria-label="<?php esc_attr_e( 'WordPress preview and publishing interface', 'baharhussain' ); ?>"
				loop
				muted
				playsinline
				preload="metadata"
			>
				<source
					src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/review-devices.mp4' ); ?>"
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

		<div class="wordpress-preview-publish__content">
			<div class="section-head home-section-head">
				<h2 id="wordpress-preview-publish-title" class="home-section-head__title"><?php esc_html_e( 'See Every Change Before It Goes Live', 'baharhussain' ); ?></h2>
			</div>

			<ul class="wordpress-editor-overview__features">
				<?php foreach ( $bh_publish_features as $bh_publish_feature ) { ?>
					<li>
						<span class="wordpress-editor-overview__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_publish_feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
						</span>
						<div>
							<h3><?php echo esc_html( $bh_publish_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $bh_publish_feature['text'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<p class="wordpress-edit-content__benefit">
				<span aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.5 2.5L16 9"></path></svg>
				</span>
				<?php esc_html_e( 'Review clearly. Publish confidently.', 'baharhussain' ); ?>
			</p>
		</div>
	</div>
</section>
