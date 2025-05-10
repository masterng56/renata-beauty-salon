<?php
if (!defined('ABSPATH')) {
	die;
}

define('MASTERNG_URI', get_stylesheet_directory_uri());
define('MASTERNG_DIR', get_stylesheet_directory());

/**
 * Стили и скрипты
 */

add_action('wp_enqueue_scripts', 'masterng_shortcode_theme_styles', 100);
add_action('wp_head', function () {
	echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
}, 5);
function masterng_shortcode_theme_styles()
{

	// Шрифт
	wp_enqueue_style(
		'Montserrat',
		'https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@400;700&display=swap',
		array(),
		null
	);

	//	wp_enqueue_style(
	//		'woostudy-fontawesome',
	//		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css',
	//		array(),
	//		null
	//	);



	// wp_enqueue_style(
	// 	'animate',
	// 	MASTERNG_URI . '/assets/css/animate.min.css',
	// 	array(),
	// 	null
	// );

	wp_enqueue_style(
		'fontawesome',
		MASTERNG_URI . '/assets/fonts/fontawesome/fontawesome.min.css',
		array(),
		null
	);

	wp_enqueue_style(
		'bootstrap',
		MASTERNG_URI . '/assets/css/bootstrap.min.css',
		array(),
		null
	);

	// wp_enqueue_style(
	// 	'masterng-base',
	// 	MASTERNG_URI . '/assets/css/base.css',
	// 	null,
	// 	filemtime(MASTERNG_DIR . '/assets/css/base.css')
	// );

	wp_enqueue_style(
		'masterng-main',
		MASTERNG_URI . '/assets/css/main.css',
		array(),
		filemtime(MASTERNG_DIR . '/assets/css/main.css')
	);


	// wp_enqueue_style(
	// 	'masterng-mobile',
	// 	MASTERNG_URI . '/assets/css/mobile.css',
	// 	array(),
	// 	filemtime(MASTERNG_DIR . '/assets/css/mobile.css')
	// );

	//SCRIPTS

	wp_enqueue_script(
		'fontawesome',
		'https://kit.fontawesome.com/07f90b93b7.js',
		array(),
		null
	);

	wp_enqueue_script(
		'main',
		MASTERNG_URI . '/assets/js/main.js',
		array(),
		true,
		filemtime(MASTERNG_DIR . '/assets/js/main.js')
	);


	wp_enqueue_script(
		'bootstrap',
		MASTERNG_URI . '/assets/js/bootstrap.bundle.min.js',
		array(),
		true,
	);
}
