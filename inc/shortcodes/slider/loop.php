<?php
$args  = array(
  'post_type'      => 'success_story',
  'category_name'  => '',
  'post_status'    => 'publish',
  'posts_per_page' => -1,
);
$query = new WP_Query($args);

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
    get_template_part('template/content-slider');
  }
  wp_reset_postdata();
}
