
    <!-- Slides -->
    <div class="swiper-slide reviews_slide">
	    <h3 class="reviews_title">
		    <?php the_title() ?>
	    </h3>
	    <p class="reviews_text">
		    <?php echo get_the_excerpt(); ?>
	    </p>
	    <a href="<?php the_post_thumbnail_url() ?>" target="_blank" class="btn btn_blue">Original ansehen</a>
    </div>
