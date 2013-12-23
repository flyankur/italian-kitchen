<?php

/********* Starting Recent Recipe Widget For Footer *********/

class Recent_Recipe_Footer_Widget extends WP_Widget {
	
	function Recent_Recipe_Footer_Widget(){
			$widget_ops = array( 'classname' => 'Recent_Recipe_Footer_Widget', 'description' => __('This widget show recent recipes from all recipes.', 'FoodRecipe'));
			$this->WP_Widget( 'recent_recipe_footer_widget', __('Food Recipe: Recent Recipes Widget', 'FoodRecipe'), $widget_ops );
	}
	
	
/********* Starting Recent Recipe Widget Function *********/

	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		$rrf_post_count =  $instance['post_per_page'];
		$rrf_excerpt_length = $instance['excerpt_length'];
		
		if($title):	
				$temp_title = explode(' ',$title);
				$first_letter = $temp_title[0];
						unset($temp_title[0]);
				$title_new = implode(' ', $temp_title);
				$title = $first_letter.' <span>'.$title_new.'</span>';
				
		endif;
		
		echo   '<h2 class="w-bot-border">'.$title.'</h2>
						<ul class="recent-posts widget nostylewt">';
								$args = array( 'post_type'=>'recipe', 'posts_per_page'=>$rrf_post_count );
								
								$rrf_posts_query = new WP_Query($args);
								
								if($rrf_posts_query->have_posts()): 
										while($rrf_posts_query->have_posts()): 
										$rrf_posts_query->the_post();
											?>
												<li class="clearfix">
														<a href="<?php the_permalink(); ?>#" class="img-box"><?php the_post_thumbnail('most-rated-thumb'); ?></a>
														<h5><a href="<?php the_permalink(); ?>#"><?php echo word_trim(get_the_title(),5,'...'); ?></a></h5>
														<p><?php echo word_trim(get_the_excerpt(),$rrf_excerpt_length,'...'); ?></p>
												</li>			                         						
											<?php		
										endwhile; 
								endif;
		echo			'</ul>';
	}
	
	
/********* Starting Recent Recipe Widget Admin From *********/

	function form($instance) 
	{	
			$instance = wp_parse_args( (array) $instance, array( 'title' => __('Recent Recipes', 'FoodRecipe'),'post_per_page' => 2,'excerpt_length' => 10 ) );
			
	        $title= esc_attr($instance['title']);			
			$rrf_post_count =  $instance['post_per_page'];
			$rrf_excerpt_length = $instance['excerpt_length'];
			
			?>
					<p>
				            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			        </p>
		            <p>
				            <label for="<?php echo $this->get_field_id('post_per_page'); ?>"><?php _e('Number of Posts', 'FoodRecipe'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('post_per_page'); ?>" name="<?php echo $this->get_field_name('post_per_page'); ?>" type="text" value="<?php echo $rrf_post_count; ?>" />
			        </p>
		            <p>
				            <label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Number of Words', 'FoodRecipe'); ?></label>
				            <input class="widefat" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" type="text" value="<?php echo $rrf_excerpt_length; ?>" />
			        </p>
			<?php
	}
	
	
/********* Starting Recent Recipe Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['post_per_page'] = intval($new_instance['post_per_page']);
			$instance['excerpt_length'] = intval($new_instance['excerpt_length']);
			
	        return $instance;

    }
	
}

?>