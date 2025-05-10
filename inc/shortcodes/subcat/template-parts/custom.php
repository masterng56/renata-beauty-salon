<div class="accordion">
	<?php foreach ($categories as $category) : ?>

		<div class="accordion-item">
			<div class="amts_accordion_header"><?php echo esc_html($category->name); ?></div>
			<?php
			$subcategories = get_terms(array(
				'taxonomy'   => 'product_cat',
				'parent'     => $category->term_id,
				'hide_empty' => false,
			));
			?>
			<?php if ($subcategories && !is_wp_error($subcategories)) : ?>
				<div class="amts_accordion_content">
					<?php foreach ($subcategories as $subcategory) : ?>

						<div class="subcategory-item">
							<div class="subcategory-header"><?php echo esc_html($subcategory->name); ?></div>
							<?php
							$sub_subcategories = get_terms(array(
								'taxonomy'   => 'product_cat',
								'parent'     => $subcategory->term_id,
								'hide_empty' => false,
							));
							?>
							<?php if ($sub_subcategories && !is_wp_error($sub_subcategories)) : ?>

								<div class="sub-subcategory-content">
									<?php foreach ($sub_subcategories as $sub_subcategory) : ?>
										<div class="sub-subcategory-item">
											<a href="<?php echo esc_url(get_term_link($sub_subcategory)); ?>">
												<?php echo esc_html($sub_subcategory->name); ?>
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
