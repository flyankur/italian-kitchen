<?php
// ADD A COLUMN ONLY TO gallery CUSTOM TYPE POSTS

// gallery
add_filter('manage_gallery_posts_columns', 'de_columns_head_only_gallery', 10);
add_action('manage_gallery_posts_custom_column', 'de_columns_content_only_gallery', 10, 2);
// menu
add_filter('manage_menu_posts_columns', 'de_columns_head_only_menu', 10);
add_action('manage_menu_posts_custom_column', 'de_columns_content_only_menu', 10, 2);
// slider
add_filter('manage_slider_posts_columns', 'de_columns_head_only_slider', 10);
add_action('manage_slider_posts_custom_column', 'de_columns_content_only_slider', 10, 2);



// FUNCTIONS TO HANDLE THE COLUMN

// gallery
function de_columns_head_only_gallery($defaults) {
 $defaults['thumbnail'] = 'Thumbnail';
 $defaults['category'] = 'Gallery Category';
 return $defaults;
}
// menu
function de_columns_head_only_menu($defaults) {
 $defaults['thumbnail'] = 'Thumbnail';
 $defaults['price'] = 'Price';
 $defaults['category'] = 'Menu Category';
 return $defaults;
}
// slider
function de_columns_head_only_slider($defaults) {
 $defaults['thumbnail'] = 'Thumbnail';
 $defaults['text'] = 'Description Text';
 return $defaults;
}

// gallery
function de_columns_content_only_gallery($column_name, $post_ID) {
 switch ( $column_name ) {
	case 'thumbnail':
		echo get_the_post_thumbnail($post_ID, array(140,140) );
		break;
	case 'category':
		$terms = get_the_terms( $post_ID , 'gallery_categories' );
		if($terms!=""){
			foreach ( $terms as $term ) {
			echo $term->name;
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
		}
		break;
 }
}

// menu
function de_columns_content_only_menu($column_name, $post_ID) {
 switch ( $column_name ) {
	case 'thumbnail':
		echo get_the_post_thumbnail($post_ID, array(140,140) );
		break;
	case 'price':
		echo '<span class="price">'.get_post_meta($post_ID, 'price', true).'</span>';
		break;
	case 'category':
		$terms = get_the_terms( $post_ID , 'menu_category' );
		if($terms!=""){
			foreach ( $terms as $term ) {
			echo '<span class="term">'.$term->name.'</span>';
			}
		}
		break;
 }
}

// slider
function de_columns_content_only_slider($column_name, $post_ID) {
 switch ( $column_name ) {
	case 'thumbnail':
		echo '<img style="width:180px; height:auto; padding:5px 0 5px 0;" src="'.get_post_meta($post_ID, 'pic_1', true).'">';
		break;
	case 'text':
		the_content();
		break;
 }
}
?>