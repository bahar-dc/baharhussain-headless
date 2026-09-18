<?php
/**
 * Shared project process section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$section_id = ! empty( $args['section_id'] ) ? $args['section_id'] : 'home-process-title';
?>

<section class="home-section home-process" aria-labelledby="<?php echo esc_attr( $section_id ); ?>">
	<div class="wrapper">
		<div class="home-process__top">
			<div class="section-head home-section-head home-process__head">
				<p class="section-eyebrow home-section-head__eyebrow home-process__eyebrow"><?php esc_html_e( 'Process', 'baharhussain' ); ?></p>
				<h2 id="<?php echo esc_attr( $section_id ); ?>" class="home-section-head__title home-process__title"><?php esc_html_e( 'A Simple, Proven Process', 'baharhussain' ); ?></h2>
				<p class="home-section-head__text home-process__text"><?php esc_html_e( 'A clear workflow for agency projects, from first conversation to launch and long-term support.', 'baharhussain' ); ?></p>
			</div>
		</div>

		<ol class="home-process__steps">
			<li class="home-process__step"><span class="home-process__number"><?php esc_html_e( '01', 'baharhussain' ); ?></span><div class="home-process__step-content"><h3><?php esc_html_e( 'Discovery', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'We discuss project goals, scope, and timeline.', 'baharhussain' ); ?></p></div></li>
			<li class="home-process__step"><span class="home-process__number"><?php esc_html_e( '02', 'baharhussain' ); ?></span><div class="home-process__step-content"><h3><?php esc_html_e( 'Scope Review', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'I review designs, requirements, and technical needs.', 'baharhussain' ); ?></p></div></li>
			<li class="home-process__step"><span class="home-process__number"><?php esc_html_e( '03', 'baharhussain' ); ?></span><div class="home-process__step-content"><h3><?php esc_html_e( 'Development', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'Custom WordPress development built with clean code.', 'baharhussain' ); ?></p></div></li>
			<li class="home-process__step"><span class="home-process__number"><?php esc_html_e( '04', 'baharhussain' ); ?></span><div class="home-process__step-content"><h3><?php esc_html_e( 'QA & Feedback', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'Testing, refinements, and review before launch.', 'baharhussain' ); ?></p></div></li>
			<li class="home-process__step"><span class="home-process__number"><?php esc_html_e( '05', 'baharhussain' ); ?></span><div class="home-process__step-content"><h3><?php esc_html_e( 'Launch Support', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'Final checks and support during go-live.', 'baharhussain' ); ?></p></div></li>
			<li class="home-process__step"><span class="home-process__number"><?php esc_html_e( '06', 'baharhussain' ); ?></span><div class="home-process__step-content"><h3><?php esc_html_e( 'Ongoing Support', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'Long-term help for updates, fixes, and growth.', 'baharhussain' ); ?></p></div></li>
		</ol>
	</div>
</section>
