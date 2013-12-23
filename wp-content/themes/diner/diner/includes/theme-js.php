<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );

if (!function_exists('woothemes_add_javascript')) {

	function woothemes_add_javascript( ) {
	
		wp_enqueue_script('jquery');    
		wp_enqueue_script( 'superfish', get_bloginfo('template_directory').'/includes/js/superfish.js', array( 'jquery' ) );
		
		if ( (get_option('woo_featured') == "true") && (is_home() || is_front_page()) ) {
		
			wp_enqueue_script( 'loopedSlider', get_bloginfo('template_directory').'/includes/js/loopedSlider.js', array( 'jquery' ) );
		
		} // End IF Statement
		
		wp_enqueue_script( 'general', get_bloginfo('template_directory').'/includes/js/general.js', array( 'jquery' ) );
		wp_enqueue_script('thickbox');
		
	} // End woothemes_add_javascript()
	
} // End IF Statement
?>