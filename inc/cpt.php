<?php
//add_action('init', 'woostudy_slider');
//function woostudy_slider(){
//	register_post_type('slider', [
//		'labels' =>[
//			'name' => __('slider', 'woostudy'),
//		],
//		'public' => true,
//		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
//		'menu_icon' => 'dashicons-format-gallery',
//
//	]);
//}

add_action('init', 'beauty_salon_masters');
function beauty_salon_masters() {
    register_post_type('masters', [
        'labels' => [
            'name'               => __('Мастера', 'beauty-salon'),
            'singular_name'      => __('Мастер', 'beauty-salon'),
            'add_new'           => __('Добавить нового', 'beauty-salon'),
            'add_new_item'      => __('Добавить нового мастера', 'beauty-salon'),
            'edit_item'         => __('Редактировать мастера', 'beauty-salon'),
            'new_item'          => __('Новый мастер', 'beauty-salon'),
            'view_item'         => __('Посмотреть мастера', 'beauty-salon'),
            'search_items'      => __('Найти мастера', 'beauty-salon'),
            'not_found'         => __('Мастеров не найдено', 'beauty-salon'),
            'menu_name'         => __('Мастера', 'beauty-salon'),
        ],
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-groups',
        'supports'            => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive'         => true,
        'rewrite'             => ['slug' => 'masters'],
        'show_in_rest'        => true,
    ]);
}

