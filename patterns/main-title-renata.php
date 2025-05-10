<?php
/**
 * Title: Main Title RENATA
 * Slug: masterng/main-title-renata
 * Categories: heading
 * Block Types: core/heading/
 * Description: Основной заголовок для сайта салона красоты.
 *
 */

$main_title = get_bloginfo('description') . ' - ' . get_bloginfo('name');
?>

<h1 class="main-title"><?php echo esc_html($main_title); ?></h1>

