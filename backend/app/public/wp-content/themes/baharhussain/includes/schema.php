<?php
/**
 * Person schema customization for Yoast SEO.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'wpseo_schema_person', 'bh_schema_enhanced_person' );

/**
 * Supply the approved professional details for Yoast's Person entity.
 *
 * @param array $data Existing Person schema data.
 * @return array Person schema data.
 */
function bh_schema_enhanced_person( $data ) {
	$person = array(
		'@type'       => 'Person',
		'name'        => 'Bahar Hussain',
		'givenName'   => 'Bahar',
		'familyName'  => 'Hussain',
		'pronouns'    => 'He/Him',
		'jobTitle'    => 'WordPress Development Partner',
		'url'         => home_url( '/' ),
		'description' => 'Bahar Hussain is a WordPress developer helping digital agencies with custom WordPress themes, Gutenberg blocks, plugins, WooCommerce development, performance optimization, accessibility, and long-term website support.',
		'image'       => content_url( '/uploads/2026/07/profile-image.webp' ),
		'address'     => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => 'Lahore',
			'addressRegion'   => 'Punjab',
			'addressCountry'  => 'PK',
		),
		'sameAs'      => array(
			'https://www.linkedin.com/in/bahar-hussain/',
			'https://x.com/BaharHu24132545',
			'https://www.instagram.com/bahar___hussain/',
		),
		'knowsAbout'  => array(
			'WordPress Development',
			'Gutenberg Block Development',
			'Custom WordPress Theme Development',
			'WordPress Plugin Development',
			'WooCommerce Development',
			'WordPress Performance Optimization',
			'Web Accessibility',
		),
	);

	if ( ! empty( $data['@id'] ) ) {
		$person['@id'] = $data['@id'];
	}

	return $person;
}
