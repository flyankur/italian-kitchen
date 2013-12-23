<?php
class Recipes_from_Cousins extends WP_Widget {

	function Recipes_from_Cousins()
	{
		$widget_ops = array( 'classname' => 'Recipes_from_Cousins', 'description' => __('Show Recipes from selected Cousins.','FoodRecipe') );
		$this->WP_Widget( 'Recent_Posts_With_Thumb', __('FoodRecipes: Recent Recipes Slider','FoodRecipe'), $widget_ops );
	}
	
	
	function widget($args, $instance) 
	{ 
		extract($args);
						
		$title = apply_filters('widget_title', $instance['title']);	
			
		if ( empty($title) ) 
		  $title = false;
		
		$number = absint( $instance['number'] );					
		$sort_by = $instance['sort_by'];		
		$recipe_term = (array) $instance['recipe_term'];		
		
		echo $before_widget;		
		
		if($title):
			echo $before_title;
				echo $title;
			echo $after_title;	
		endif;
		
		
		$args = array('post_type'=>'recipe');
		
		//Number
		$args['posts_per_page'] = $number;
		
		//Categories
		$args['tax_query'] = array(
									array(
										'taxonomy' => 'cuisine',
										'field' => 'id',
										'terms' => $recipe_term
									)
								);
		
		//Order by
		if($sort_by == "popular"):
			$args['orderby']= "comment_count";
		
		elseif($sort_by == "random"):
			$args['orderby']= "rand";
			
		else:
			$args['orderby']= "date";
			
		endif;			
		
		$recent_posts_query = new WP_Query($args);
		echo '<div class="recipes-slider-widget cs">
					<ul>';
		if($recent_posts_query->have_posts()): 
			while($recent_posts_query->have_posts()): 
			$recent_posts_query->the_post();
			
				?>
                    <?php
                    if(has_post_thumbnail()) 
                    {
                        ?>
                        <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('recipe-slider-widget'); ?>
                                </a>
                                <p class="info-box"><?php the_title() ?></p>
                        </li>
                        <?php
                    } 							
                    ?>		                         						
				<?php
			endwhile; 
		endif;
		echo '		</ul>
					<span class="prev cs"></span>
                    <span class="next cs"></span>
				</div>';
		echo $after_widget;
	}
	

	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array('number' => 3, 'title' => '', 'sort_by' => 'recent', 'recipe_term' => array() ) );
		
        $title= esc_attr($instance['title']);		
		$number = absint( $instance['number'] );	
		$sort_by = $instance['sort_by'];
		$recipe_term = (array) $instance['recipe_term'];
		
		?>
			<p>
	            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title','FoodRecipe');?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	        </p>
			<p> 
				<label><?php _e('Select Cuisines','FoodRecipe');?>:</label>
				<br />
				<?php
				$all_categories = get_categories('type=recipe&taxonomy=cuisine&hide_empty=0&orderby=name');
				foreach ($all_categories as $cat ):
					$cat_id = intval($cat->cat_ID);
					$cat_name = $cat->cat_name;
					$selected = '';
					if(in_array($cat_id, $recipe_term))
						$selected=' checked="checked"';
					?>
			  <input value="<?php echo $cat_id; ?>" class="checkbox" type="checkbox"<?php echo $selected; ?> id="<?php echo $this->get_field_id('recipe_term'); echo $cat_id; ?>" name="<?php echo $this->get_field_name('recipe_term'); ?>[]" /> <label for="<?php echo $this->get_field_id('recipe_term'); echo $cat_id; ?>"><?php echo $cat_name; ?></label> <br />
			  <?php
				endforeach;
				?>				
			</p>
			
			<p> 
				<label for="<?php echo $this->get_field_id('sort_by'); ?>"><?php _e('Sort them by','FoodRecipe');?>:</label>
				<select name="<?php echo $this->get_field_name('sort_by'); ?>" id="<?php echo $this->get_field_id('sort_by'); ?>" class="widefat">
						<option value="popular" <?php selected( $instance['sort_by'], 'popular' ); ?>><?php _e('Most Popular','FoodRecipe');?></option>
						<option value="recent" <?php selected( $instance['sort_by'], 'recent' ); ?>><?php _e('Most Recent','FoodRecipe');?></option>
						<option value="random" <?php selected( $instance['sort_by'], 'random' ); ?>><?php _e('Random','FoodRecipe');?></option>
				</select>
			</p>
			
			<p>
	            <label for="<?php echo $this->get_field_id('number'); ?>">
	               <?php _e('Number of posts to display','FoodRecipe');  ?>:
	            </label>
	                <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
	        </p>
		<?php
	}

	function update($new_instance, $old_instance) 
	{
        $instance = $old_instance;		
		
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['recipe_term']  = (array)$new_instance['recipe_term'];
		$instance['sort_by'] = $new_instance['sort_by'];
		$instance['number'] = absint( $new_instance['number'] );	
		
        return $instance;

    }
	
}

?>