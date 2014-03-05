<?php
/* ___________________________________________________________

	add custom post types for the project
___________________________________________________________ */
add_action( 'init', 'de_project_register' );
function de_project_register() {
	$labels = array(
		'name' => _x( "Menu", "post type general name", 'designesia' ),
		'singular_name' => _x( "Menu Item", "post type singular name", 'designesia' ),
		'add_new' => _x( "Add New", "Menu item", 'designesia' ),
		'add_new_item' => __( "Add New Menu Item", 'designesia' ),
		'edit_item' => __( "Edit Menu Item", 'designesia' ),
		'new_item' => __( "New Menu Item", 'designesia' ),
		'view_item' => __( "View Menu Item", 'designesia' ),
		'search_items' => __( "Search Menu", 'designesia' ),
		'not_found' =>  __( "Nothing found", 'designesia' ),
		'not_found_in_trash' => __( "Nothing found in Trash", 'designesia' ),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 25,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'thumbnail' )
	  ); 
 
	register_post_type( 'menu' , $args );
	flush_rewrite_rules();
}
register_taxonomy( "menu_category", array( "menu" ), array( "hierarchical" => true, "label" => __( "Categories", 'designesia' ), "singular_label" => __( "Menu Category", 'designesia' ), "rewrite" => array('slug' => 'menu_category') ) );
?>
<?php
/* ___________________________________________________________

	add custom post types for the gallery
___________________________________________________________ */
add_action( 'init', 'de_gallery_register' );
function de_Gallery_register() {
	 
	$labels = array(
		'name' => _x( "Gallery", "post type general name", 'designesia' ),
		'singular_name' => _x( "Gallery Item", "post type singular name", 'designesia' ),
		'add_new' => _x( "Add New", "Gallery item", 'designesia' ),
		'add_new_item' => __( "Add New Gallery Item", 'designesia' ),
		'edit_item' => __( "Edit Gallery Item", 'designesia' ),
		'new_item' => __( "New Gallery Item", 'designesia' ),
		'view_item' => __( "View Gallery Item", 'designesia' ),
		'search_items' => __( "Search Gallery", 'designesia' ),
		'not_found' =>  __( "Nothing found", 'designesia' ),
		'not_found_in_trash' => __( "Nothing found in Trash", 'designesia' ),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 25,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title','editor','thumbnail' )
	  ); 
 
	register_post_type( 'gallery' , $args );
	flush_rewrite_rules();
}
register_taxonomy( "gallery_categories", array( "gallery" ), array( "hierarchical" => true, "label" => __( "Gallery Categories", 'designesia' ), "singular_label" => __( "Gallery Category", 'designesia' ), "rewrite" => array('slug' => 'gallery_categories')  ) );
?>
<?php
/* ___________________________________________________________

	add custom post types for slider
___________________________________________________________ */

add_action( 'init', 'de_slider_register' );
function de_slider_register() {
	$labels = array(
		'name' => _x( "Slider (Home)", "post type general name", 'designesia' ),
		'singular_name' => _x( "Slider Item", "post type singular name", 'designesia' ),
		'add_new' => _x( "Add New", "Slider item", 'designesia' ),
		'add_new_item' => __( "Add New Slider Item", 'designesia' ),
		'edit_item' => __( "Edit Slider Item", 'designesia' ),
		'new_item' => __( "New Slider Item", 'designesia' ),
		'view_item' => __( "View Slider Item", 'designesia' ),
		'search_items' => __( "Search Slider", 'designesia' ),
		'not_found' =>  __( "Nothing found", 'designesia' ),
		'not_found_in_trash' => __( "Nothing found in Trash", 'designesia' ),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 25,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'editor')
	  ); 
 
	register_post_type( 'slider' , $args );
	flush_rewrite_rules();
}

?>