<?php
/**
 * Team benefits section for the WordPress Experience page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_team_benefits = array(
	array(
		'title' => __( 'Faster Content Updates', 'baharhussain' ),
		'text'  => __( 'Make everyday changes without waiting for a developer.', 'baharhussain' ),
		'icon'  => '<path d="m13 2-9 12h7l-1 8 9-12h-7l1-8Z" />',
	),
	array(
		'title' => __( 'Less Developer Dependency', 'baharhussain' ),
		'text'  => __( 'Your team can manage regular content updates independently.', 'baharhussain' ),
		'icon'  => '<path d="M14 7h2a5 5 0 0 1 0 10h-2M10 7H8a5 5 0 0 0 0 10h2M8 12h8" />',
	),
	array(
		'title' => __( 'Easy for Your Team', 'baharhussain' ),
		'text'  => __( 'A clear editing experience makes training simple.', 'baharhussain' ),
		'icon'  => '<circle cx="8" cy="8" r="3" /><circle cx="17" cy="8" r="3" /><path d="M2 20a6 6 0 0 1 12 0M12 20a5 5 0 0 1 10 0" />',
	),
	array(
		'title' => __( 'Lower Ongoing Effort', 'baharhussain' ),
		'text'  => __( 'Spend less time and cost on small website changes.', 'baharhussain' ),
		'icon'  => '<circle cx="12" cy="12" r="9" /><path d="M12 7v10M8 13l4 4 4-4" />',
	),
	array(
		'title' => __( 'Ready for Future Growth', 'baharhussain' ),
		'text'  => __( 'Reuse flexible blocks as your content and website grow.', 'baharhussain' ),
		'icon'  => '<path d="M4 20V5M4 20h16M7 16l4-4 3 2 5-6M15 8h4v4" />',
	),
);
?>

<section id="benefits-for-your-team" class="home-section wordpress-team-benefits" aria-labelledby="wordpress-team-benefits-title">
	<div class="wrapper">
		<div class="section-head home-section-head">
			<p class="section-eyebrow home-section-head__eyebrow"><?php esc_html_e( 'Team Benefits', 'baharhussain' ); ?></p>
			<h2 id="wordpress-team-benefits-title" class="home-section-head__title"><?php esc_html_e( 'More Control. Less Ongoing Effort.', 'baharhussain' ); ?></h2>
			<p><?php esc_html_e( 'A flexible WordPress system helps your team manage the website faster, with less technical support.', 'baharhussain' ); ?></p>
		</div>

		<ul class="wordpress-team-benefits__grid">
			<?php foreach ( $bh_team_benefits as $bh_team_benefit ) { ?>
				<li>
					<span class="wordpress-editor-overview__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><?php echo $bh_team_benefit['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
					</span>
					<h3><?php echo esc_html( $bh_team_benefit['title'] ); ?></h3>
					<p><?php echo esc_html( $bh_team_benefit['text'] ); ?></p>
				</li>
			<?php } ?>
		</ul>
	</div>
</section>
