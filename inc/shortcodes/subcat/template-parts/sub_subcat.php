<div class="amts_accordion">
	<?php foreach ($categories as $category) : ?>
		<?php
		// Проверка наличия подкатегорий
		$subcategories = get_terms(array(
			'taxonomy' => 'product_cat',
			'parent' => $category->term_id,
			'hide_empty' => false,
		));

		$has_subcategories = ($subcategories && !is_wp_error($subcategories) && count($subcategories) > 0);
		?>

		<div class="amts_accordion_item">
			<?php if ($has_subcategories) : ?>
				<div class="amts_accordion_header">
					<?php echo esc_html($category->name); ?>
				</div>
			<?php endif; ?>

			<?php if ($has_subcategories) : ?>
				<div class="amts_accordion_content">
					<?php foreach ($subcategories as $subcategory) : ?>
						<?php
						// Проверка наличия подкатегорий третьего уровня
						$sub_subcategories = get_terms(array(
							'taxonomy' => 'product_cat',
							'parent' => $subcategory->term_id,
							'hide_empty' => false,
						));

						$has_sub_subcategories = ($sub_subcategories && !is_wp_error($sub_subcategories) && count($sub_subcategories) > 0);
						?>

						<div class="subcategory_item">
							<?php if ($has_sub_subcategories) : ?>

								<div class="subcategory_header subcategory_header_subcat">
									<span class="subcategory_header_title">
										<?php echo esc_html($subcategory->name); ?>
									</span>

								</div>

							<?php else : ?>

								<a class="subcategory_header subcategory_header_link" href="<?php echo esc_url(get_term_link($subcategory)); ?>">
									<?php echo esc_html($subcategory->name); ?>
								</a>

							<?php endif; ?>

							<?php if ($has_sub_subcategories) : ?>
								<div class="sub_subcategory_content">
									<?php foreach ($sub_subcategories as $sub_subcategory) : ?>
										<div class="sub_subcategory_item">
											<a href="<?php echo esc_url(get_term_link($sub_subcategory)); ?>">
												- <?php echo esc_html($sub_subcategory->name); ?>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>
<style>
	.amts_accordion_item {
		margin-bottom: 10px;
	}

	.amts_accordion_header {
		cursor: pointer;
		padding: 10px;
		background-color: var(--bluemain);
		color: var(--whitemain);
		border: 1px solid var(--bluemain);
		border-radius: 4px;
	}

	.amts_accordion_header:hover {
		background-color: var(--bluelite);
		border: 1px solid var(--bluelite);
		transition: all 0.5s ease;
	}

	.amts_accordion_content {
		/* display: none; */
		padding: 10px;
		border-left: 1px solid #ddd;
		border-right: 1px solid #ddd;
		border-bottom: 1px solid #ddd;
		background-color: #fff;
		border-bottom-left-radius: 4px;
		border-bottom-right-radius: 4px
	}

	@media (max-width: 1024px) {
		.amts_accordion_content{
			display: none;
		}
	}

	.subcategory_header {
		/*background-color: var(--graybody);*/
		cursor: pointer;
	}

	.subcategory_header_subcat {
		position: relative;
	}

	.subcategory_header_title{
		display: flex;
		align-items: center;
		color: var(--bluedark);
	}

	.subcategory_header_title:hover {
		color: var(--graymain);
	}

	.subcategory_header_title:after {
		content: '';
		height: 10px;
		width: 10px;
		position: absolute;
		right: 0;
		background-image: url(<?php echo MASTERNG_URI .  "/inc/shortcodes/subcat/img/cross.svg" ?>);
		background-size: 100% 100%;
		transition: all 0.4s linear 0s;
	}

	.active.subcategory_header_title:after {
		transform: translate(-2px, 0) rotate(135deg);
		transition: all 0.4s linear 0s;
	}

	.sub_subcategory_content {
		display: none; 
	}

</style>
<script>
	jQuery(document).ready(function($) {
		$('.amts_accordion_header, .subcategory_header').on('click', function() {
			$(this).next().slideToggle();
			$(this).siblings().not($(this).next()).slideUp();
		});
		$('.subcategory_header_title').on('click', function() {
			$(this).toggleClass('active');
		});
	});
</script>