<?php
    add_action( 'after_setup_theme', 'setup' ); 
    function setup() {  
        // ...  
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'custom-image', 300, 300, true );  
        // ...  
    }  

    add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  
    function custom_image_sizes_choose( $sizes ) {  
        $custom_sizes = array(  
            'custom-image' => 'Custom Image'  
        );  
        return array_merge( $sizes, $custom_sizes );  
    }  	
?>