<?php
ob_start();
$de_data = get_option( 'Lezatos_options' );
if ( !current_user_can('edit_posts') );
if(is_admin()){
	include('admin/index.php' );
}

add_theme_support( 'post-thumbnails', array( 'post', 'menu' ) );
/* -------------------------------------------------------------------------------- */
/* load css function
/* -------------------------------------------------------------------------------- */
function include_css(){
	wp_enqueue_style('grid', get_template_directory_uri() . '/css/grid.css', false, '1.0', 'screen');
	wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', false, '1.0', 'screen');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css', false, '1.0', 'screen');
	wp_enqueue_style('skeleton', get_template_directory_uri() . '/css/skeleton.css', false, '1.0', 'screen');
	wp_enqueue_style('supersized', get_template_directory_uri() . '/js/supersized/css/supersized.css', false, '1.0', 'screen');
	wp_enqueue_style('supersized_shutter', get_template_directory_uri() . '/js/supersized/theme/supersized.shutter.css', false, '1.0', 'screen');
	wp_enqueue_style('datepicker', get_template_directory_uri() . '/css/datepicker.css', false, '1.0', 'screen');
	wp_enqueue_style('override', get_template_directory_uri() . '/css/override.css', false, '1.0', 'screen');
	wp_enqueue_style('slider_text_n_desription_2', get_template_directory_uri() . '/css/slider_text_n_desription.css', false, '1.0', 'screen');
	
	$de_data = get_option( 'Lezatos_options' );
	if(!empty($de_data['DE_scheme_color'])){
	$de_scheme = $de_data['DE_scheme_color'];
	wp_enqueue_style('color_scheme', get_template_directory_uri() . '/css/'.$de_scheme, false, '1.0', 'screen');
	}else{
	}
}


/* -------------------------------------------------------------------------------- */
/* load javascript function
/* -------------------------------------------------------------------------------- */
function include_js() {
	wp_enqueue_script('custom_script-2', get_template_directory_uri() . '/js/easing.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-4', get_template_directory_uri() . '/js/jquery.prettyPhoto.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-5', get_template_directory_uri() . '/js/jquery.prettyPhoto.setting.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-14', get_template_directory_uri() . '/js/twitter.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-15', get_template_directory_uri() . '/js/selectnav.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-16', get_template_directory_uri() . '/js/ender.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-17', get_template_directory_uri() . '/js/video.resize.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-19', get_template_directory_uri() . '/js/jquery.tubular.1.0.js',array('jquery'),"",true);
	wp_enqueue_script('custom_script-DE', get_template_directory_uri() . '/js/designesia.js',array('jquery'),"",true);
	wp_enqueue_script('isotop', get_template_directory_uri() . '/js/jquery.isotope.min.js',array('jquery'),"",true);
	}

function de_admin_style() {
	wp_enqueue_style("de-panel", get_template_directory_uri()."/css/de-panel.css", false, "1.0", "all");
}

function styler() {
	include('styler.php');
}
/* -------------------------------------------------------------------------------- */
/* call css and js
/* -------------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'include_css');
add_action('wp_enqueue_scripts', 'include_js');
add_action('admin_enqueue_scripts', 'de_admin_style');
add_action('wp_head', 'styler');

//
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' ); 
// character limit function
function plugin_myContentFilter($content){
return substr($content, 0, 300);}
function title_limit($content){
return substr($content, 0, 5);}
?>
<?php 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
?>
<?php 
include ('designesia/de-theme-post-type.php'); 
include ('designesia/de-theme-post-meta.php');
include ('designesia/de-shortcode.php'); 
include ('designesia/de-custom-image-size.php');
include ('designesia/de-admin-custom-field.php');
include ('designesia/de-widget-social.php');

?>
<?php // P A G I N A T I O N
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class=\"pagination\">";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>";
     }
}

/* ----------------------------------------------------------------------------- */ 
/* register sidebar /* 
-------------------------------------------------------------------------------- */ 
 // The first sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Sidebar One', // The sidebar name to register
          'before_widget' => '<div class="my-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
     // The second sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Sidebar Two', // The sidebar name to register
          'before_widget' => '<div class="my-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
     // The third sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Sidebar Three', // The sidebar name to register
          'before_widget' => '<div class="my-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
	 // The Fourth sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Sidebar Four', // The sidebar name to register
          'before_widget' => '<div class="my-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
	 // The Fifth sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Sidebar Five', // The sidebar name to register
          'before_widget' => '<div class="my-widget">',
          'after_widget' => '</div>',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
	 
/* ----------------------------------------------------------------------------- */ 
/* register menu /* 
-------------------------------------------------------------------------------- */ 
register_nav_menu( 'primary', __( 'Primary Menu', 'Photogra' ) ); 
register_nav_menu( 'secondary', __( 'Secondary Menu', 'Photogra' ) ); 
function current_to_active($text){ $replace = array('current_page_item' => 'active', 'current_page_parent' => 'active', 'current_page_ancestor' => 'active', ); $text = str_replace(array_keys($replace), $replace, $text); return $text; } add_filter ('wp_nav_menu','current_to_active'); 
?>