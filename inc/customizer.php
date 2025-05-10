<?php

add_action( 'customize_register', function ( WP_Customize_Manager $wp_customize ) {

	$wp_customize->add_section( 'wooeshop_theme_options', array(
		'title' => __( 'Theme options', 'wooeshop' ),
		'priority' => 10,
	) );

	// phone
	$wp_customize->add_setting( 'wooeshop_phone' );
	$wp_customize->add_control( 'wooeshop_phone', array(
		'label' => __( 'Phone in header', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );

	// youtube
	$wp_customize->add_setting( 'wooeshop_youtube' );
	$wp_customize->add_control( 'wooeshop_youtube', array(
		'label' => __( 'Youtube link', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );

	// facebook
	$wp_customize->add_setting( 'wooeshop_facebook' );
	$wp_customize->add_control( 'wooeshop_facebook', array(
		'label' => __( 'Facebook link', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );

	// instagram
	$wp_customize->add_setting( 'wooeshop_instagram' );
	$wp_customize->add_control( 'wooeshop_instagram', array(
		'label' => __( 'Instagram link', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );

	// youtube footer
	$wp_customize->add_setting( 'youtube' );
	$wp_customize->add_control( 'youtube', array(
		'label' => __( 'Youtube link footer', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );


	// facebook footer
	$wp_customize->add_setting( 'facebook' );
	$wp_customize->add_control( 'facebook', array(
		'label' => __( 'Facebook link footer', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );

	// instagram footer
	$wp_customize->add_setting( 'instagram' );
	$wp_customize->add_control( 'instagram', array(
		'label' => __( 'Instagram link footer', 'wooeshop' ),
		'section' => 'wooeshop_theme_options',
	) );

} );

function wooeshop_theme_options() {
	return array(
		'phone' => get_theme_mod( 'wooeshop_phone' ),
		'youtube' => get_theme_mod( 'wooeshop_youtube' ),
		'facebook' => get_theme_mod( 'wooeshop_facebook' ),
		'instagram' => get_theme_mod( 'wooeshop_instagram' ),
		'footer_youtube' => get_theme_mod( 'youtube' ),
		'footer_facebook' => get_theme_mod( 'facebook' ),
		'footer_instagram' => get_theme_mod( 'instagram' ),
	);
}
