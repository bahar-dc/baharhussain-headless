<?php
/**
 * Hero for the WordPress Experience page template.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_experience_sections = array(
	'wordpress-editor-overview' => __( 'WordPress Editor Overview', 'baharhussain' ),
	'edit-content'              => __( 'Edit Content', 'baharhussain' ),
	'manage-page-sections'      => __( 'Manage Page Sections', 'baharhussain' ),
	'create-new-pages'          => __( 'Create New Pages', 'baharhussain' ),
	'preview-and-publish'       => __( 'Preview and Publish', 'baharhussain' ),
	'benefits-for-your-team'    => __( 'Benefits for Your Team', 'baharhussain' ),
	'frequently-asked-questions' => __( 'Frequently Asked Questions', 'baharhussain' ),
	'discuss-your-project'      => __( 'Discuss Your Project', 'baharhussain' ),
);
?>

<section class="site-section wordpress-experience-hero" aria-labelledby="wordpress-experience-hero-title">
	<div class="wrapper wordpress-experience-hero__grid">
		<div class="wordpress-experience-hero__content">
			<p class="section-eyebrow"><?php esc_html_e( 'Easy WordPress Management', 'baharhussain' ); ?></p>
			<h1 id="wordpress-experience-hero-title" class="wordpress-experience-hero__title">
				<?php esc_html_e( 'A WordPress Website Your Team Can Easily Manage', 'baharhussain' ); ?>
			</h1>
			<p class="wordpress-experience-hero__intro">
				<?php esc_html_e( 'I build flexible WordPress websites that allow your team to update content, manage pages, and create new layouts without writing code.', 'baharhussain' ); ?>
			</p>

			<div class="wordpress-experience-hero__actions">
				<a class="button main-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M5 12h14M13 6l6 6-6 6"></path>
					</svg>
				</a>
				<a class="button outline-btn" href="#wordpress-editor-overview">
					<span class="button-text"><?php esc_html_e( 'See How It Works', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M12 5v14M6 13l6 6 6-6"></path>
					</svg>
				</a>
			</div>

			<p class="wordpress-experience-hero__benefit">
				<span aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="m8 12 2.5 2.5L16 9"></path></svg>
				</span>
				<?php esc_html_e( 'Flexible editing. Consistent design. Less developer support.', 'baharhussain' ); ?>
			</p>
		</div>

		<nav class="wordpress-experience-hero__contents" aria-labelledby="wordpress-experience-contents-title">
			<h2 id="wordpress-experience-contents-title"><?php esc_html_e( 'On This Page', 'baharhussain' ); ?></h2>
			<ol>
				<?php foreach ( $bh_experience_sections as $bh_section_id => $bh_section_title ) { ?>
					<li>
						<a href="#<?php echo esc_attr( $bh_section_id ); ?>">
							<span><?php echo esc_html( sprintf( '%02d', array_search( $bh_section_id, array_keys( $bh_experience_sections ), true ) + 1 ) ); ?></span>
							<?php echo esc_html( $bh_section_title ); ?>
						</a>
					</li>
				<?php } ?>
			</ol>
		</nav>
	</div>
</section>
