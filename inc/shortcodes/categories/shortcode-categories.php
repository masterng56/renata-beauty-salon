<?php
if (!defined('ABSPATH')) {
	die;
}

/**
 * Шорт код Категории
 */
class AMTScategories {
	public function __construct(){
	//		add_action('wp_enqueue_scripts', [$this, 'enqueue',]);
		add_shortcode('amts-categories', [$this, 'amts_categories']);
		add_shortcode('amts-cat-w-exeotion', [$this, 'amts_categories_with_exceptions']);
	}

	public function enqueue(){
		wp_enqueue_style(
			'amts-accordion.css',
			MASTERNG_URI . '/inc/shortcodes/accordion/css/amts-accordion.css',
			array(),
			null
		);
	}

	public function amts_categories()
{
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
						?>
						<div class="accordion cat_accordion">
							<h4 class="accordion_title cat_title">
								<?php echo $cat->name; ?>
							</h4>
						</div>
						<?php
					} else {
						$class = 'no_child';
						?>

						<h4 class="accordion_title cat_title without_subcat">
							<a class="accordion_link" href="<?php echo get_term_link($cat); ?>">
								<?php echo $cat->name; ?>
							</a>
						</h4>

						<?php
					}

					if ($temp_cat) {
						echo '<div class="accordion_content">';

						foreach ($temp_cat as $temp) {
							?>
							<div class="subcat_item">

								<a class="accordion_link subcat_link" href="<?php echo get_term_link($temp); ?>">
									<?php echo $temp->name; ?>
								</a>
							</div>
						<?php }

						echo '</div>';
					}

					?>

				</li>
			<?php } ?>
		</ul>
	</div>

	<?php return ob_get_clean();
}

	public function amts_categories_with_exceptions(){
		return true;
		}

}


$AMTScategories = new AMTScategories();

