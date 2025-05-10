<?php
if (!defined('ABSPATH')) {
	die;
}

/**
 * Шорткод слайдер
 */
class AMTStabs
{
	public function __construct()
	{
		add_action('init', [$this, 'cpt']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue']);
		add_shortcode('amts-tabs', [$this, 'amts_tabs']);
		add_shortcode('amts-horizontal-tabs', [$this, 'amts_horizontal_tabs']);
	}

	public function enqueue()
	{

		wp_enqueue_style(
			'amts-tabs',
			MASTERNG_URI . '/inc/shortcodes/tabs/css/amts-tabs.css',
			array(),
			null
		);

//		wp_enqueue_script(
//			'amts-tabs',
//			MASTERNG_URI . '/inc/shortcodes/tabs/js/amts-tabs.js',
//			array(),
//			null
//		);
	}

	public function amts_tabs()
	{
		ob_start();
		?>


		<?php
		get_template_part('inc/shortcodes/tabs/template-parts/content-addres');
		$args = array(
			'post_type' => 'tabs',
			'category_name' => '',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);
		$query = new WP_Query($args);

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();


			}
			wp_reset_postdata();
		}
		?>
		<script>
			function openCity(evt, cityName) {

				let i, tabcontent, tablinks;

				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}

				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}

				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
		</script>

		<?php return ob_get_clean();
	}

	public function amts_horizontal_tabs()
	{

		ob_start();
		$args = array(
			'post_type' => 'tabs',
			'category_name' => '',
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'ID',
			'order' => 'ASC',
		);
		$query = new WP_Query($args);

	if ($query->have_posts()) {
		?>
		<div class="tabs_wrapper">
		<!-- Вкладки -->
		<div class="container--tabs">
			<?php
			while ($query->have_posts()) {
				$query->the_post();
				?>

					<h3 class="tab tab_title"><?php the_title() ?></h3>

			<?php } ?>
		</div>

		<!-- Содержимое вкладок -->
		<div class="container--content">
			<?php
			while ($query->have_posts()) {
				$query->the_post();
				?>

				<div class="content tabs_item">
					<div>
						<?php echo get_the_content(); ?>
					</div>
					<div>
						<?php if(get_the_content() != 'Ищем представителей в Республике Кыргызстан') : echo get_the_excerpt(); ?>
						<?php endif; ?>
					</div>
				</div>

			<?php }

			wp_reset_postdata();
			}

			?>
		</div>
		</div>
		<script>
			const tabs = document.querySelectorAll(".tab");
			const contents = document.querySelectorAll(".content");

			tabs[0].classList.add('tab--active');
			contents[0].classList.add('content--active');

			for (let i = 0; i < tabs.length; i++) {
				tabs[i].addEventListener("click", ( event ) => {
					let tabsChildren = event.target.parentElement.children;
					for (let t = 0; t < tabsChildren.length; t++) {
						tabsChildren[t].classList.remove("tab--active");
					}
					tabs[i].classList.add("tab--active");

					let tabContentChildren = event.target.parentElement.nextElementSibling.children;
					for (let c = 0; c < tabContentChildren.length; c++) {
						tabContentChildren[c].classList.remove("content--active");
					}
					contents[i].classList.add("content--active");
				});
			}
		</script>
		<?php
		return ob_get_clean();
	}


	public function cpt()
	{

		register_post_type('tabs', [
			'label' => null,
			'labels' => [
				'name' => 'Филиал',
				'singular_name' => 'Филиал',
				'add_new' => 'Добавить',
				'add_new_item' => 'Добавить',
				'edit_item' => 'Редактировать',
				'new_item' => 'Новый',
				'all_items' => 'Филиал',
				'view_item' => 'Просмотр',
				'search_items' => 'Искать',
				'not_found' => 'Ничего не найдено.',
				'menu_name' => 'Филиалы',
			],
			'description' => 'Филиал',
			'public' => true,
//			'rewrite' => ['slug'=>'properties'],
			'show_ui' => true,
//		'taxonomies'    => [ 'actions' ],
			'show_in_rest' => false, //если значение true, то будет использоваться редактор gutenberg
			'has_archive' => false,
			'query_var' => true,
			'menu_icon' => 'dashicons-location',
			'menu_position' => 10,
			'supports' => ['title', 'page-attributes', 'thumbnail', 'editor', 'excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments'
		]);
	}
}

$AMTStabs = new AMTStabs();
