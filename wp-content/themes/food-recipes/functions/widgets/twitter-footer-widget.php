<?php

/********* Starting Twitter Widget for Footer *********/

class Twitter_Footer_Widget extends WP_Widget {
	
	function Twitter_Footer_Widget(){
	  		$widget_ops = array( 'classname' => 'Twitter_Footer_Widget', 'description' => __('This widget shoes latest tweets from given Twitter ID', 'FoodRecipe'));
			$this->WP_Widget( 'twitter_footer_widget', __('Food Recipe: Twitter Widget', 'FoodRecipe'), $widget_ops );
	}
	
/********* Starting Twitter Widget Function *********/

	function widget($args,  $instance) {
			extract($args);
			
			$title = apply_filters('widget_title', $instance['title']);		
			if ( empty($title) ) 
					$title = false;
			
			$twitter_id =  $instance['twitter_id'];
			$tweets_count =  $instance['tweets_count'];
	
			if($title):
				
					$temp_title = explode(' ',$title);
					$first_letter = $temp_title[0];
							unset($temp_title[0]);
					$title_new = implode(' ', $temp_title);
					$title = $first_letter.' <span>'.$title_new.'</span>';
				
			endif;
			
			echo '<h2 class="w-bot-border">'.$title.'</h2>';

            if(!empty($twitter_id)){
                echo '<div id="twitter_update_list" class="widget nostylewt"><ul><li>'.__('No Tweets loaded !','framework').'</li></ul></div>';
                echo '<script src="http://twitterjs.googlecode.com/svn/trunk/src/twitter.min.js" type="text/javascript"></script>';
                echo '<script type="text/javascript" >
                            getTwitters("twitter_update_list", {
                                  id: "'.$twitter_id.'",
                                  count: '.$tweets_count.',
                                  enableLinks: true,
                                  ignoreReplies: true,
                                  clearContents: true,
                                  template: "%text% <span>%time%</span>"
                            });
                        </script>';
            } else {
                echo '<div id="twitter_update_list"><ul><li>'.__('Twitter username not provided!','framework').'</li></ul></div>';
            }
	}
	

/********* Starting Twitter Widget Admin Form *********/

	function form($instance) 
	{			
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('Twitter Feed', 'FoodRecipe'), 'twitter_id' => 'envato', 'tweets_count' => 2 ) );
		
        $title= esc_attr($instance['title']);
		
		$twitter_id =  $instance['twitter_id'];
		$tweets_count =  $instance['tweets_count'];
		
		?>
				<p>
			            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $twitter_id; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('tweets_count'); ?>"><?php _e('Number of Tweets', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('tweets_count'); ?>" name="<?php echo $this->get_field_name('tweets_count'); ?>" type="text" value="<?php echo $tweets_count; ?>" />
		        </p>
		<?php
	}
	

/********* Starting Twitter Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['twitter_id'] = strip_tags($new_instance['twitter_id']);
			$instance['tweets_count'] = intval($new_instance['tweets_count']);
			
	        return $instance;
    }
	
}

?>