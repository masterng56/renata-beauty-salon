<?php
// This file is generated. Do not modify it manually.
return array(
	'btn-appoint' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'masterng/btn-appoint',
		'version' => '0.1.0',
		'title' => 'Кнопка записи',
		'category' => 'text',
		'icon' => 'calendar-alt',
		'description' => 'Кнопка для записи на прием',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string',
				'default' => 'Записаться',
				'sourse' => 'html',
				'selector' => 'a'
			)
		),
		'textdomain' => 'masterng',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'header' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'masterng/header-masterng',
		'version' => '0.1.0',
		'title' => 'header-masterng',
		'category' => 'text',
		'icon' => 'smiley',
		'description' => 'Хедер для сайта салона красоты',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'attributes' => array(
			'logoUrl' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'src'
			),
			'brandTitle' => array(
				'type' => 'string',
				'default' => 'RENATA'
			)
		),
		'textdomain' => 'masters',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'hero-block' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'masterng/hero-block',
		'version' => '0.1.0',
		'title' => 'Hero block',
		'category' => 'text',
		'icon' => 'smiley',
		'description' => 'Хироу блок',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'color' => array(
				'background' => true,
				'text' => true
			)
		),
		'attributes' => array(
			'heroTitle' => array(
				'type' => 'string',
				'source' => 'rich-text',
				'selector' => '.site-title.main-title',
				'default' => 'Салон красоты "renata"'
			),
			'heroDesc' => array(
				'type' => 'string',
				'source' => 'rich-text',
				'selector' => '.site-slogan.font-releway.font24',
				'default' => 'Запишись к профисеоналам прямо сейчас! Теперь Online!'
			),
			'backgroundImage' => array(
				'type' => 'string',
				'default' => 'http://renata-block-theme.loc/wp-content/uploads/2025/04/cover-full-1.jpg'
			),
			'backgroundColor' => array(
				'type' => 'string'
			),
			'textColor' => array(
				'type' => 'string'
			),
			'gradientStartColor' => array(
				'type' => 'string',
				'default' => 'rgba(0, 0, 0, 0.1)'
			),
			'gradientEndColor' => array(
				'type' => 'string',
				'default' => 'rgba(255, 119, 119, 0.85)'
			),
			'gradientAngle' => array(
				'type' => 'number',
				'default' => 0
			)
		),
		'textdomain' => 'masters',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'inner-styles' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'masterng/inner-styles',
		'version' => '0.1.0',
		'title' => 'Внутренние стили',
		'category' => 'text',
		'icon' => 'calendar-alt',
		'description' => 'Как использовать внутренние стили',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'text' => array(
				'type' => 'string',
				'default' => 'Записаться',
				'sourse' => 'html',
				'selector' => 'a'
			)
		),
		'textdomain' => 'masterng',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'masters' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'masterng/masters',
		'version' => '0.1.0',
		'title' => 'Masters',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'Блок для сайта салона красоты который выводит мастеров',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'masters',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	),
	'slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'masterng/reviews-slider',
		'version' => '0.1.0',
		'title' => 'Слайдер Отзывов',
		'category' => 'text',
		'icon' => 'calendar-alt',
		'description' => 'Слайдер отзывов клиентов.',
		'example' => array(
			
		),
		'supports' => array(
			'align' => true
		),
		'attributes' => array(
			'slides' => array(
				'type' => 'array',
				'default' => array(
					array(
						'imageUrl' => '',
						'name' => 'Имя клиента',
						'text' => 'Текст отзыва...'
					)
				),
				'items' => array(
					'type' => 'object',
					'properties' => array(
						'imageUrl' => array(
							'type' => 'string'
						),
						'name' => array(
							'type' => 'string'
						),
						'text' => array(
							'type' => 'string'
						)
					)
				)
			)
		),
		'textdomain' => 'masterng',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js'
	)
);
