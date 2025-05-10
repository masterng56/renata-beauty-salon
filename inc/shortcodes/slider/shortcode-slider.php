<?php
if (!defined('ABSPATH')) {
	die;
}

/**
 * Шорткод слайдер
 */
class AMTSreviews
{
	public function __construct()
	{
		add_action('init', [$this, 'cpt']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue']);
		add_shortcode('amts-slider', [$this, 'amts_slider']);
		add_shortcode('amts-reviews', [$this, 'amts_reviews']);
	}

	public function enqueue()
	{

		wp_enqueue_style(
			'swiper-bundle',
			MASTERNG_URI . '/inc/shortcodes/slider/css/swiper-bundle.min.css',
			array(),
			null
		);

		wp_enqueue_script(
			'swiper-bundle',
			MASTERNG_URI . '/inc/shortcodes/slider/js/swiper-bundle.min.js',
			array(),
			null
		);
	}

	public function amts_reviews()
	{
		ob_start();
		?>
		<style>
        .amts_reviews {
            height: 100%;
        }

        .swiper-pagination-bullet {
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 12px;
            color: #000;
            opacity: 1;
            background: rgba(0, 0, 0, 0.2);
        }

        .swiper-pagination-bullet-active {
            color: #fff;
            background: #007aff;
        }
		</style>
		<!-- Slider main container -->
		<div class="swiper amts_reviews wow animate__animated animate__fadeInRight animate__faster">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper reviews_wrapper">
				<?php

				$args = array(
					'post_type' => 'reviews',
					'category_name' => '',
					'post_status' => 'publish',
					'posts_per_page' => -1,
				);
				$query = new WP_Query($args);

				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						get_template_part('inc/shortcodes/slider/template-parts/content-reviews');
					}
					wp_reset_postdata();
				}
				?>
			</div>
			<!--			<div class="swiper-pagination reviews_pagination"></div>-->
			<!--			<div class="swiper-button-prev reviews_prev"></div>-->
			<!--			<div class="swiper-button-next reviews_next"></div>-->
		</div>


		<script>
			let reviews = new Swiper(".amts_reviews", {
				slidesPerView: 1,
				spaceBetween: 30,
				centeredSlides: true,
				loop: true,
				autoplay: {
					delay: 5000,
				},
				pagination: {
					el: ".swiper-pagination",
					// type: "fraction", //пагинация цифрами
					// type: "progressbar", //всесто булитов прогрес бар полоска
					// dynamicBullets: true, //булиты уменьшаются в размере, активный самый большой
					clickable: true, //кликабельные булиты
					renderBullet: function (index, className) {
						return '<span class="' + className + '">' + (index + 1) + "</span>";
					},
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
			});
		</script>
		<?php return ob_get_clean();
	}

	public function amts_slider()
	{

		ob_start();
		?>

		<style>
        swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper {
            /* width: 100%; */
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-pagination-bullet {
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 12px;
            color: #000;
            opacity: 1;
            background: rgba(0, 0, 0, 0.2);
        }

        .swiper-pagination-bullet-active {
            color: #fff;
            background: #007aff;
        }
		</style>


		<div class="container">
			<!-- Swiper -->
			<div class="swiper amts_slider">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->

					<?php
					$args = array(
						'post_type' => 'slider',
						'category_name' => '',
						'post_status' => 'publish',
						'posts_per_page' => -1,
					);
					$query = new WP_Query($args);

					if ($query->have_posts()) {
						while ($query->have_posts()) {
							$query->the_post();
							get_template_part('inc/shortcodes/slider/template-parts/content-slider');
						}
						wp_reset_postdata();
					}
					?>


				</div>
			</div>

			<!-- Initialize Swiper -->
			<script>
				let swiper = new Swiper(".amts_slider", {
					loop: true,
					autoplay: {
						delay: 5000,
					},
					pagination: {
						el: ".swiper-pagination",
						type: "fraction",
					},
					navigation: {
						nextEl: ".swiper-button-next",
						prevEl: ".swiper-button-prev",
					},
				});
			</script>
		</div>

		<?php return ob_get_clean();
	}

	public function cpt()
	{

		register_post_type('reviews', [
			'label' => null,
			'labels' => [
				'name' => 'Отзывы',
				'singular_name' => 'Отзыв',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавить',
				'edit_item' => 'Редактировать',
				'new_item' => 'Новый',
				'all_items' => 'Отзывы',
				'view_item' => 'Просмотр',
				'search_items' => 'Искать',
				'not_found' => 'Ничего не найдено.',
				'menu_name' => 'Отзывы',
			],
			'description' => 'Отзывы',
			'public' => true,
//			'rewrite' => ['slug'=>'properties'],
			'show_ui' => true,
//		'taxonomies'    => [ 'actions' ],
			'show_in_rest' => false, //если значение true, то будет использоваться редактор gutenberg
			'has_archive' => false,
			'query_var' => true,
			'menu_icon' => 'dashicons-format-status',
			'menu_position' => 10,
			'supports' => ['title', 'page-attributes', 'thumbnail', 'excerpt'],
		]);

		register_post_type('slider', [
			'label' => null,
			'labels' => [
				'name' => 'Слайд',
				'singular_name' => 'Слайд',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавить',
				'edit_item' => 'Редактировать',
				'new_item' => 'Новый',
				'all_items' => 'Слайды',
				'view_item' => 'Просмотр',
				'search_items' => 'Искать',
				'not_found' => 'Ничего не найдено.',
				'menu_name' => 'Слайдер',
			],
			'description' => 'Слайды',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => false,
			'has_archive' => false,
			'query_var' => true,
			'menu_icon' => 'dashicons-format-status',
			'menu_position' => 10,
			'supports' => ['title', 'page-attributes', 'thumbnail', 'excerpt'],
		]);
	}
}

$AMTSreviews = new AMTSreviews();
