<?php
/**
 * Protected design system section for the WordPress Experience page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_design_features = array(
);
?>

<section id="protected-design-system" class="home-section wordpress-design-control" aria-labelledby="wordpress-design-control-title">
	<div class="wrapper wordpress-edit-content__grid">
		<div class="wordpress-design-control__content">
			<div class="section-head home-section-head">
				<p class="section-eyebrow home-section-head__eyebrow"><?php esc_html_e( 'Design Control', 'baharhussain' ); ?></p>
				<h2 id="wordpress-design-control-title" class="home-section-head__title"><?php esc_html_e( 'Consistent and Protected Design', 'baharhussain' ); ?></h2>
			</div>

			<ul class="wordpress-editor-overview__features">
				<?php foreach ( $bh_design_features as $bh_design_feature ) { ?>
					<li>
						<span class="wordpress-editor-overview__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_design_feature['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
						</span>
						<div>
							<h3><?php echo esc_html( $bh_design_feature['title'] ); ?></h3>
							<p><?php echo esc_html( $bh_design_feature['text'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<p class="wordpress-edit-content__benefit">
				<span aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.5 2.5L16 9"></path></svg>
				</span>
				<?php esc_html_e( 'Design system protected.', 'baharhussain' ); ?>
			</p>
		</div>

		<div class="wordpress-editor-overview__media">
			<img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/services-code-editor.png' ); ?>"
				alt="<?php esc_attr_e( 'WordPress design controls with protected styles', 'baharhussain' ); ?>"
				width="1536"
				height="1024"
				loading="lazy"
				decoding="async"
			>
		</div>
	</div>
</section>
