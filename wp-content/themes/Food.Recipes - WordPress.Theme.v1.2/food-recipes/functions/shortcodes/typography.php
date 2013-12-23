<?php

/* ------------------------------------------------------------------------*
 * TYPOGRAPHY
 * ------------------------------------------------------------------------*/

// [ingredients] short code
function show_ingredients($atts, $content = null) {
	
	extract(shortcode_atts(array(
									'title' => ''
								), $atts));
	
	global $post;		
	
	$ingredients = get_post_meta($post->ID, 'RECIPE_META_ingredients');	
											
	$ingredients_count = count($ingredients[0]);
	
	
	if(empty($title))
	{
		$ingredients_html = '<h3 class="blue">'.__('Ingredients','FoodRecipe').'</h3>';
	}else{
		$ingredients_html = '<h3 class="blue">'.$title.'</h3>';
	}
	
	if( $ingredients_count >= 1 && (!empty($ingredients[0][0])) )
	{
		$i = 0;
		$ingredients_html .= '<ul>';

		while($i < $ingredients_count)
		{
			$ingredients_html .= '<li class="ingredient">';
			$ingredients_html .= $ingredients[0][$i];
			$ingredients_html .= '</li>';
			$i++;
		}
				
		$ingredients_html .= '</ul>';
	}
	else
	{
		$ingredients_html .= '<p>';
		$ingredients_html .= __('No Ingredients Found ! ','FoodRecipe');
		$ingredients_html .= '</p>';
	}
	
	return $ingredients_html;
}
add_shortcode('ingredients', 'show_ingredients');

// [method] short code
function show_method_steps($atts, $content = null) {
	
	extract(shortcode_atts(array(
									'title' => ''
								), $atts));
								
	global $post;		
	
	$method_steps = get_post_meta($post->ID, 'RECIPE_META_method_steps');	
											
	$steps_count = count($method_steps[0]);
	
	if(empty($title))
	{
		$method_html = '<h3 class="blue">'.__('Method','FoodRecipe').'</h3>';
	}else{
		$method_html = '<h3 class="blue">'.$title.'</h3>';
	}
	
	
	if( $steps_count >= 1 && (!empty($method_steps[0][0])) )
	{
		$i = 0;
		
		while($i < $steps_count)
		{
			$method_html .= '<h4 class="red me-steps"><span class="stepcheck"></span>'.__('Step ','FoodRecipe').($i+1).'</h4>';
			$method_html .= '<p class="instructions">';
			$method_html .= $method_steps[0][$i];
			$method_html .= '</p>';
			$i++;
		}
				
	}
	else
	{
		$method_html .= '<p>'.__('No Steps Found ! ','FoodRecipe').'</p>';
	}
	
	return $method_html;
}
add_shortcode('method', 'show_method_steps');


// Red Heading Shortcode
function show_red_heading($atts, $content = null) {
	extract(shortcode_atts(array(
			'border' => false,
	), $atts));
	
	global $bot_border;
	
	if($border == 'true')
			$bot_border = '<span class="w-pet-border"></span>';
		
	return '<h3 class="red-heading">'.$content.'</h3>'.$bot_border;
}
add_shortcode('red_heading', 'show_red_heading');

// Blue Heading Shortcode
function show_blue_heading($atts, $content = null) {
	extract(shortcode_atts(array(
			'border' => false,
	), $atts));
	
	global $bot_border;
	
	if($border == true)
			$bot_border = '<span class="w-pet-border"></span>';
		
	return '<h3 class="blue">'.$content.'</h3>'.$bot_border;
}
add_shortcode('blue_heading', 'show_blue_heading');


// Recipe Steps Heading Shortcode
function show_step_head($atts, $content = null) {
	return '<h4 class="red">'.$content.'</h4>';
}
add_shortcode('step_head', 'show_step_head');


// Blockquote Left Aligned
function show_blockquote($atts, $content = null) {
	extract(shortcode_atts(array(
			'width' => '',
			'align' => ''
	), $atts));
	
	global $align_class, $mwidth, $end_quote;
	
	if($width)
			$mwidth = $width.'px';
	else {
			$mwidth = '100%';
			$end_quote = '<span class="end-quote"></span>';
		}
		
	if($align == 'left')
			$align_class = 'alignleft';
	if($align == 'right')
			$align_class = 'alignright';
		
	return '<blockquote class="'.$align_class.'" style="width:'. $mwidth .';"><p>'.$content.' '.$end_quote.'</p></blockquote>';
}
add_shortcode('blockquote', 'show_blockquote');

?>