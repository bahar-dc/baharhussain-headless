<?php
defined( 'ABSPATH' ) || exit;

/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

list( $bh_var_post_id, $bh_fields, $bh_option_fields, $bh_queried_object ) = THS::defaults();
// Theme Options — fetch title & text raw (they contain intentional HTML like <em>).
$bh_var_tocta_title          = get_field( 'ths_var_tocta_title', 'option' );
$bh_var_tocta_title          = $bh_var_tocta_title ? $bh_var_tocta_title : null;
$bh_var_tocta_text           = get_field( 'ths_var_tocta_text', 'option' );
$bh_var_tocta_text           = $bh_var_tocta_text ? $bh_var_tocta_text : null;
$bh_var_tocta_selection      = $bh_option_fields['ths_var_tocta_selection'] ?? 'button';
$bh_var_tocta_button         = $bh_option_fields['ths_var_tocta_button'] ?? null;
$bh_var_tocta_form_shortcode = $bh_option_fields['ths_var_tocta_form_shortcode'] ?? null;

// Page Fields — also fetch title & text raw for per-page overrides.
$bh_var_cta_visibility              = $bh_fields['ths_var_cta_visibility'] ?? null;
$bh_var_cta_visibility_ovrridevalue = $bh_fields['ths_var_cta_visibility_ovrridevalue'] ?? null;
$bh_var_page_cta_title              = get_field( 'ths_var_page_cta_title', $bh_var_post_id );
$bh_var_page_cta_title              = $bh_var_page_cta_title ? $bh_var_page_cta_title : $bh_var_tocta_title;
$bh_var_page_cta_text               = get_field( 'ths_var_page_cta_text', $bh_var_post_id );
$bh_var_page_cta_text               = $bh_var_page_cta_text ? $bh_var_page_cta_text : $bh_var_tocta_text;
$bh_var_page_cta_selection          = $bh_fields['ths_var_page_cta_selection'] ?? 'button';
$bh_var_page_cta_button             = $bh_fields['ths_var_page_cta_button'] ?? $bh_var_tocta_button;
$bh_var_page_cta_shortcode          = $bh_fields['ths_var_page_cta_shortcode'] ?? $bh_var_tocta_form_shortcode;

// Single posts: always show global CTA, no per-post override.
// Archive/search/404: also force global CTA.
if ( is_singular( 'post' ) || is_archive() || is_search() || is_404() ) {
	$bh_var_cta_visibility              = true;
	$bh_var_cta_visibility_ovrridevalue = false;
}

?>

<?php
if ( $bh_var_cta_visibility ) {
	// Per-page CTA override vs global theme-options CTA.
	if ( $bh_var_cta_visibility_ovrridevalue ) {
		?>
		<section id="cta-section" class="cta-section">
			<div class="wrapper">
				<div class="footer-cta">
					<div class="wrapper">
						<div class="footer-cta-content">
							<?php if ( $bh_var_page_cta_title ) { ?>
								<h2 class="heading-2"><?php echo wp_kses_post( $bh_var_page_cta_title ); ?></h2>
							<?php } ?>

							<?php
							defined( 'ABSPATH' ) || exit;

							if ( $bh_var_page_cta_text ) {
								echo wp_kses_post( $bh_var_page_cta_text );
							}
							?>

							<?php if ( 'form' === $bh_var_page_cta_selection && $bh_var_page_cta_shortcode ) { ?>
								<div class="footer-cta-form">
									<?php echo do_shortcode( html_entity_decode( $bh_var_page_cta_shortcode ) ); ?>
								</div>
							<?php } elseif ( $bh_var_page_cta_button ) { ?>
								<a href="<?php echo esc_url( $bh_var_page_cta_button['url'] ); ?>" class="button white-btn" target="<?php echo esc_attr( $bh_var_page_cta_button['target'] ); ?>" title="<?php echo esc_attr( $bh_var_page_cta_button['title'] ); ?>">
									<div class="button-text">
										<?php echo esc_html( $bh_var_page_cta_button['title'] ); ?>
									</div>
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2 7.99967L14 7.99967M14 7.99967L8.33333 2.33301M14 7.99967L8.33333 13.6663" stroke="#2C20BB" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } else { ?>
		<section id="cta-section" class="cta-section">
			<div class="wrapper">
				<div class="footer-cta">
					<div class="wrapper">
						<div class="footer-cta-content">
							<?php if ( $bh_var_tocta_title ) { ?>
								<h2 class="heading-2"><?php echo wp_kses_post( $bh_var_tocta_title ); ?></h2>
							<?php } ?>
							<?php
							defined( 'ABSPATH' ) || exit;

							if ( $bh_var_tocta_text ) {
								echo wp_kses_post( $bh_var_tocta_text );
							}
							?>
							<?php if ( 'form' === $bh_var_tocta_selection && $bh_var_tocta_form_shortcode ) { ?>
								<div class="footer-cta-form">
									<?php echo do_shortcode( html_entity_decode( $bh_var_tocta_form_shortcode ) ); ?>
								</div>
							<?php } elseif ( $bh_var_tocta_button ) { ?>
								<a href="<?php echo esc_url( $bh_var_tocta_button['url'] ); ?>" class="button white-btn" target="<?php echo esc_attr( $bh_var_tocta_button['target'] ); ?>" title="<?php echo esc_attr( $bh_var_tocta_button['title'] ); ?>">
									<div class="button-text">
										<?php echo esc_html( $bh_var_tocta_button['title'] ); ?>
									</div>
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M2 7.99967L14 7.99967M14 7.99967L8.33333 2.33301M14 7.99967L8.33333 13.6663" stroke="#2C20BB" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
<?php } ?>
