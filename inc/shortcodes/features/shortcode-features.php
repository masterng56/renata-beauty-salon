<?php
if (!defined('ABSPATH')) {
	die;
}

/**
 * Шорткод слайдер
 */
class AMTSfeatures
{
	public function __construct()
	{
		add_action('init', [$this, 'cpt']);
//		add_action('wp_enqueue_scripts', [$this, 'enqueue']);
		add_shortcode('amts-features', [$this, 'amts_features']);
	}

	public function enqueue()
	{

		wp_enqueue_style(
			'amts-features',
			MASTERNG_URI . '/inc/shortcodes/slider/css/amts-features.css',
			array(),
			null
		);

	}

	public function amts_features()
	{
		ob_start();
		?>
		<div class="features_wrapper">
				<?php

				$args = array(
					'post_type' => 'features',
					'category_name' => '',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						get_template_part('inc/shortcodes/features/template-parts/content-features');
					}
					wp_reset_postdata();
				}
				?>

		</div>

		<?php return ob_get_clean();
	}

	public function cpt(){

		register_post_type('features', [
			'label' => null,
			'labels' => [
				'name' => 'Преимущества',
				'singular_name' => 'Преимущества',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавить',
				'edit_item' => 'Редактировать',
				'new_item' => 'Новый',
				'all_items' => 'Отзывы',
				'view_item' => 'Просмотр',
				'search_items' => 'Искать',
				'not_found' => 'Ничего не найдено.',
				'menu_name' => 'Преимущества',
			],
			'description' => 'Преимущества',
			'public' => true,
//			'rewrite' => ['slug'=>'properties'],
			'show_ui' => true,
//		'taxonomies'    => [ 'actions' ],
			'show_in_rest' => false, //если значение true, то будет использоваться редактор gutenberg
			'has_archive' => false,
			'query_var' => true,
			'menu_icon' => 'dashicons-format-status',
			'menu_position' => 11,
			'supports' => ['title', 'page-attributes', 'thumbnail', 'excerpt'],
		]);
	}
}

$AMTSfeatures = new AMTSfeatures();
