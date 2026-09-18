<?php
defined( 'ABSPATH' ) || exit;

/**
 * Reusable author card — used by the authors-list block and the AJAX handler.
 *
 * Expected variables (set via set_query_var before get_template_part):
 *   WP_User|object $_author_card  — user object with at least ->ID and ->display_name
 *
 * @package Bahar Hussain Theme
 */

$card_author = get_query_var( '_author_card' );
if ( ! $card_author ) {
	return;
}

$card_id     = $card_author->ID;
$card_name   = $card_author->display_name;
$card_url    = get_author_posts_url( $card_id );
$card_avatar = get_avatar_url( $card_id, array( 'size' => 32 ) );
$bio         = get_the_author_meta( 'description', $card_id );

$facebook  = get_the_author_meta( 'facebook', $card_id );
$twitter   = ths_social_url( get_the_author_meta( 'twitter', $card_id ), 'https://x.com/' );
$instagram = get_the_author_meta( 'instagram', $card_id );
$linkedin  = get_the_author_meta( 'linkedin', $card_id );
$youtube   = get_the_author_meta( 'youtube', $card_id );

$categories = function_exists( 'get_field' ) ? get_field( 'ths_var_author_experties_categories', 'user_' . $card_id ) : null;
$topics     = function_exists( 'get_field' ) ? get_field( 'ths_var_author_experties_topics', 'user_' . $card_id ) : null;
?>
<div class="post-card-author">
	<div class="post-card-author-head flex-between-center">
		<a href="<?php echo esc_url( $card_url ); ?>" title="<?php echo esc_attr( $card_name ); ?>" aria-label="<?php echo esc_attr( $card_name ); ?>" class="flex-between-center">
			<div class="author-info-area flex-center">
				<div class="post-card-author-img image-cover">
					<img src="<?php echo esc_url( $card_avatar ); ?>" alt="<?php echo esc_attr( $card_name ); ?>" class="author-avatar">
				</div>
				<div class="author-name">
					<?php echo esc_html( $card_name ); ?>
				</div>
			</div>
			<div class="link-icon">
				<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.5 14.25L14.25 4.5M14.25 4.5V13.86M14.25 4.5H4.89" stroke="#111111" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
		</a>
	</div>
	<div class="post-card-author-content">
		<?php if ( $bio ) { ?>
			<p class="post-card-author-bio">
				<?php echo esc_html( $bio ); ?>
			</p>
		<?php } ?>
		<?php if ( $categories || $topics ) { ?>
			<div class="dbt-spr-20"></div>
			<div class="post-card-tags">
				<?php
					defined( 'ABSPATH' ) || exit;
				if ( $categories ) {
					foreach ( $categories as $term_id ) {
						$term = get_term( $term_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						if ( $term && ! is_wp_error( $term ) ) {
							$link  = get_term_link( $term ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
							$color = ths_get_term_color( $term->term_id );
							echo '<div class="post-card-tags-item ' . esc_attr( $color ) . '"><a href="' . esc_url( $link ) . '">' . esc_html( $term->name ) . '</a></div>';
						}
					}
				}
				if ( $topics ) {
					foreach ( $topics as $term_id ) {
						$term = get_term( $term_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						if ( $term && ! is_wp_error( $term ) ) {
							$link  = get_term_link( $term ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
							$color = ths_get_term_color( $term->term_id );
							echo '<div class="post-card-tags-item ' . esc_attr( $color ) . '"><a href="' . esc_url( $link ) . '">' . esc_html( $term->name ) . '</a></div>';
						}
					}
				}
				?>
			</div>
		<?php } ?>
		<div class="dbt-spr-20"></div>
		<div class="social-icons-container">
			<?php if ( $facebook ) { ?>
				<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" class="social-icons-img flex-center" aria-label="Facebook">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24 12.0301C24 5.38947 18.624 0 12 0C5.376 0 0 5.38947 0 12.0301C0 17.8526 4.128 22.7008 9.6 23.8195V15.6391H7.2V12.0301H9.6V9.02256C9.6 6.70075 11.484 4.81203 13.8 4.81203H16.8V8.42105H14.4C13.74 8.42105 13.2 8.96241 13.2 9.62406V12.0301H16.8V15.6391H13.2V24C19.26 23.3985 24 18.2737 24 12.0301Z" fill="#111111"/>
					</svg>
				</a>
			<?php } ?>
			<?php if ( $twitter ) { ?>
				<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer" class="social-icons-img flex-center" aria-label="X (Twitter)">
					<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3.2 0C1.435 0 0 1.435 0 3.2V19.2C0 20.965 1.435 22.4 3.2 22.4H19.2C20.965 22.4 22.4 20.965 22.4 19.2V3.2C22.4 1.435 20.965 0 19.2 0H3.2ZM18.055 4.2L12.865 10.13L18.97 18.2H14.19L10.45 13.305L6.165 18.2H3.79L9.34 11.855L3.485 4.2H8.385L11.77 8.675L15.68 4.2H18.055ZM16.165 16.78L7.67 5.545H6.255L14.845 16.78H16.165Z" fill="#111111"/>
					</svg>
				</a>
			<?php } ?>
			<?php if ( $instagram ) { ?>
				<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" class="social-icons-img flex-center" aria-label="Instagram">
					<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M23.9333 7.09867C23.9207 6.08875 23.7316 5.08881 23.3747 4.144C23.0665 3.34645 22.595 2.62214 21.9904 2.01756C21.3859 1.41298 20.6615 0.941482 19.864 0.633334C18.9312 0.282993 17.9456 0.0936338 16.9493 0.0733334C15.6667 0.0160001 15.26 0 12.004 0C8.748 0 8.33067 8.9407e-08 7.05733 0.0733334C6.06153 0.0937844 5.07642 0.283141 4.144 0.633334C3.34645 0.941482 2.62214 1.41298 2.01756 2.01756C1.41298 2.62214 0.941482 3.34645 0.633333 4.144C0.283596 5.0765 0.0946908 6.06161 0.0746667 7.05733C0.0173333 8.34133 0 8.748 0 12.004C0 15.26 -9.93411e-09 15.676 0.0746667 16.9507C0.0946667 17.948 0.282667 18.932 0.633333 19.8667C0.941785 20.6641 1.41356 21.3882 2.01837 21.9926C2.62318 22.5969 3.34767 23.0682 4.14533 23.376C5.07536 23.7399 6.06055 23.9428 7.05867 23.976C8.34267 24.0333 8.74933 24.0507 12.0053 24.0507C15.2613 24.0507 15.6787 24.0507 16.952 23.976C17.9482 23.9561 18.9337 23.7672 19.8667 23.4173C20.6634 23.1078 21.387 22.6358 21.9914 22.0314C22.5958 21.427 23.0678 20.7034 23.3773 19.9067C23.728 18.9733 23.916 17.9893 23.936 16.9907C23.9933 15.708 24.0107 15.3013 24.0107 12.044C24.008 8.788 24.008 8.37467 23.9333 7.09867ZM11.996 18.1613C8.59067 18.1613 5.832 15.4027 5.832 11.9973C5.832 8.592 8.59067 5.83333 11.996 5.83333C13.6308 5.83333 15.1986 6.48275 16.3546 7.63873C17.5106 8.7947 18.16 10.3625 18.16 11.9973C18.16 13.6321 17.5106 15.2 16.3546 16.3559C15.1986 17.5119 13.6308 18.1613 11.996 18.1613ZM18.4053 7.04267C18.2165 7.04284 18.0295 7.00578 17.8551 6.93361C17.6806 6.86144 17.5221 6.75558 17.3886 6.62207C17.2551 6.48857 17.1492 6.33005 17.0771 6.15558C17.0049 5.98112 16.9678 5.79414 16.968 5.60533C16.968 5.41667 17.0052 5.22985 17.0774 5.05555C17.1496 4.88124 17.2554 4.72286 17.3888 4.58946C17.5222 4.45605 17.6806 4.35023 17.8549 4.27803C18.0292 4.20583 18.216 4.16867 18.4047 4.16867C18.5933 4.16867 18.7802 4.20583 18.9545 4.27803C19.1288 4.35023 19.2871 4.45605 19.4205 4.58946C19.554 4.72286 19.6598 4.88124 19.732 5.05555C19.8042 5.22985 19.8413 5.41667 19.8413 5.60533C19.8413 6.4 19.1987 7.04267 18.4053 7.04267Z" fill="#111111"/>
						<path d="M11.9962 16.0021C14.2075 16.0021 16.0002 14.2095 16.0002 11.9981C16.0002 9.78679 14.2075 7.99414 11.9962 7.99414C9.78484 7.99414 7.99219 9.78679 7.99219 11.9981C7.99219 14.2095 9.78484 16.0021 11.9962 16.0021Z" fill="#111111"/>
					</svg>
				</a>
			<?php } ?>
			<?php if ( $linkedin ) { ?>
				<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" class="social-icons-img flex-center" aria-label="LinkedIn">
					<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
						<path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd" fill="#111111"/>
						<path d="M7.2 8.809H4V19.5h3.2V8.809Z" fill="#111111"/>
					</svg>
				</a>
			<?php } ?>
			<?php if ( $youtube ) { ?>
				<a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" class="social-icons-img flex-center" aria-label="YouTube">
					<svg width="27" height="19" viewBox="0 0 27 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M26.1067 2.92533C25.9599 2.35567 25.6632 1.83571 25.2475 1.41952C24.8318 1.00332 24.3122 0.706066 23.7427 0.558667C21.6773 1.98682e-07 13.3333 0 13.3333 0C13.3333 0 4.98933 1.19209e-07 2.92533 0.56C2.35551 0.70687 1.83544 1.00373 1.41923 1.41971C1.00301 1.83569 0.705857 2.35559 0.558667 2.92533C-1.19209e-07 5.032 0 9.33333 0 9.33333C0 9.33333 1.19209e-07 13.6773 0.56 15.7427C0.86 16.9027 1.764 17.8067 2.92533 18.108C4.98933 18.6667 13.3333 18.6667 13.3333 18.6667C13.3333 18.6667 21.6773 18.6667 23.7427 18.1067C24.3121 17.9597 24.8318 17.6629 25.2477 17.2472C25.6637 16.8315 25.9607 16.312 26.108 15.7427C26.6667 13.6773 26.6667 9.33333 26.6667 9.33333C26.6667 9.33333 26.6667 5.032 26.1067 2.92533ZM10.6667 13.3333V5.33333L17.592 9.33333L10.6667 13.3333Z" fill="#111111"/>
					</svg>
				</a>
			<?php } ?>
		</div>
	</div>
</div>
