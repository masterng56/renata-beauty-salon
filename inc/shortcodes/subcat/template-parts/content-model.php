<div class="model_item wow animate__animated animate__fadeInRight" >
	<div class="model_content">

		<div class="model_img_wrapper">
			<div class="model_img"><img src="<?php echo $cat['img']; ?>"></div>
		</div>
		
		<h3 class="grammer_title"><?php echo $cat['title']; ?></h3>
		<?php if(!empty($cat['description'])) : ?>
		<p class="model_description"><?php echo $cat['description']; ?></p>
		<?php endif; ?>

		<a href="<?php echo $cat['link']; ?>" class="btn btn_blue">Mehr Details</a>

	</div>
</div>