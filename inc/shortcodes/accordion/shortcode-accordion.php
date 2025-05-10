<?php
if (!defined('ABSPATH')) {
	die;
}

/**
 * Шорт код Аккордион
 */
class AMTSaccordion
{
	public function __construct()
	{
		add_action('init', [$this, 'cpt']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue',], 99);
		add_shortcode('amts-accordion', [$this, 'accordion']);
		add_shortcode('amts-categories', [$this, 'amts_categories']);
	}

	public function enqueue()
	{

		wp_enqueue_style(
			'amts-accordion',
			MASTERNG_URI . '/inc/shortcodes/accordion/css/amts-accordion.css',
			array(),
			null
		);

		wp_enqueue_script(
			'amts-accordion',
			MASTERNG_URI . '/inc/shortcodes/accordion/js/amts-accordion.js',
			array(),
			null,
			false
		);

	}

	public function cpt()
	{

		register_post_type('amts-faq', [
			'label' => null,
			'labels' => [
				'name' => 'Часто задаваемые вопросы',
				'singular_name' => 'ЧЗВо',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавить',
				'edit_item' => 'Редактировать',
				'new_item' => 'Новый',
				'all_items' => 'Часто задаваемые вопросы',
				'view_item' => 'Просмотр',
				'search_items' => 'Искать',
				'not_found' => 'Ничего не найдено.',
				'menu_name' => 'ЧЗВо',
			],
			'description' => 'Часто задаваемые вопросы',
			'public' => true,
//			'rewrite' => ['slug'=>'properties'],
			'show_ui' => true,
//		'taxonomies'    => [ 'actions' ],
			'show_in_rest' => false, //если значение true, то будет использоваться редактор gutenberg
			'has_archive' => false,
			'query_var' => true,
			'menu_icon' => 'dashicons-info',
			'menu_position' => 10,
			'supports' => ['title', 'page-attributes', 'excerpt'],
		]);
	}

	function accordion()
	{
		ob_start();
		?>

		<div class="accordion_wrapper faq_wrapper" id="accordion_amt">
			<div class="accordion_list faq_list">
				<?php
				$args = array(
					'post_type' => 'amts-faq',
					'category_name' => '',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'orderby' => 'ID',
					'order' => 'ASC',
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						get_template_part('inc/shortcodes/accordion/template-parts/faq');
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>

		<!--		<script>-->
		<!--			window.addEventListener('load', function () {-->
		<!--				const accordion = document.querySelectorAll('.accordion');-->
		<!---->
		<!--				for (item of accordion) {-->
		<!--					item.addEventListener('click', function () {-->
		<!---->
		<!--						if (this.classList.contains('active')) {-->
		<!--							this.classList.remove('active');-->
		<!--						} else {-->
		<!--							for (el of accordion) {-->
		<!--								el.classList.remove('active');-->
		<!--							}-->
		<!--							this.classList.add('active');-->
		<!--						}-->
		<!---->
		<!--					});-->
		<!---->
		<!--				}-->
		<!---->
		<!--				document.querySelectorAll('.accordion').forEach((el) => {-->
		<!--					el.addEventListener('click', () => {-->
		<!---->
		<!--						let content = el.nextElementSibling;-->
		<!---->
		<!--						if (content.style.maxHeight) {-->
		<!--							document.querySelectorAll('.accordion_content').forEach((el) => el.style.maxHeight = null)-->
		<!--						} else {-->
		<!--							document.querySelectorAll('.accordion_content').forEach((el) => el.style.maxHeight = null)-->
		<!--							content.style.maxHeight = content.scrollHeight + 'px'-->
		<!--						}-->
		<!---->
		<!--					});-->
		<!--				});-->
		<!--			});-->
		<!--		</script>-->
		<?php return ob_get_clean();
	}

	function amts_categories($atts, $content, $tag){
		if (empty($atts['slug'])) {
			echo 'Вы не передали слаг';
		} else {
			$slug = $atts['slug'];
		}
		ob_start();
		?>

		<div class="categories">
			<ul class="cat_wrapper">
				<?php

				$categories = get_terms(
					'product_cat',
					array(
						'hierarchical' => true,
						'hide_empty' => 1,
						'parent' => 0
					)
				);

				foreach ($categories as $cat) { ?>
					<li class="accordion_item cat_item">

						<?php $temp_cat = get_terms(
							'product_cat',
							array(
								'hierarchical' => true,
								'hide_empty' => 1,
								'parent' => $cat->term_id
							)
						);

						$class = '';
						if ($temp_cat) {
							$class = 'has_child';

							require 'template-parts/'.$slug.'/subcat-title-categories.php';

						} else {
							$class = 'no_child';

							require 'template-parts/'.$slug.'/title-categories.php';

						}

						if ($temp_cat) {
							require 'template-parts/'.$slug.'/content-categories.php';
						}

						?>

					</li>
				<?php } ?>
			</ul>
		</div>

		<?php return ob_get_clean();
	}
}

$AMTSaccordion = new AMTSaccordion();

