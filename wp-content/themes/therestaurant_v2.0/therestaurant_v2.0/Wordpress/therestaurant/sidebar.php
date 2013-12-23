<?php 
$theme_options = get_option('therestaurant');
global $wp_query;
$pageid = $wp_query->post->ID;
$sidebar_id = strtolower(get_post_meta($pageid, "sidebar", true));
if (!$sidebar_id) {
	$sidebar_id = 'sidebar';
}
?>

	<div id="sidebar">		
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar_id) ) : ?>
        <?php endif; ?>
	</div><!-- #sidebar -->

