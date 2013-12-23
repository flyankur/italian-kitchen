<?php
	
	/**
	* Optional: set 'ot_show_pages' filter to __return_false or __return_true. false will hide and true will display settings & documentation page
	*/
	add_filter( 'ot_show_pages', '__return_false' );

	// Remove Option Tree Settings Menu
	function remove_ot_menu(){
		remove_menu_page( 'ot-settings' );	
	}
	add_action( 'admin_menu', 'remove_ot_menu' );
	
	
	/**
	* Theme Options
	*/
	include_once( 'theme-options.php' );
	
	
	/********* Define Constants **********/
	define('SHORTCODES', get_template_directory() . '/functions/shortcodes/');
	define('WIDGETS', get_template_directory() . '/functions/widgets/');
  	
	
	/********* Add Theme Support **********/
	
	if( function_exists( 'add_theme_support' ) ) {
			add_theme_support('automatic-feed-links');
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'menus' );
	}
	
	
	/********* Function to Register Sidebars **********/
	if ( function_exists('register_sidebar') ) {
	
		/********* Common Sidebar Registration **********/
		register_sidebar(array('name'=>'Sidebar',
			'before_widget' => '<div class="widget nostylewt">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="w-bot-border">',
			'after_title' => '</h2>'
		));
		
		/********* Footer Column 3 Registration **********/
		register_sidebar(array('name'=>'Recipe Sidebar',
			'before_widget' => '<div class="widget nostylewt">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="w-bot-border">',
			'after_title' => '</h2>'
		));
		
		/********* Homepage Bottom Area **********/
		register_sidebar(array('name'=>'Homepage Bottom Bar',
			'before_widget' => '<div class="widget nostylewt">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="w-bot-border">',
			'after_title' => '</h2>'
		));

		/********* Widgetized area for Ads on the bottom of content **********/
		register_sidebar(array('name'=>'Bottom Advertisement Area',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		));

        /********* Widgetized area for Ads on the right side of single recipe page **********/
        register_sidebar(array('name'=>'Recipe Right Advertisement Area',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        ));

        /********* Sidebar for Contact Page **********/
        register_sidebar(array('name'=>'Contact Sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '<div class="widget-bot-round"></div></div>',
            'before_title' => '<h4 class="blue">',
            'after_title' => '</h4>'
        ));

        /********* Footer Column 1 Registration **********/
        register_sidebar(array('name'=>'Footer Column 1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

        /********* Footer Column 2 Registration **********/
        register_sidebar(array('name'=>'Footer Column 2',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

        /********* Footer Column 3 Registration **********/
        register_sidebar(array('name'=>'Footer Column 3',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>'
        ));

	}
	/********* Adding Default Thumbnail Sizes for different areas of the website **********/
	if( function_exists( 'add_theme_support' ) ) {

			add_image_size( 'thumbnail-blog', 575, 262, true); // for blog pages
			add_image_size( 'recipe-listing', 250, 212, true); // For recipe listing page
			add_image_size( 'portfolio-thumb', 220, 140, true); // for the portfolio template
			add_image_size( 'portfolio-main', 940, '', false); // for the single portfolio page
			add_image_size( 'full-size', '', '', false);
			add_image_size( 'sidebar-tabs', 63, 53, true);
			add_image_size( 'recipe-4column-thumb', 222, 144, true);
			add_image_size( 'single-carousel-thumb', 132, 104, true);
			add_image_size( 'li-slider-thumb', 515, 262, true);
			add_image_size( 'bs-slider-thumb', 903, 386, true);
			add_image_size( 'weekly-special-thumb', 122, 132, true);
			add_image_size( 'most-rated-thumb', 63, 53, true);
			add_image_size( 'recipe-slider-widget', 302, 196, true);
			
	}
	
	/********* text domain loading for translation fix **********/
	load_theme_textdomain( 'FoodRecipe' );
	
	/********* Custom Menu Support **********/
	
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'main-menu' => __('Main Menu', 'FoodRecipe'),
	  		  'social-menu' => __('Social Menu', 'FoodRecipe')
	  		)
	  	);
	}
	

/*-----------------------------------------------------------------------------------*/
//	Shortcodes
/*-----------------------------------------------------------------------------------*/

	require_once(SHORTCODES . 'columns.php');
	require_once(SHORTCODES . 'elements.php');
	require_once(SHORTCODES . 'typography.php');
	

/*-----------------------------------------------------------------------------------*/	
//	Widgets
/*-----------------------------------------------------------------------------------*/

	require_once(WIDGETS . 'recipe-tabs-widget.php');
	require_once(WIDGETS . 'news-and-events.php');
	require_once(WIDGETS . 'custom-archive-widget.php');
	require_once(WIDGETS . 'recipe-types-widget.php');
	require_once(WIDGETS . 'weekly-special-widget.php');
	require_once(WIDGETS . 'homepage-ad-widget.php');
	require_once(WIDGETS . 'sidebar-ad-widget.php');
	require_once(WIDGETS . 'recent-recipe-footer-widget.php');
	require_once(WIDGETS . 'twitter-footer-widget.php');
	require_once(WIDGETS . 'recipes-slider-cousin-widget.php');
	require_once(WIDGETS . 'recipes-slider-recipe-type-widget.php');
	require_once(WIDGETS . 'footer-info-widget.php');

/*-----------------------------------------------------------------------------------*/
//	Register Widgets
/*-----------------------------------------------------------------------------------*/

	add_action( 'widgets_init', 'recipe_load_widgets' );
	function recipe_load_widgets() {
		
			register_widget( 'Recipe_Sidebar_Tabed_Widget' );
			register_widget( 'Recipe_News_And_Events_Widget' );
			register_widget( 'Recipe_Archive_Widget' );
			register_widget( 'Recipe_Types_Widget' );
			register_widget( 'Weekly_Special_Widget' );
			register_widget( 'Homepage_Ad_Widget' );
			register_widget( 'Sidebar_Ad_Widget' );
			register_widget( 'Recent_Recipe_Footer_Widget' );
			register_widget( 'Twitter_Footer_Widget' );
			register_widget( 'Recipes_from_Cousins' );
			register_widget( 'Recipes_from_Recipe_Type' );
			register_widget( 'Footer_Info_Widget' );
	
	}


/*-----------------------------------------------------------------------------------*/
//	Metabox
/*-----------------------------------------------------------------------------------*/

	// Re-define meta box path and URL
	define( 'RWMB_URL', trailingslashit( get_template_directory_uri().'/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( get_template_directory().'/meta-box' ) );
	
	// Include the meta box script
	require_once RWMB_DIR . 'meta-box.php';
	include get_template_directory().'/config-meta-boxes.php';


/*-----------------------------------------------------------------------------------*/
/*	Editor Styles
/*-----------------------------------------------------------------------------------*/
add_editor_style('/inc/custom-editor-style.css');



/*-----------------------------------------------------------------------------------*/
/*	 send message function to process contact form submition
/*-----------------------------------------------------------------------------------*/		
	add_action( 'wp_ajax_nopriv_send_message', 'send_message' );
	add_action( 'wp_ajax_send_message', 'send_message' );
	
	function send_message()
	{	
		if(isset($_POST['email'])):
		
			$sname = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
			$address = $_POST['target'];
			
            if(get_magic_quotes_gpc()) {
                    $message = stripslashes($message);
            }

            $e_subject = __('You\'ve Received a Message From ',' FoodRecipe') . $sname . '.';
			
			$e_body = 	__('You have Received a message from ', 'FoodRecipe')
								.$sname
								. '\n'
								.__('Their additional message is as follows.', 'FoodRecipe')
								."\r\n\n";
					
			$e_content = "\" $message \"\r\n\n";
			
			$e_reply = 	__("You can contact ", 'FoodRecipe')
						.$sname
						. __(" via email, ", 'FoodRecipe')
						.$email;


             $msg = $e_body . $e_content . $e_reply;
			 
			 if(wp_mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address")){
				
						_e('Message Sent Successfully!', 'FoodRecipe');
				
				} else {
					
						_e('***ERROR*** Message Not Sent. Try Again!', 'FoodRecipe');
					
				}
			 
		else:
		
				_e('Message Sending Failed!', 'FoodRecipe');
		
		endif;
		
		die;
	}




// Rating Hook
/*-----------------------------------------------------------------------------------*/

	add_action('wp_ajax_nopriv_rate_this', 'rate_this');
	add_action('wp_ajax_rate_this', 'rate_this');

	function rate_this(){
		
		
		if(isset($_POST['selected_rating'])){
				
				$ip = $_SERVER['REMOTE_ADDR'];
				$post_id = intval($_POST['post_id']);
				$selected_rating = intval($_POST['selected_rating']);
				
				$meta_IP = get_post_meta($post_id, "voted_IP");
				$voted_IP = $meta_IP[0];
				
				if(!is_array($voted_IP))
						$voted_IP = array();
				
				if(!in_array($ip, $voted_IP)){
				  
				  	$rating_count = get_post_meta($post_id, "rating_counter", true);
				  	if(empty($rating_count)) { $rating_count = 0; }
					
					$rating_array_holder = get_post_meta($post_id, "rating_array");				
					
					if(!empty($rating_array_holder) && is_array($rating_array_holder[0]))
					{					
							$rating_array = $rating_array_holder[0];
							$rating_array[] = $selected_rating;
					}
					else
					{
							$rating_array = array($selected_rating);
					}								
					
					if(update_post_meta($post_id,"rating_array", $rating_array ) )
					{
							$voted_IP[] = $ip;
							$rating_count++;
							update_post_meta($post_id,'voted_IP', $voted_IP);
							update_post_meta($post_id,'rating_counter', $rating_count);
							
							_e('Thank you for rating!', 'FoodRecipe');
					}
					else
					{
							_e('Failed', 'FoodRecipe');
					}
				 }
				 else
				 {
						_e('Already Voted!', 'FoodRecipe');
				 }
		}
		else
		{
				_e('No Rating Found!', 'FoodRecipe');
		}				
		die;
	}

// Already Voted Or Not
/*-----------------------------------------------------------------------------------*/	
function already_voted($post_id)
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$meta_IP = get_post_meta(intval($post_id), "voted_IP");				
					
	if(!empty($meta_IP) && is_array($meta_IP[0]))
	{					
			$voted_IP = $meta_IP[0];
			return in_array($ip, $voted_IP);
	}
		
	return false;	
}
	

// Get Vote Count
/*-----------------------------------------------------------------------------------*/	
function get_vote_count($post_id)
{
	$meta_IP = get_post_meta(intval($post_id), "voted_IP");				
					
	if(!empty($meta_IP) && is_array($meta_IP[0]))
	{					
			$voted_IP = $meta_IP[0];
			return count($voted_IP);
	}
		
	return 0;	
}

// Get Average Rating
/*-----------------------------------------------------------------------------------*/	
function get_avg_rating($post_id)
{
	$rating_array_holder = get_post_meta(intval($post_id), "rating_array");				
					
	if(!empty($rating_array_holder) && is_array($rating_array_holder[0]))
	{					
			$rating_array = $rating_array_holder[0];
			$rating_length = count($rating_array);
			$rate_total = array_sum($rating_array);
			return round($rate_total/$rating_length,1);
	}
	
	return 0;
	
}

/*-----------------------------------------------------------------------------------*/
// Rating Call Function

	function the_recipe_rating($post_id){
			$rate_avg = get_avg_rating($post_id);
			$rt = 0;
			while($rt < 5){
					if($rt > $rate_avg-1){$rclass = 'off';} else {$rclass = 'on';}
					echo '<span class="'.$rclass.'"></span>';
					$rt++;
			}
		
	}

/*-----------------------------------------------------------------------------------*/
//	Sliders Customization
/*-----------------------------------------------------------------------------------*/

	add_filter( 'ot_list_item_settings', 'custom_slider_fields', 10, 2 );
	
	function custom_slider_fields( $image_slider_fields, $id ) 
	{
		  if ( $id == 'right_info_slider' ) 
		  {
			    $image_slider_fields = array(
				      array(					
						'id'        => 'id',
				        'label'     => __('Recipe Post ID', 'FoodRecipe'),
				        'desc'      => '',
				        'std'       => '',
				        'type'      => 'text',
				        'rows'      => '',
				        'class'     => '',
				        'post_type' => '',
				        'choices'   => array()
				      )			      
			    );
		  }
		  elseif ( $id == 'basic_image_slider' ) 
		  {
			    $image_slider_fields = array(
			      array(					
					'id'        => 'image',
			        'label'     => __('Slider Image', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'upload',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      ),
			      array(					
					'id'        => 'id',
			        'label'     => __('Recipe Post ID', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'text',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      )			      
			    );
		  }
		  elseif ( $id == 'nivo_image_slider' ) 
		  {
			    $image_slider_fields = array(
			      array(
					'id'        => 'nivo_image',
			        'label'     => __('Slider Image', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'upload',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      ),
			      array(			        
					'id'        => 'id',
			        'label'     => __('Recipe Post ID', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'text',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      )			      
			    );
		  }
		  elseif ( $id == 'thumb_slider_images' ) 
		  {
			    $image_slider_fields = array(
			      array(
					'id'        => 'image',
			        'label'     => __('Slider Image', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'upload',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      )		      
			    );
		  }
		  elseif ( $id == 'accor_slider_images' ) 
		  {
			    $image_slider_fields = array(
			      array(
					'id'        => 'image',
			        'label'     => __('Slider Image', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'upload',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      ),
			      array(			        				
					'id'        => 'link',
			        'label'     => 'Link',
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'text',
			        'rows'      => '',
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      )			      
			    );
		  }
		  elseif ( $id == 'slogans' ) 
		  {
			    $image_slider_fields = array(			      
			      array(					
					'id'        => 'description',
			        'label'     => __('Slogan Text', 'FoodRecipe'),
			        'desc'      => '',
			        'std'       => '',
			        'type'      => 'textarea-simple',
			        'rows'      => 10,
			        'class'     => '',
			        'post_type' => '',
			        'choices'   => array()
			      )			      
			    );
		  }
		  return $image_slider_fields;
	}




/*-----------------------------------------------------------------------------------*/
//	Theme Pagination Method
/*-----------------------------------------------------------------------------------*/
	
	function theme_pagination($pages = ''){
		global $paged;
		$paged = get_query_var( 'paged' );
		
		if(empty($paged))$paged = 1;
		
		$prev = $paged - 1;							
		$next = $paged + 1;	
		$range = 3; // only change it to show more links
		$showitems = ($range * 2)+1;
		
		if($pages == '')
		{	
				global $wp_query;
				$pages = $wp_query->max_num_pages;
				if(!$pages)
				{
						$pages = 1;
				}
		}
		
		
		if(1 != $pages){
				echo "<div id='pagination'>";
				echo ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<a href='".get_pagenum_link(1)."' class='btn'>&laquo; ".__('First', 'FoodRecipe')."</a> ":"";
				echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."' class='btn'>&laquo; ". __('Previous', 'FoodRecipe')."</a> ":"";
				
					
				for ($i=1; $i <= $pages; $i++){
						if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
								echo ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='btn current'>".$i."</a> ":"<a href='".get_pagenum_link($i)."' class='btn'>".$i."</a> "; 
						}
				}
				
				echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."' class='btn'>". __('Next', 'FoodRecipe') ." &raquo;</a> " :"";
				echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."' class='btn'>". __('Last', 'FoodRecipe') ." &raquo;</a> ":"";
				echo "</div>";
				}
	}


	/**
	* Trim a string to a given number of words
	*
	* @param $string
	*   the original string
	* @param $count
	*   the word count
	* @param $ellipsis
	*   TRUE to add "..."
	*   or use a string to define other character
	* @param $node
	*   provide the node and we'll set the $node->
	*   
	* @return
	*   trimmed string with ellipsis added if it was truncated
	*/
	function word_trim($string, $count, $ellipsis = FALSE){
		  $words = explode(' ', $string);
		  if (count($words) > $count){
			    array_splice($words, $count);
			    $string = implode(' ', $words);
			    
				if (is_string($ellipsis)){
						$string .= $ellipsis;
			    }
			    elseif ($ellipsis){
						$string .= '&hellip;';
			    }
		  }
		  return $string;
	}



/*-----------------------------------------------------------------------------------*/
/*	 Comment Callback
/*-----------------------------------------------------------------------------------*/	

if( !function_exists( 'recipe_comment' ) ) 
{
    function recipe_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment; 
		?>        
			<li <?php comment_class(); ?>  id="comment-<?php comment_ID() ?>">
			
            	<div class="img-box">
                        <a href="<?php echo get_comment_author_url(); ?>">
                        		<?php echo get_avatar( $comment->comment_author_email, 67 ); ?>
                        </a>
                </div>
                <div class="comment-body">
                        <p class="meta"><?php _e('posted by ', 'FoodRecipe'); ?> <?php comment_author_link(); ?> <?php _e(' on', 'FoodRecipe'); ?> <span> <?php echo get_comment_date(); ?> </span></p>
                        <div class="comment"><?php comment_text(); ?></div>
                        <?php if ($comment->comment_approved == '0') : ?>
			                    <em><?php _e('Your comment is awaiting moderation.','FoodRecipe') ?></em>
			                    <br />
		                <?php endif; ?>
						<div class="reply">
							<?php edit_comment_link(__('(Edit)', 'FoodRecipe'),'  ','') ?> &nbsp; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>
		        </div>
			
    	<?php
    }
}


/*-----------------------------------------------------------------------------------*/
// Custome Recipe Post Type
/*-----------------------------------------------------------------------------------*/
	
	add_action( 'init', 'create_recipe' );
	
	function create_recipe() {
		  
		  $labels = array(
				'name' => __('Recipes', 'FoodRecipe'),
				'singular_name' => __('Recipe', 'FoodRecipe'),
				'add_new' => __('Add New', 'FoodRecipe'), __('Recipe', 'FoodRecipe'),
				'add_new_item' => __('Recipe', 'FoodRecipe'),
				'edit_item' => __('Edit Recipe', 'FoodRecipe'),
				'new_item' => __('New Recipe', 'FoodRecipe'),
				'view_item' => __('View Recipe', 'FoodRecipe'),
				'search_items' => __('Search Recipes', 'FoodRecipe'),
				'not_found' =>  __('No Recipes found', 'FoodRecipe'),
				'not_found_in_trash' => __('No Recipes found in Trash', 'FoodRecipe'),
				'parent_item_colon' => ''
		  );
	
		  $supports = array(
					 'title',
					 'editor',
					 'thumbnail',
					 'categories',
					 'comments',
					 'excerpt',
					 'author'
					 );
		  
		  register_post_type( 'recipe',
				array(
					  'labels' => $labels,
					  'public' => true,
					  'menu_position' => 5,
					  'hierarchical' => false,
					  'supports' => $supports,
					  'taxonomies' => array('recipe-type', 'post_tag'),
					  'rewrite' => array( 'slug' => __('recipe', 'FoodRecipe') )
				)
		  );
		
	}
	
	
	// Custom Texonomy Recipe Types for Recipe
	add_action( 'init', 'build_taxonomies', 0 );  
	
	function build_taxonomies() {
			
			// Recipe Type Custom Taxonomy
			$recipe_type_labels = array(
					    'name' => __('Recipe Types', 'FoodRecipe'),
					    'singular_name' => __('Recipe Type', 'FoodRecipe'),
					    'search_items' => __('Search Recipe Types', 'FoodRecipe'),
					    'all_items' => __('All Recipe Types', 'FoodRecipe'),
					    'parent_item' => __('Parent Recipe Type', 'FoodRecipe'),
					    'parent_item_colon' =>__('Parent Recipe Type:', 'FoodRecipe'),
					    'edit_item' => __('Edit Recipe Type', 'FoodRecipe'), 
					    'update_item' => __('Update Recipe Type', 'FoodRecipe'),
					    'add_new_item' => __('Add New Recipe Type', 'FoodRecipe'),
					    'new_item_name' => __('Recipe Type Name', 'FoodRecipe'),
					    'menu_name' => __('Recipe Types', 'FoodRecipe')
					  ); 
  
			
	    	register_taxonomy(
			    'recipe_type',
			    'recipe',
			    array(
					  'hierarchical' => true,
					  'labels' => $recipe_type_labels,
					  'query_var' => true,
					  'rewrite' => array( 'slug' => __('recipe-type', 'FoodRecipe') )
			    )
		  	);
			
			// Cuisine Custom Taxonomy
			$cuisines_labels = array(
					    'name' => __('Cuisines', 'FoodRecipe'),
					    'singular_name' => __('Cuisine', 'FoodRecipe'),
					    'search_items' => __('Search Cuisines', 'FoodRecipe'),
					    'all_items' => __('All Cuisines', 'FoodRecipe'),
					    'parent_item' => __('Parent Cuisine', 'FoodRecipe'),
					    'parent_item_colon' =>__('Parent Cuisine:', 'FoodRecipe'),
					    'edit_item' => __('Edit Cuisine', 'FoodRecipe'), 
					    'update_item' => __('Update Cuisine', 'FoodRecipe'),
					    'add_new_item' => __('Add New Cuisine', 'FoodRecipe'),
					    'new_item_name' => __('Cuisine Name', 'FoodRecipe'),
					    'menu_name' => __('Cuisines', 'FoodRecipe')
					  ); 
					  
			register_taxonomy(
			    'cuisine',
			    'recipe',
			    array(
					  'hierarchical' => true,
					  'labels' => $cuisines_labels,
					  'query_var' => true,
					  'rewrite' => array( 'slug' => __('cuisine', 'FoodRecipe') )
			    )
		  	);
			
			// Courses Custom Taxonomy
			$courses_labels = array(
					    'name' => __('Courses', 'FoodRecipe'),
					    'singular_name' => __('Course', 'FoodRecipe'),
					    'search_items' => __('Search Courses', 'FoodRecipe'),
					    'all_items' => __('All Courses', 'FoodRecipe'),
					    'parent_item' => __('Parent Course', 'FoodRecipe'),
					    'parent_item_colon' =>__('Parent Course:', 'FoodRecipe'),
					    'edit_item' => __('Edit Course', 'FoodRecipe'), 
					    'update_item' => __('Update Course', 'FoodRecipe'),
					    'add_new_item' => __('Add New Course', 'FoodRecipe'),
					    'new_item_name' => __('Course Name', 'FoodRecipe'),
					    'menu_name' => __('Courses', 'FoodRecipe')
					  ); 
					  
			register_taxonomy(
			    'course',
			    'recipe',
			    array(
					  'hierarchical' => true,
					  'labels' => $courses_labels,
					  'query_var' => true,
					  'rewrite' => array( 'slug' => __('course', 'FoodRecipe') )
			    )
		  	);
			
			// Ingredients Custom Taxonomy
			$ingredients_labels = array(
					    'name' => __('Ingredients', 'FoodRecipe'),
					    'singular_name' => __('Ingredient', 'FoodRecipe'),
					    'search_items' => __('Search Ingredients', 'FoodRecipe'),
					    'all_items' => __('All Ingredients', 'FoodRecipe'),
					    'parent_item' => __('Parent Ingredient', 'FoodRecipe'),
					    'parent_item_colon' =>__('Parent Ingredient:', 'FoodRecipe'),
					    'edit_item' => __('Edit Ingredient', 'FoodRecipe'), 
					    'update_item' => __('Update Ingredient', 'FoodRecipe'),
					    'add_new_item' => __('Add New Ingredient', 'FoodRecipe'),
					    'new_item_name' => __('Ingredient Name', 'FoodRecipe'),
					    'menu_name' => __('Ingredients', 'FoodRecipe')
					  ); 
					  
			register_taxonomy(
			    'ingredient',
			    'recipe',
			    array(
					  'hierarchical' => true,
					  'labels' => $ingredients_labels,
					  'query_var' => true,
					  'rewrite' => array( 'slug' => __('ingredient', 'FoodRecipe') )
			    )
		  	);
			
			// Skill Level
			$skill_levels_labels = array(
					    'name' => __('Skill Levels', 'FoodRecipe'),
					    'singular_name' => __('Skill Level', 'FoodRecipe'),
					    'search_items' => __('Search Skill Levels', 'FoodRecipe'),
					    'all_items' => __('All Skill Levels', 'FoodRecipe'),
					    'parent_item' => __('Parent Skill Level', 'FoodRecipe'),
					    'parent_item_colon' =>__('Parent Skill Level:', 'FoodRecipe'),
					    'edit_item' => __('Edit Skill Level', 'FoodRecipe'), 
					    'update_item' => __('Update Skill Level', 'FoodRecipe'),
					    'add_new_item' => __('Add New Skill Level', 'FoodRecipe'),
					    'new_item_name' => __('Skill Level Name', 'FoodRecipe'),
					    'menu_name' => __('Skill Levels', 'FoodRecipe')
					  ); 
					  
			register_taxonomy(
			    'skill_level',
			    'recipe',
			    array(
					  'hierarchical' => true,
					  'labels' => $skill_levels_labels,
					  'query_var' => true,
					  'rewrite' => array( 'slug' => __('skill-level', 'FoodRecipe') )
			    )
		  	);
			
			
	}
	
	/* Add Custom Columns */
	  function recipe_edit_columns($columns){  
	  
				$columns = array(  
					"cb" => "<input type=\"checkbox\" />",  
					"title" => __( 'Recipe Title', 'FoodRecipe' ),
					"thumb" => __( 'Thumbnail', 'FoodRecipe' ),
					"id" => __( 'Recipe ID', 'FoodRecipe' ),
					"date" => __( 'Publish Time', 'FoodRecipe' )
				);  
					    
	          return $columns;  
	  }  
	    
	  function recipe_custom_columns($column){  
	          global $post;  
	          switch ($column)  
	          {    
	              case 'thumb':
	  				if(has_post_thumbnail($post->ID)) 
	  				{
	  					$image_id = get_post_thumbnail_id();
	  					$image_url = wp_get_attachment_url($image_id);
	  					?>
	  						<a href="<?php the_permalink(); ?>" target="_blank">
	  								<?php the_post_thumbnail('sidebar-tabs'); ?>
	  						</a>
	  					<?php
	  				}
	  				else
	  				{
						_e('No Thumbnail', 'FoodRecipe');
	  				}
	                  break;
	  			
	  			case 'id':
	                  echo $post->ID;
	                  break;
	          }  
	  } 
	  add_filter("manage_edit-recipe_columns", "recipe_edit_columns");  
	  add_action("manage_posts_custom_column",  "recipe_custom_columns");

/*-----------------------------------------------------------------------------------*/
/*	For Loading Required JS and Files
/*-----------------------------------------------------------------------------------*/	
	if(!function_exists('load_theme_scripts'))
	{
		function load_theme_scripts()
		{		
			if (!is_admin()) {
				
					$jscriptURL = get_template_directory_uri().'/js/';
					
					// Enquer Scripts		
					wp_enqueue_script('jquery');
					wp_enqueue_script('validate', $jscriptURL.'jquery.validate.js',array('jquery'), '1.5.2', false);
					wp_enqueue_script('forms', $jscriptURL.'jquery.form.js',array('jquery'), '2.93', false);					
					wp_enqueue_script('jsEasing', ($jscriptURL.'jquery.easing.1.3.js'), array('jquery'), '1.3', false);
					wp_enqueue_script('prettyphoto', $jscriptURL.'prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), '3.1.3', false);
					wp_enqueue_script('jQueryUI', $jscriptURL.'jquery-ui-1.9.2.custom.js', array('jquery'), '1.9.2', false);
					wp_enqueue_script('cyclePlugin', $jscriptURL.'jquery.cycle.js', array('jquery'), '2.9993', false);
					wp_enqueue_script('nivoSlider', $jscriptURL.'nivo-slider/jquery.nivo.slider.js', array('jquery'), '2.7.1', false);
					wp_enqueue_script('accordionSlider', $jscriptURL.'accordion-slider.js', array('jquery'), '1.0', false);
					wp_enqueue_script('custom_script',$jscriptURL.'script.js', array('jquery'), '1.0', true);

                    if ( is_singular() ){
                        wp_enqueue_script( 'comment-reply' );
                    }
			}
		}
	}
	add_action('wp_enqueue_scripts', 'load_theme_scripts');

/*-----------------------------------------------------------------------------------*/
/*	For Loading Required CSS Files
/*-----------------------------------------------------------------------------------*/	
	if(!function_exists('load_my_styles'))
	{
		function load_my_styles()
		{		
			if (!is_admin()) 
			{
				
				wp_register_style('nivoslider',  get_template_directory_uri() . '/js/nivo-slider/nivo-slider.css');
				wp_register_style('prettyPhoto',  get_template_directory_uri() . '/js/prettyPhoto/css/prettyPhoto.css');
                wp_register_style('blueskin',  get_template_directory_uri() . '/skin/blue/blue.css');
                wp_register_style('redskin',  get_template_directory_uri() . '/skin/red/red.css');
                wp_register_style('orangeskin',  get_template_directory_uri() . '/skin/orange/orange.css');
						
				// Enquer Styles
				wp_enqueue_style('nivoslider');
				wp_enqueue_style('prettyPhoto');

                /* Theme Skins */
                if ( function_exists( 'ot_get_option' ) ) {
                    $theme_skin = ot_get_option('skin_set');
                }
                if(isset($_GET['skin'])){
                    $theme_skin = $_GET['skin'];
                }elseif(isset($_COOKIE['skin'])){
                    $theme_skin = $_COOKIE['skin'];
                }
                if(!empty($theme_skin)){
                    switch($theme_skin){
                        case 'skin_blue':
                            wp_enqueue_style('blueskin');
                            break;
                        case 'skin_red':
                            wp_enqueue_style('redskin');
                            break;
                        case 'skin_orange':
                            wp_enqueue_style('orangeskin');
                            break;
                    }
                }


			}		
		}
	}
  	add_action('wp_enqueue_scripts', 'load_my_styles');


/*-----------------------------------------------------------------------------------*/
/*	Add Twitter, Facebook and Google URL links to User Profile.
/*-----------------------------------------------------------------------------------*/	
	add_filter('user_contactmethods', 'my_user_contactmethods');
	
	function my_user_contactmethods($user_contactmethods)
	{
	  	$user_contactmethods['twitter'] = 'Twitter URL';
	  	$user_contactmethods['facebook'] = 'Facebook URL';
	  	$user_contactmethods['google'] = 'Google URL';
		//$user_contactmethods['photo'] = 'Photo URL';
	  	
		return $user_contactmethods;
	}

/*-----------------------------------------------------------------------------------*/
/*	Add Recipes in RSS Feed
/*-----------------------------------------------------------------------------------*/	

	function my_recipes_feed($qv) {
		if (isset($qv['feed']) && !isset($qv['post_type']))
			$qv['post_type'] = array('post', 'recipe');
		return $qv;
	}
	add_filter('request', 'my_recipes_feed');

/*-----------------------------------------------------------------------------------*/
/*	Add Thumbnails in RSS Feed
/*-----------------------------------------------------------------------------------*/	

function rss_post_thumbnail_excerpt($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<p>' . get_the_post_thumbnail($post->ID, 'recipe-listing') .'</p>' . get_the_excerpt();
	}
	return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail_excerpt');

function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<p>' . get_the_post_thumbnail($post->ID, 'recipe-listing') .'</p>' . do_shortcode(get_the_content());
	}
	return $content;
}

add_filter('the_content_feed', 'rss_post_thumbnail');

/*-----------------------------------------------------------------------------------*/
/*	Insert Attachment Method for Recipe Submit Template
/*-----------------------------------------------------------------------------------*/	

function insert_attachment($file_handler,$post_id,$setthumb = false ) 
{
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );

	if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
	
	return $attach_id;
}

/*-----------------------------------------------------------------------------------*/
/*	Convert number of Minutes to Hours
/*-----------------------------------------------------------------------------------*/	

function convert_to_hours($time)
{
	$time = intval($time);
	
	if($time > 60 )
	{
		$hours = floor($time/60);
		$minutes = $time - ($hours * 60);
		return "$hours:$minutes h";
	}
	
	return $time.'m';
}




/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/	
if ( ! isset( $content_width ) ) $content_width = 590;


/*-----------------------------------------------------------------------------------*/
/*	Add Custom Background
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'custom-background' );


/*-----------------------------------------------------------------------------------*/
/*	Add Custom Header
/*-----------------------------------------------------------------------------------*/
$header_img_args = array(
	'flex-width'    => true,
	'width'         => 463,
	'flex-width'    => true,
	'height'        => 117,
	'default-image' => get_template_directory_uri() . '/images/header-image.png',
);
add_theme_support( 'custom-header', $header_img_args );



/*-----------------------------------------------------------------------------------*/
/*	Add Extra profile information to Author Profile Page
/*-----------------------------------------------------------------------------------*/
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) 
{ 
	?>
	<h3><?php _e('Extra profile information', 'FoodRecipe');?></h3>
	<table class="form-table">
		<tr>
			<th><label for="photo"><?php _e('Photo', 'FoodRecipe');?></label></th>
			<td>
				<input type="text" name="photo" id="photo" value="<?php echo esc_attr( get_the_author_meta( 'photo', $user->ID ) ); ?>" class="large-text" /><br />
				<span class="description"><?php _e('Please upload your photo in WordPress Media from left menu in WordPress admin area and after that copy and paste its url here.', 'FoodRecipe');?></span>
			</td>
		</tr>
		<tr>
			<th><label for="desc"><?php _e('Author Description', 'FoodRecipe');?></label></th>
			<td>
				<textarea name="desc" id="" cols="30" rows="10"><?php echo esc_attr( get_the_author_meta( 'desc', $user->ID ) ); ?></textarea>
                <br/>
                <span class="description"><?php _e('You can use html tags in this textbox.', 'FoodRecipe');?></span>
			</td>
		</tr>
	</table>
	<?php 
}


/*-----------------------------------------------------------------------------------*/
// Adding Taxonomies in search
/*-----------------------------------------------------------------------------------*/

function atom_search_where($where){
    global $wpdb;
    if (is_search())
        $where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
    return $where;
}

function atom_search_join($join){
    global $wpdb;
    if (is_search())
        $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
    return $join;
}

function atom_search_groupby($groupby){
    global $wpdb;

    // we need to group on post ID
    $groupby_id = "{$wpdb->posts}.ID";
    if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;

    // groupby was empty, use ours
    if(!strlen(trim($groupby))) return $groupby_id;

    // wasn't empty, append ours
    return $groupby.", ".$groupby_id;
}

add_filter('posts_where','atom_search_where');
add_filter('posts_join', 'atom_search_join');
add_filter('posts_groupby', 'atom_search_groupby');


/*-----------------------------------------------------------------------------------*/
/*	Update Extra profile information
/*-----------------------------------------------------------------------------------*/
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) 
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	update_user_meta( $user_id, 'photo', $_POST['photo'] );
	update_user_meta( $user_id, 'desc', $_POST['desc'] );
}


/*-----------------------------------------------------------------------------------*/
/*	Author page post type combined with post pagi fix.
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'author_page_404_fix' ) ) {

    function author_page_404_fix( $query ) {

        if ( $query->is_main_query() && is_author() && !is_404() ) {

            $my_post_type = get_query_var( 'post_type' );

            if ( empty( $my_post_type ) ) {

                $post_types = array( 'post' , 'recipe' );
                $query->set('post_type', $post_types );

            }
        }
    }

}

add_action( 'pre_get_posts', 'author_page_404_fix' );


/*---------------------------------------------------------------------------------/
//	Redirect User to Theme Options Page after Theme Activation
/---------------------------------------------------------------------------------*/
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
{
    wp_redirect( admin_url( 'admin.php?page=ot-theme-options' ) );
    exit;
}

/*-----------------------------------------------------------------------------------*/
/*	Skin Related Code For Demo
/*-----------------------------------------------------------------------------------*/
if(isset($_GET['skin'])){
    $theme_skin = $_GET['skin'];
    setcookie('skin',$theme_skin, time() + 600 );
}

?>