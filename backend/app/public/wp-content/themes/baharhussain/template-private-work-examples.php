<?php
/**
 * Template Name: Request Private Work Examples
 *
 * Private portfolio examples enquiry page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$bh_private_work_form_id = (int) apply_filters( 'bh_private_work_examples_form_id', 5 );

/**
 * Tailor the shared enquiry form for private work example requests.
 */
$bh_prepare_private_work_form = static function ( $form ) {
	$field_labels = array(
		'name'     => __( 'Your Name', 'baharhussain' ),
		'email'    => __( 'Work Email', 'baharhussain' ),
		'text'     => __( 'Agency Name (Optional)', 'baharhussain' ),
		'select'   => __( 'What type of work would you like to see?', 'baharhussain' ),
		'textarea' => __( 'Tell me about your project', 'baharhussain' ),
	);

	foreach ( $form['fields'] as $field ) {
		if ( isset( $field_labels[ $field->type ] ) ) {
			$field->label = $field_labels[ $field->type ];
		}

		if ( 'text' === $field->type ) {
			$field->isRequired  = false;
			$field->description = '';
		} elseif ( 'select' === $field->type ) {
			$field->placeholder = __( 'Choose a project type', 'baharhussain' );
		} elseif ( 'textarea' === $field->type ) {
			$field->placeholder = __( 'Share the type of website, features, or development support you need.', 'baharhussain' );
		}
	}

	$form['button']['text'] = __( 'Request Relevant Examples', 'baharhussain' );

	return $form;
};

add_filter( 'gform_pre_render_' . $bh_private_work_form_id, $bh_prepare_private_work_form );

get_header();
?>

<div id="primary" class="site-main private-work-examples-template">
	<section class="site-section private-work-hero background-light-blue" aria-labelledby="private-work-title">
		<div class="wrapper">
			<div class="private-work-hero__content">
				<p class="section-eyebrow private-work-hero__eyebrow"><?php esc_html_e( 'Private Portfolio', 'baharhussain' ); ?></p>
				<h1 id="private-work-title" class="private-work-hero__title"><?php esc_html_e( 'Request Relevant Work Examples', 'baharhussain' ); ?></h1>
				<p class="private-work-hero__intro"><?php esc_html_e( 'Some of my agency work is protected by white-label agreements and cannot be displayed publicly. Share your project needs, and I’ll send relevant examples privately where permitted.', 'baharhussain' ); ?></p>
			</div>
		</div>
	</section>
	<div class="dbt-spr-72"></div>
	<section class="private-work-request" aria-labelledby="private-work-form-title">
		<div class="wrapper">
			<div class="private-work-request__grid">
				<aside class="private-work-request__note">
					<div class="private-work-request__shield" aria-hidden="true">
						<svg viewBox="0 0 120 140" fill="none"><path d="M60 8c17 12 33 18 50 21v37c0 34-19 54-50 73C29 120 10 100 10 66V29c17-3 33-9 50-21Z" stroke="currentColor" stroke-width="5" stroke-linejoin="round"/><rect x="38" y="60" width="44" height="39" rx="7" stroke="currentColor" stroke-width="5"/><path d="M45 60V49a15 15 0 0 1 30 0v11" stroke="currentColor" stroke-width="5"/><path d="M60 76v10" stroke="currentColor" stroke-width="5" stroke-linecap="round"/></svg>
					</div>
					<h2><?php esc_html_e( 'Your Privacy Matters', 'baharhussain' ); ?></h2>
					<p><?php esc_html_e( 'I respect every agency and client agreement. Examples are shared carefully and only when permission allows.', 'baharhussain' ); ?></p>
					<ul>
						<li><span aria-hidden="true">✓</span><?php esc_html_e( 'Relevant to your project', 'baharhussain' ); ?></li>
						<li><span aria-hidden="true">✓</span><?php esc_html_e( 'Shared privately', 'baharhussain' ); ?></li>
						<li><span aria-hidden="true">✓</span><?php esc_html_e( 'Your details remain confidential', 'baharhussain' ); ?></li>
					</ul>
				</aside>

				<div class="private-work-request__form-card project-form">
					<header class="private-work-request__form-head">
						<h2 id="private-work-form-title"><?php esc_html_e( 'Tell Me What You Need', 'baharhussain' ); ?></h2>
						<p><?php esc_html_e( 'Share a few details and I will send the most relevant examples.', 'baharhussain' ); ?></p>
					</header>

					<?php if ( function_exists( 'gravity_form' ) ) { ?>
						<?php gravity_form( $bh_private_work_form_id, false, false, false, null, true, 0, true ); ?>
					<?php } elseif ( current_user_can( 'activate_plugins' ) ) { ?>
						<p class="private-work-request__admin-notice"><?php esc_html_e( 'Gravity Forms must be active to display the enquiry form.', 'baharhussain' ); ?></p>
					<?php } ?>

					<p class="private-work-request__privacy">
						<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="10" width="12" height="10" rx="2"></rect><path d="M9 10V7a3 3 0 0 1 6 0v3"></path></svg>
						<span><?php esc_html_e( 'Your details and shared examples will remain private.', 'baharhussain' ); ?></span>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="site-section private-work-next" aria-labelledby="private-work-next-title">
		<div class="wrapper">
			<h2 id="private-work-next-title"><?php esc_html_e( 'What Happens Next?', 'baharhussain' ); ?></h2>
			<ol>
				<li>
					<span>1</span>
					<div>
						<strong><?php esc_html_e( 'Submit your request', 'baharhussain' ); ?></strong>
						<p><?php esc_html_e( 'Tell me what you are planning.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li>
					<span>2</span>
					<div>
						<strong><?php esc_html_e( 'I review your needs', 'baharhussain' ); ?></strong>
						<p><?php esc_html_e( 'I select examples that match your project type.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li>
					<span>3</span>
					<div>
						<strong><?php esc_html_e( 'Receive private examples', 'baharhussain' ); ?></strong>
						<p><?php esc_html_e( 'Relevant work is sent directly to your email, usually within one business day.', 'baharhussain' ); ?></p>
					</div>
				</li>
			</ol>
		</div>
	</section>
</div>

<?php
get_footer();
