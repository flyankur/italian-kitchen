<?php 
global $post;
$nut_names = get_post_meta($post->ID, 'RECIPE_META_nut_name');	

$nut_number = 0;

if(is_array($nut_names))
{									
	$nut_number = count($nut_names[0]);
}

if( $nut_number >= 1 && (!empty($nut_names[0][0])) )
{
	$nut_vals = get_post_meta($post->ID, 'RECIPE_META_nut_mass');
	$i = 0;
	?>
	<div class="nutritional">
			<h3><?php _e('Nutritional Info', 'FoodRecipe'); ?></h3>
			<p><?php _e('This information is per serving.', 'FoodRecipe'); ?></p>
			<ul>
			<?php
				while($i < $nut_number)
				{
					?>
						<li class="nutrition">
								<p class="type"><?php echo $nut_names[0][$i] ?></p>
								<span class="value"><?php echo $nut_vals[0][$i] ?></span>
						</li>
					<?php
					$i++;
				}
			?>
			</ul>
	</div>
	<?php
}
?>