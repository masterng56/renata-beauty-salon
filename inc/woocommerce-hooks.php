<?php

//добавляем класс тегу form
add_filter( 'aws_searchbox_markup', 'add_class_too_teg_form', 10, 2 );
function add_class_too_teg_form( $markup, $params ) {
	$search  = '<form class="aws-search-form"';
	$replace = '<form class="aws-search-form product_search"';
	$markup  = str_replace( $search, $replace, $markup );

	return $markup;
}

//Пагинация
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
//add_action( 'woocommerce_after_main_content', 'woocommerce_pagination', 10 );

function custom_woocommerce_pagination_args($args) {
	$args['end_size'] = 1; // Количество элементов в начале и конце пагинации
	$args['mid_size'] = 1; // Количество элементов в середине пагинации
	$args['prev_next'] = true; // Отображение кнопок "Предыдущая" и "Следующая"
	$args['prev_text'] = '<i class="fa-solid fa-chevron-left"></i>'; // Текст кнопки "Предыдущая"
	$args['next_text'] = '<i class="fa-solid fa-chevron-right"></i>'; // Текст кнопки "Следующая"
	$args['type'] = 'plain'; // Вид пагинации (list - список, numbers - числа, prev_next - кнопки "Предыдущая" и "Следующая")
	$args['per_page'] = 5; // Установите желаемое количество элементов на страницу

	return $args;
	}

add_filter('woocommerce_pagination_args', 'custom_woocommerce_pagination_args', 10, 1);

//отключаем отображение количества станиц
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

//отключаем отображение сортировки
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

//отключаем все стили woocommerce
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

//отключаем вывод распродажи на странице товара
remove_action('woocommerce_show_product_sale_flash', 'woocommerce_before_single_product_summary', 10);

//отвязываем хлебные крошки от хука woocommerce_before_main_content
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

//отключаем рейтинк на странице товара
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);

//отключаем цену на странице товара
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

function amts_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => '',
			'single_image_width'    => 620,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'amts_woocommerce_setup' );

//Получаем url категории по ID
function get_cat_url($id)
{
	echo get_term_link( $id, 'product_cat' );
}


//переопределение функции вывода списка категорий товаров
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

add_action('woocommerce_shop_loop_subcategory_title', function ($category){
//	var_dump($category);
echo '<h3 class="grammer_title">'. esc_html($category->name) .'</h3>
			<p class="model_description">'. $category->description .'</p>';
});

//переопределение функции вывода ссылки категории на домашней странице
remove_action('woocommerce_before_subcategory', 'woocommerce_template_loop_category_link_open', 10);

add_action('woocommerce_before_subcategory', 'category_link_open_amts', 10);
function category_link_open_amts( $category ) {
	echo '<a class="model_item"' . ' href="' . esc_url( get_term_link( $category, 'product_cat' ) ) . '">';
}

//убираем обертку ссылкой
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

//отключаем вывод надписи распродажа
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

//отключаем заголовок карточки
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

//выводим заголовок карточки товара
add_action('woocommerce_shop_loop_item_title', function (){
	global $product;
	echo '<a class="product_title" href="'. $product->get_permalink() .'">'. $product->get_title() .'</a>';
});
//отключаем рейтинг
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

//отвязывает похожие товары от акшина woocommerce_after_single_product_summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//меняем количество выводимого похожего товара на странице товара
add_filter( 'woocommerce_output_related_products_args', 'amts_products_args', 25 );

function amts_products_args( $args ) {
	$args[ 'posts_per_page' ] = 3; // сколько штук отображать
	$args[ 'columns' ] = 3; // сколько штук в одном ряду
	return $args;
}

//Изменяем кнопку заказать
add_filter( 'woocommerce_loop_add_to_cart_link', 'btn_order');

add_filter('woocommerce_single_product_summary', 'btn_order', 60);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
//add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 60);

function btn_order($link)
{
	global $product;
	echo '<button class="btn btn_order btn_popup_amts"' . ' data-title ="' . $product->get_title() . '">'. __("Anfrage", "auras") .'</button>';
}



//хлебные крошки
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb',20);
add_filter('woocommerce_breadcrumb_defaults', function (){
	if(is_shop()){
		return [
			'delimiter' => '&nbsp;/&nbsp;',
			'wrap_before' => '<nav class="breadcrumb shop_breadcrumb">',
			'wrap_after' => '</nav>',
			'before' => '',
			'after' => '',
			'home' => __('Start', 'auras'),
		];
	}
	elseif (is_product()){
		return [
			'delimiter' => '&nbsp;/&nbsp;',
			'wrap_before' => '<nav class="breadcrumb single_breadcrumb">',
			'wrap_after' => '</nav>',
			'before' => '',
			'after' => '',
			'home' => __('Start', 'auras'),
		];
	}
	else{
		return [
			'delimiter' => '&nbsp;/&nbsp;',
			'wrap_before' => '<nav class="breadcrumb">',
			'wrap_after' => '</nav>',
			'before' => '',
			'after' => '',
			'home' => __('Start', 'auras'),
		];
	}

});

//нотайсы
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

//Регистрируем сайдбар
add_action( 'widgets_init', 'auras_sidebar_setup' );
function auras_sidebar_setup(){

	register_sidebar( array(
		'name'          => esc_html__('sidebar', 'auras'),
		'id'            => "sidebar-1",
		'description'   => esc_html__('Добавьте виджет сюда', 'auras'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => "</section>\n",
	) );
}

//Включаем отображение сайдбара только на странице магазина
add_action('woocommerce_sidebar', 'add_sidebar_only_archive', 10);
function add_sidebar_only_archive()
{
	if (! is_product()){
		woocommerce_get_sidebar();
	}
}

//изменяем порядок сортировки по ID при выводе товара на строанице магазина
add_filter( 'woocommerce_default_catalog_orderby', 'default_catalog_orderby' );
function default_catalog_orderby( $sort_by ) {
	return 'id';
}

function display_categories_with_subcategories() {
	// Получение всех категорий
	$args = array(
		'taxonomy' => 'product_cat', //если изменить таксономию на 'category' то функция выведет обычные категории wordpress
		'orderby' => 'name',
		'order' => 'ASC',
		'hide_empty' => true,
	);
	$categories = get_categories($args);

	// Функция для вывода категорий и подкатегорий рекурсивно
	function display_category_hierarchy($categories, $parent_id = 0, $level = 0) {
		foreach ($categories as $category) {
			if ($category->parent == $parent_id) {
				echo str_repeat('&nbsp;', $level * 4) . '- ' . $category->name . '<br>';

				// Вызов функции рекурсивно для подкатегорий
				display_category_hierarchy($categories, $category->term_id, $level + 1);
			}
		}
	}

	// Начало вывода категорий
	if (!empty($categories)) {
		echo '<div class="category-list">';
		display_category_hierarchy($categories);
		echo '</div>';
	} else {
		echo __('Es wurden keine Kategorien gefunden.', 'auras');
	}
}

//Изменяем надписи в табах на странице продукта
add_filter('woocommerce_product_tabs', 'amts_change_product_tabs_text', 98);
function amts_change_product_tabs_text($tabs) {
	// Изменение текста вкладки описания
	if (isset($tabs['description']['title'])) {
		$tabs['description']['title'] = __('Beschreibung', 'auras');
	}
	// Изменение текста вкладки дополнительных информации
	if (isset($tabs['additional_information']['title'])) {
		$tabs['additional_information']['title'] = __('Einzelheiten', 'auras');
	}
	// Изменение текста вкладки отзывов
	if (isset($tabs['reviews']['title'])) {
		$tabs['reviews']['title'] = __('Rezensionen', 'auras');
	}
	return $tabs;
}

//заменяме надпись детали на странице пролукта
function amts_product_additional_information_heading() {
	return 'Produktdetails';
}
add_filter( 'woocommerce_product_additional_information_heading', 'amts_product_additional_information_heading' );

//заменяме надписи "вес", "габариты" и "похожие товары" на странице пролукта
function custom_woocommerce_text_strings( $translated_text, $text, $domain ) {
	// Проверяем, что это текст из WooCommerce
	if ( $domain === 'woocommerce' ) {
		switch ( $text ) {
			case 'Weight' :
				$translated_text = 'Produktgewicht'; // вес
				break;
			case 'Dimensions' :
				$translated_text = 'Produktabmessungen'; // габариты
				break;
			case 'Related products' :
				$translated_text = 'Ähnliche Produkte';
				break;
		}
	}
	return $translated_text;
}
add_filter( 'gettext', 'custom_woocommerce_text_strings', 20, 3 );

// меняем надпись "резульат поисак" на стронице поиска
function custom_search_page_title( $page_title ) {
	if ( is_search() && ! is_admin() ) {
			$page_title = sprintf( __( 'Suchergebnisse: %s', 'auras' ), get_search_query() );
	}
	return $page_title;
}
add_filter( 'woocommerce_page_title', 'custom_search_page_title' );

//Изменяем надпись "Товаров, соответствующих вашему запросу, не обнаружено." на немецкую
remove_action( 'woocommerce_no_products_found', 'wc_no_products_found' );
add_action( 'woocommerce_no_products_found', 'amts_custom_no_products_message' );

function amts_custom_no_products_message() {
    echo '<h1>Es wurden keine Produkte gefunden, die Ihrer Anfrage entsprechen.</h1>';
}

//функци выводит изображение и описание категории по её ID
function display_category_details($category_ids) {
    if (empty($category_ids)) {
        echo 'Категории не найдены.';
        return;
    }

    foreach ($category_ids as $category_id) {
        $category = get_term_by('id', $category_id, 'product_cat');

        if ($category) {
            $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
            $image_url = wp_get_attachment_url($thumbnail_id);
            $description = term_description($category_id, 'product_cat');

            // Подключаем шаблон и передаем в него данные
            $template_path = locate_template('woocommerce/category-details-template.php');

            if ($template_path) {
                include $template_path;
            } else {
                echo '<p>Шаблон не найден.</p>';
            }
        } else {
            echo '<p>Категория с ID ' . esc_html($category_id) . ' не найдена.</p>';
        }
    }
}



//обновление мини корзины
//add_filter('woocommerce_add_to_cart_fragments', function ($fragments){
//	$fragments['.mini-cart-cnt'] = '<span class="badge mini-cart-cnt">'. count(WC()->cart->get_cart()) . '</span>';
//
//	return $fragments;
//});

//обновление количества товаров в корзине
//add_filter('woocommerce_add_to_cart_fragments', function ($fagments){
//	$fagments['.cart_count'] = '<span class="cart_count">' . count(WC()->cart->get_cart()) . '</span>';
//	return $fagments;
//});

//удаляем ненужные поля
//add_filter('woocommerce_checkout_fields', 'medlaborsk_override_checkout_fields');
//function medlaborsk_override_checkout_fields ($fields){
//	unset($fields['billing']['billing_last_name']);
//	unset($fields['billing']['billing_country']);
//	unset($fields['billing']['billing_address_1']);
//	unset($fields['billing']['billing_state']);
//	unset($fields['billing']['billing_postcode']);
//	unset($fields['billing']['billing_city']);
//	unset($fields['shipping']['shipping_first_name']);
//	unset($fields['shipping']['shipping_last_name']);
//	unset($fields['shipping']['shipping_country']);
//	unset($fields['shipping']['shipping_address_1']);
//	unset($fields['shipping']['shipping_city']);
//	unset($fields['shipping']['shipping_state']);
//	unset($fields['shipping']['shipping_postcode']);
//	unset($fields['order']['order_comments']);
//	return $fields;
//}

//отключаем сайдбар на странице товара. если условный тег "is_product()" не срабатывает то нужно повесить колбек на какой нибудь основной хук
//add_action('template_redirect', function (){
//	if(is_product()){
//		remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
//	}
//});

//отключаем обертку
//remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//меняем обертку
//add_action('woocommerce_before_main_content', function (){
//	echo '<div class="container" >';
//}, 10);
//
//add_action('woocommerce_after_main_content', function (){
//	echo '</div>';
//}, 10);

//меняем приоритет хлебным крошкам с 20 на 5
//remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
//add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 5);
//add_action('woocommerce_before_main_content', 'woocommerce_pagination', 9);