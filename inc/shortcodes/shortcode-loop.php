
<?php
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
/**
 * Шорт код Loop
 */

add_shortcode( 'amts-loop', 'show_loop' );
function show_loop() {
	ob_start();
	?>
<div class="container">
    <section class="section success_story" id="success_story">
        <h2 class="success_story_title">Истории Успеха</h2>
        <div class="success_story_wrapper">
			<?php
			$args  = array(
				'post_type'      => 'success_story',
				'category_name'  => '',
				'post_status'    => 'publish',
				'posts_per_page' => - 1,
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'template-parts/content-loop' );
				}
				wp_reset_postdata();
			}
			?>
        </div>
    </section>
</div>

	<?php return ob_get_clean();
}
