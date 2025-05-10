<?php
if (!defined('ABSPATH')) {
	die;
}

add_shortcode('subcat-amts', 'get_product_subcategories_list');

// Функция для получения подкатегорий одной конкретной категории
function get_product_subcategories_list($atts, $content, $tag)
{
	if (empty($atts['slug'])) {
		echo 'Вы не передали слаг';
	} else {
		$slug = $atts['slug'];
	}

	$template = empty($atts['template']) ? 'subcat' : $atts['template'];

	$result_arr = [];
	$taxonomy = 'product_cat';
	// Получаем родительскую категорию WP_Term object
	$parent = get_term_by('slug', $slug, $taxonomy);
	// Получаем массив с ID подкатегорий
	$children_ids = get_term_children($parent->term_id, $taxonomy);

	foreach ($children_ids as $children_id) {
		$term = get_term($children_id, $taxonomy); // WP_Term object
		$term_link = get_term_link($term, $taxonomy); // The term link
		if (is_wp_error($term_link)) $term_link = '';
		$thumbnail_id = get_term_meta($children_id, 'thumbnail_id', true);
		$url = wp_get_attachment_image_src($thumbnail_id, 'full');
		$result_arr[$children_id] = [
			'title' => $term->name,
			'link' => esc_url($term_link),
			'img' => $url[0],
			'description' => $term->description,
		];
	}
	ob_start();
	foreach ($result_arr as $cat) {
		require 'template-parts/content-'. $template .'.php';
	}
	return ob_get_clean();
}
