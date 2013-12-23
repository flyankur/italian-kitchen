<?php $theme_options = get_option('therestaurant');

//register the main wp3 menu
if (function_exists('register_nav_menu')) {
	register_nav_menu('mainmenu', 'Main navigation menu');
}

//include the admin controlpanel
if (is_admin()) {
	require_once(TEMPLATEPATH . '/backend/controlpanel.php');
	$cpanel = new ControlPanel();
	require_once(TEMPLATEPATH . '/backend/customfields.php');
}

//load frontend scripts
function script_loader() {
	if (!is_admin()) {
		wp_register_style('style', get_bloginfo('stylesheet_url'));
		wp_enqueue_style('style');
		
		wp_deregister_script('jquery' );
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
		wp_enqueue_script('jquery');
		
		wp_register_script('nivo', get_bloginfo('template_directory').'/js/jquery.nivo.slider.js');
		wp_enqueue_script('nivo');
		wp_register_style('nivostyle', get_bloginfo('template_directory').'/nivo-slider.css');
		wp_enqueue_style('nivostyle');

		wp_register_script('cufon', get_bloginfo('template_directory').'/fonts/cufon-yui.js');
		wp_enqueue_script('cufon');
		wp_register_script('font', get_bloginfo('template_directory').'/fonts/Junction_400.font.js');
		wp_enqueue_script('font');
		wp_register_script('font2', get_bloginfo('template_directory').'/fonts/OFL_Sorts_Mill_Goudy_TT_italic_500.font.js');
		wp_enqueue_script('font2');
	}
}
add_action('wp_enqueue_scripts', 'script_loader');

//load backend scripts
function admin_script_loader() {
	wp_register_style('controlpanel', get_bloginfo('template_directory').'/backend/controlpanel.css');
	wp_enqueue_style('controlpanel');
	wp_register_script('upload', get_bloginfo('template_directory').'/backend/upload.js');
	wp_enqueue_script('upload');
	
	if ($_REQUEST['page'] == 'therestaurant') {
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
	}
	if ($_REQUEST['post']) {
		wp_register_script('sortable', get_bloginfo('template_directory').'/backend/sortable.js');
		wp_enqueue_script('sortable');
	}
}
add_action('admin_enqueue_scripts', 'admin_script_loader');

//register the sidebars
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="sidepanel">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer',
		'before_widget' => '<div class="sidepanel">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Frontpage',
		'id' => 'frontpage',
		'before_widget' => '<div class="fronttext">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="frontcontent">'
	));
	if ($theme_options['cp_sidebar_name[]']) {
		foreach ($theme_options['cp_sidebar_name[]'] as $i=>$value) {
			if ($value) {
				$title = $theme_options['cp_sidebar_name[]'][$i];
				register_sidebar(array(
					'name' => $title,
					'id' => $title,
					'before_widget' => '<div class="sidepanel">',
					'after_widget' => '</div>',
					'before_title' => '<h3>',
					'after_title' => '</h3>'
				));
			}
		}
	}
}

//load sidebar
function sidebar_pos() {
	global $post;
	$pageid = $post->ID;
	$sidebarpos = strtolower(get_post_meta($pageid, "sidebarpos", true));
	if ($sidebarpos == 'left' || $sidebarpos == 'right' || $sidebarpos == 'hidden') {
		$theme_options['cp_sidebar_position'] = $sidebarpos;
	}
	if ($theme_options['cp_sidebar_position'] == 'hidden') { 
		$pos = "fullwidthpage"; 
	} 
	elseif ($theme_options['cp_sidebar_position'] == 'left') {
		$pos = "sidebar_left";
	} 
	else { 
		$pos = "sidebar_right"; 
	}
	return $pos;
}

//create the breadcrumb
function the_breadcrumb() {
	if (!is_home()) {
		echo '<div id="breadcrumbs">';
		echo '<a href="'.get_bloginfo("url").'">Home</a>';
		if (is_category() || is_single()) {
			$cat_ID = get_query_var('cat');
			if ($cat_ID) {
				echo ' / '.get_cat_name($cat_ID);
			} else {
				$categories = array_reverse(get_the_category());
				foreach($categories as $category) {
					echo ' / <a href="'.get_category_link($category->term_id).'">'.__($category->cat_name).'</a>';
				} 	
			}
			if (is_single()) {
				echo ' / ';
				the_title();
			}
		} elseif (is_page()) {
			echo ' / ';
			echo the_title();
		}
		echo '</div>';
	}
}

//get custom page template path
function page_template($id = '') {
	if ($id) {
		$template = get_post_meta($id, "_wp_page_template", true);
	} else {
		global $wp_query;
		$template = get_post_meta($wp_query->post->ID, "_wp_page_template", true);
	}
	return $template;
}

//get nice pagination
function nicepagination( $query, $pageid ) {
	$baseURL = get_permalink($pageid);
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<ul class="paging">';
		if ( $page > 1 ) {
			echo '<li class="previous"><a href="'.$baseURL.'page/'.($page-1).'/'.$qs.'">Previous</a></li>';
		}
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			if ( $i == $page ) {
				echo '<li class="active">'.$i.'</li>';
			} else {
				echo '<li><a href="'.$baseURL.'page/'.$i.'/'.$qs.'">'.$i.'</a></li>';
			}
		}
		if ( $page < $query->max_num_pages ) {
			echo '<li><a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'">Next</a></li>';
		}
		echo '</ul>';
	}
}

//custom media image sizes
if ( function_exists( 'add_image_size' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'menucard_thumb', 9999, 48 );
	add_image_size( 'gallery_thumb', 260, 9999 );
	add_image_size( 'mediumwidth', 586, 9999 );
	add_image_size( 'fullwidth', 906, 9999 );
}

// [line]
function line_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'sample' => false,
	), $atts ) );
	if ($sample) {
		$html = '[line]';
   		return '<span class="sc_sample"><h5>Shortcode:</h5>' . $html . '</span><br />';
	}
	else {
		return '<span class="devider"></span>';
	}
}
add_shortcode('line', 'line_shortcode');

// [column]
function column_shortcode( $atts, $content = null ) {
   	extract( shortcode_atts( array(
		'size' => '2x1',
		'last' => false,
		'title' => '',
		'sample' => false,
	), $atts ) );
	$html = '<div class="column' . $size;
	if ($last) $html .= ' last';
	$html .= '">';
	if ($title) $html .= '<h3>' . $title . '</h3>';
	$html .= do_shortcode($content) . '</div>';
	if ($sample) {
		$html = '[column size="' . $size . '"';
		if ($last) $html .= ' last="true"';
		if ($title) $html .= ' title="' . $title . '"';
		$html .= ']';
		$html .= '<br />Your content here<br />[/column]';
   		return '<span class="sc_sample"><h5>Shortcode:</h5>' . $html . '</span><br />';
	}
	else {
		return $html;
	}
}
add_shortcode('column', 'column_shortcode');
?>