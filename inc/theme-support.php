<?php


function amts_add_woocommerce_support(){
	load_theme_textdomain('auras', get_template_directory() . '/languages');
	//включаем поддержку вукомерс, после включения магазин будет использовать шаблон archive-product.php
	add_theme_support('woocommerce');
	//включаем поддержку title страниц
	add_theme_support('title-tag');
	add_theme_support('post-thumbnail');
	//подключаем функционал для страницы товара
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'align-wide' );
	register_nav_menus(
		[
			'header_menu' => __('Главное меню', 'auras'),
			'cat_menu' => __('Категории', 'auras'),
			'mobile_menu' => __('Мобильное меню', 'auras'),
		]
	);
}

add_action('after_setup_theme', 'amts_add_woocommerce_support');

function vd($data){
echo '<pre>';
var_dump($data);
echo '</pre>';
}