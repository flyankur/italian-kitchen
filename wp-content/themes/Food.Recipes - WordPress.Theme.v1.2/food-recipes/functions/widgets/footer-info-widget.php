<?php

/********* Starting Twitter Widget for Footer *********/

class Footer_Info_Widget extends WP_Widget {
	
	function Footer_Info_Widget(){
	  		$widget_ops = array( 'classname' => 'Footer_Info_Widget', 'description' => __('This widget is to put Company or Personal Information along with logo.', 'FoodRecipe'));
			$this->WP_Widget( 'footer_info_widget', __('Food Recipe: Footer Info Widget', 'FoodRecipe'), $widget_ops );
	}
	
/********* Starting Twitter Widget Function *********/

	function widget($args,  $instance) {
			extract($args);
			
			$title = false;
			
			$info_widget_logo_url =  $instance['info_widget_logo_url'];
			$info_widget_text =  $instance['info_widget_text'];
			$info_widget_button_url =  $instance['info_widget_button_url'];
			
			?>
				<div class="about">
			<?php
					if (!empty($info_widget_logo_url)) {
            ?>
				    	    <a href="<?php echo home_url(); ?>"><img src="<?php echo $info_widget_logo_url; ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo" /></a>
			<?php
                    }
            ?>
                        <p><?php echo $info_widget_text; ?>...</p>
			<?php
                    if (!empty($info_widget_button_url)) {
            ?>
                        <a href="<?php echo $info_widget_button_url; ?>" class="readmore"><?php _e('Read more About Us', 'FoodRecipe'); ?></a>
		    <?php
                    }
            ?>
				</div>
            
			<?php
	}
	

/********* Starting Twitter Widget Admin Form *********/

	function form($instance) 
	{			
		$instance = wp_parse_args( (array) $instance, array( 'info_widget_logo_url' => 'url', 'info_widget_text' => 'text', 'info_widget_button_url' => 'url' ) );
		
		$info_widget_logo_url =  $instance['info_widget_logo_url'];
		$info_widget_text =  $instance['info_widget_text'];
		$info_widget_button_url =  $instance['info_widget_button_url'];
		
		?>
				<p>
			            <label for="<?php echo $this->get_field_id('info_widget_logo_url'); ?>"><?php _e('Footer Logo URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('info_widget_logo_url'); ?>" name="<?php echo $this->get_field_name('info_widget_logo_url'); ?>" type="text" value="<?php echo $info_widget_logo_url; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('info_widget_text'); ?>"><?php _e('Company Info', 'FoodRecipe'); ?></label>
			            <textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('info_widget_text'); ?>" name="<?php echo $this->get_field_name('info_widget_text'); ?>"><?php echo $info_widget_text; ?></textarea>
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('info_widget_button_url'); ?>"><?php _e('Readmore Button URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('info_widget_button_url'); ?>" name="<?php echo $this->get_field_name('info_widget_button_url'); ?>" type="text" value="<?php echo $info_widget_button_url; ?>" />
		        </p>
		<?php
	}
	

/********* Starting Twitter Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['info_widget_logo_url'] = strip_tags($new_instance['info_widget_logo_url']);
	        $instance['info_widget_text'] = strip_tags($new_instance['info_widget_text']);
			$instance['info_widget_button_url'] = strip_tags($new_instance['info_widget_button_url']);
			
	        return $instance;
    }
	
}