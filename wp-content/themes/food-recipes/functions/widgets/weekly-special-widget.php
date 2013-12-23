<?php

/********* Starting Weekly Special Recipe Widget For Sidebar and Home Page Bottom Area *********/

class Weekly_Special_Widget extends WP_Widget {
	
	function Weekly_Special_Widget(){
		  	$widget_ops = array( 'classname' => 'Weekly_Special_Widget', 'description' => __('Show one weekly special recipe', 'FoodRecipe'));
			$this->WP_Widget( 'weekly_special', __('Food Recipe: Weekly Special Recipe', 'FoodRecipe'), $widget_ops );
	}
	
	
/********* Starting Weekly Special Recipe Widget Function *********/
	
	function widget($args,  $instance) {
			extract($args);
			
			$title = apply_filters('widget_title', $instance['title']);		
			if ( empty($title) ) 
					$title = false;
			
			$special_post = array();			
			
			if ( function_exists( 'ot_get_option' ) )
			{
				$special_post[] =  intval(ot_get_option( 'weekly_special_recipe' ));
			}
			
			
			echo   '<div class="widget wk-special clearfix nostylewt">';
							if($title):
									$temp_title = explode(' ',$title);
									$first_letter = $temp_title[0];
											unset($temp_title[0]);
									$title_new = implode(' ', $temp_title);
									$title = $first_letter.' <span>'.$title_new.'</span>';
									echo '<h2 class="w-bot-border">';
											echo $title;
									echo '</h2>';	
							endif;
						$special_args = array( 'post_type'=>'recipe', 'posts_per_page'=>1, 'post__in' => $special_post );
													
						$special_query = new WP_Query( $special_args );
						
						if ( $special_query->have_posts() ) 
						while ( $special_query->have_posts() ) : 
								$special_query->the_post(); 
					
						echo	'<div class="img-box"><a href="'; the_permalink(); echo '">'; the_post_thumbnail('weekly-special-thumb'); echo '</a></div>
								<h4><a href="'; the_permalink(); echo '">'; the_title(); echo '</a></h4>
								<p>'; echo word_trim(get_the_excerpt(), 21, '...'); echo '<a href="'; the_permalink(); echo '"> '. __('more', 'FoodRecipe').'</a></p>
								<span class="clearfix"></span><br />
								<a href="'; the_permalink(); echo '" class="readmore">'.__('Read More', 'FoodRecipe').'</a>';
						endwhile;
					echo '</div><!-- end of weekly spcial widget -->';
	}
	

/********* Starting Weekly Special Recipe Widget Admin From *********/

	function form($instance) 
	{	
			$instance = wp_parse_args( (array) $instance, array('title'=> __('Weekly Special', 'FoodRecipe') ) );

	        $title= esc_attr($instance['title']);
			
			?>
				<p>
			            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		        </p>
	
			<?php
	}
	

/********* Starting Weekly Special Recipe Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
			
	        return $instance;
    }
	
}

?>