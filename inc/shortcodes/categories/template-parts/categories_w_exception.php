<a class="main_categories_item  wow animate__animated animate__fadeInRight " href="<?php echo esc_url( get_term_link( $category ) ); ?>">
	<div class="img_wrapper">
		<?php if ( $image_url ) : ?>
			<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $category->name ); ?>" />
		<?php endif; ?>
	</div>

	<h3 class="main_categories_title">
		<?php echo esc_html( $category->name ); ?>
	</h3>

	<div class="main_categories_description">
		<?php echo esc_html( $category->description ); ?>
	</div>
</a>