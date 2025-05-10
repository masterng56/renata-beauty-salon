<?php
add_action( 'init', 'amethyst_register_pattern_categories' );

function amethyst_register_pattern_categories() {
	register_block_pattern_category( 'amethyst-studio/amethyst', array(
		'label'       => __( 'Amethyst', 'amethyst-studio' ),
		'description' => __( 'Паттерны для Theme amethyst-studio.', 'amethyst' )
	) );
}

add_action( 'init', 'amethyst_register_patterns' );

function amethyst_register_patterns() {
	register_block_pattern( 'amethyst-studio/hero-masterng', array(
		'title'      => __( 'hero-masterng', 'amethyst-studio' ),
		'categories' => array( 'text', 'amethyst-studio/amethyst' ),
		'source'     => 'amethyst-studio',
		'content'    => get_pattern_content('patterns/hero-masterng.php')
	) );

	register_block_pattern( 'amethyst-studio/hero-amethyst', array(
		'title'      => __( 'hero-amethyst', 'amethyst-studio' ),
		'categories' => array( 'text', 'amethyst-studio/amethyst' ),
		'source'     => 'amethyst-studio',
		'content'    => get_pattern_content('patterns/hero-amethyst.php')
	) );
}

function get_pattern_content($file) {
	ob_start();
	include get_theme_file_path($file);
	return ob_get_clean();
}