
<div class="swiper-slide slide_item" style="
	background-image: url('<?php the_post_thumbnail_url('full'); ?>');
	background-position: center center;
	background-repeat: no-repeat;
	background-size: cover;
	">
	<div class="slide_content">
		<p class="main_title slide_title">
			<?php the_title(); ?>
		</p>
		<p class="slide_description">
			<?php echo get_the_excerpt(); ?>
		</p>
	</div>

</div>
