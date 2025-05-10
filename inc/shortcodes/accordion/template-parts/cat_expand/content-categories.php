<?php
echo '<div class="' . $slug . '">';

foreach ($temp_cat as $temp) {
	?>
	<div class="subcat_item">
		<a class="subcat_link" href="<?php echo get_term_link($temp); ?>">
			<?php echo $temp->name; ?>
		</a>
	</div>
	<?php

}

echo '</div>';
?>

