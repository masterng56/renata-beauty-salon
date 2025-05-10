<?php
echo '<div class="accordion_content ' . $slug . '">';

foreach ($temp_cat as $temp) {
	?>
	<div class="accordion_item subcat_item">
		<a class="accordion_link subcat_link" href="<?php echo get_term_link($temp); ?>">
			<?php echo $temp->name; ?>
		</a>
	</div>
	<?php

}

echo '</div>';
?>
