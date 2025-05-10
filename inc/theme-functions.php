<?php


function amts_add_woocommerce_support(){
	load_theme_textdomain('auras', get_template_directory() . '/languages');
	//включаем поддержку вукомерс, после включения магазин будет использовать шаблон archive-product.php
	add_theme_support('woocommerce');
	//включаем поддержку title страниц
	add_theme_support('title-tag');
	add_theme_support('post-thumbnail');
	add_theme_support( 'custom-logo' );
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


//функция получает URL текущей страницы с добавлением /en
function get_current_page_url_with_en() {
	// Получаем текущий URL
	$current_url = (is_ssl() ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	// Разбираем URL на части
	$url_parts = parse_url($current_url);

	// Создаем новый URL с добавлением /en к пути
	$new_path = '/en' . (isset($url_parts['path']) ? $url_parts['path'] : '');

	// Собираем новый URL
	$new_url = (isset($url_parts['scheme']) ? $url_parts['scheme'] . '://' : '') .
		(isset($url_parts['host']) ? $url_parts['host'] : '') .
		$new_path .
		(isset($url_parts['query']) ? '?' . $url_parts['query'] : '') .
		(isset($url_parts['fragment']) ? '#' . $url_parts['fragment'] : '');

	return $new_url;
}

//функция получает URL текущей страницы и удаляет /en
function remove_en_from_current_page_url() {
	// Получаем текущий URL
	$current_url = (is_ssl() ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

	// Разбираем URL на части
	$url_parts = parse_url($current_url);

	// Проверяем, начинается ли путь с /en и удаляем его
	if (isset($url_parts['path']) && strpos($url_parts['path'], '/en') === 0) {
		// Удаляем /en из пути
		$new_path = substr($url_parts['path'], 3); // 3 символа, т.к. длина строки "/en" = 3
	} else {
		// Если /en не найдено в начале пути, оставляем путь без изменений
		$new_path = $url_parts['path'];
	}

	// Собираем новый URL без /en
	$new_url = (isset($url_parts['scheme']) ? $url_parts['scheme'] . '://' : '') .
		(isset($url_parts['host']) ? $url_parts['host'] : '') .
		$new_path .
		(isset($url_parts['query']) ? '?' . $url_parts['query'] : '') .
		(isset($url_parts['fragment']) ? '#' . $url_parts['fragment'] : '');

	return $new_url;
}


function vd($data){
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}
