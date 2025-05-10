<div class="amts_accordion">
	<?php foreach ($categories as $category) : ?>
		<div class="amts_accordion_item">
			<div class="amts_accordion_header"><?php echo esc_html($category->name); ?></div>
			<?php
			$subcategories = get_terms(array(
				'taxonomy' => 'product_cat',
				'parent' => $category->term_id,
				'hide_empty' => true,
			));
			?>
			<?php if ($subcategories && !is_wp_error($subcategories)) : ?>
				<div class="amts_accordion_content">
					<?php foreach ($subcategories as $subcategory) : ?>

						<div class="amts_subcategory_item">
							<a class="amts_subcategory_header" href="<?php echo esc_url(get_term_link($subcategory)); ?>">
								<?php echo esc_html($subcategory->name); ?>
							</a>
							<?php
							$sub_subcategories = get_terms(array(
								'taxonomy' => 'product_cat',
								'parent' => $subcategory->term_id,
								'hide_empty' => false,
							));
							?>
							<?php if ($sub_subcategories && !is_wp_error($sub_subcategories)) : ?>

								<div class="sub_subcategory_content">
									<?php foreach ($sub_subcategories as $sub_subcategory) : ?>
										<div class="sub_subcategory_item">
											<a class="sub_subcategory_link" href="<?php echo esc_url(get_term_link($sub_subcategory)); ?>">-<?php echo esc_html($sub_subcategory->name); ?>
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
        display: none;
        padding: 10px;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        background-color: #fff;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px
    }

    .subcategory_header {
        /*background-color: var(--graybody);*/
        cursor: pointer;
        padding: 5px 0;
    }

    .sub_subcategory_content {

        /*display: none; !*!* Начальное скрытие третьего уровня *!*!*/
    }


</style>
<script>
	jQuery(document).ready(function ($) {
		$('.amts_accordion_header, .subcategory_header').on('click', function () {
			$(this).next().slideToggle();
			$(this).siblings().not($(this).next()).slideUp();
		});
	});
</script>
