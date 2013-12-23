<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => __('Help', 'FoodRecipe'),
          'content'   => '<p>Welcome to <strong>Food Recipe WordPress Theme</strong> Option panel. If you have any questions, please follow documentation or feel free to post a ticket on our <a target="_blank" href="http://support.inspirythemes.com">Support forum.</a></p>'
        )
      ),
      'sidebar'       => '<p></p>'
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => __('Home Page', 'FoodRecipe'),
      ),
      array(
        'id'          => 'theme_styling',
        'title'       => __('Styles', 'FoodRecipe'),
      ),
      array(
        'id'          => 'left_image_slider',
        'title'       => __('Left Image Slider', 'FoodRecipe'),
      ),
      array(
        'id'          => 'basic_slider',
        'title'       => __('Basic Slider', 'FoodRecipe'),
      ),
      array(
        'id'          => 'nivo_slider',
        'title'       => __('Nivo Slider', 'FoodRecipe'),
      ),
      array(
        'id'          => 'thumbnail_slider',
        'title'       => __('Thumbnail Slider', 'FoodRecipe'),
      ),
      array(
        'id'          => 'accordion_slider',
        'title'       => __('Accordion Slider', 'FoodRecipe'),
      ),
      array(
        'id'          => 'footer',
        'title'       => __('Footer', 'FoodRecipe')
      ),
      array(
        'id'          => 'other_options',
        'title'       => __('Other Options', 'FoodRecipe'),
      ),
      array(
        'id'          => 'contact_options',
        'title'       => __('Contact Options', 'FoodRecipe'),
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'header_logo_image',
        'label'       => __('Header Logo', 'FoodRecipe'),
        'desc'        => __('Logo of your site.', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => __('Favicon', 'FoodRecipe'),
        'desc'        => __('Upload your favicon in PNG format.', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slider_type',
        'label'       => __('Select Home Page Slider', 'FoodRecipe'),
        'desc'        => __('Select the Slider Type from given list.', 'FoodRecipe'),
        'std'         => 'Left Image Slider',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Left Image Slider',
            'label'       => __('Left Image Slider', 'FoodRecipe'),
            'src'         => ''
          ),
          array(
            'value'       => 'Basic Slider',
            'label'       => __('Basic Slider', 'FoodRecipe'),
            'src'         => ''
          ),
          array(
            'value'       => 'Nivo Slider',
            'label'       => __('Nivo Slider', 'FoodRecipe'),
            'src'         => ''
          ),
          array(
            'value'       => 'Thumbnail Slider',
            'label'       => __('Thumbnail Slider', 'FoodRecipe'),
            'src'         => ''
          ),
          array(
            'value'       => 'Accordion Slider',
            'label'       => __('Accordion Slider', 'FoodRecipe'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'whats_hot1',
        'label'       => __('First Whats Hot Recipe', 'FoodRecipe'),
        'desc'        => __('Select first item for whats hot area', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'whats_hot2',
        'label'       => __('Second Whats Hot Recipe', 'FoodRecipe'),
        'desc'        => __('Select second item for whats hot area', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'whats_hot3',
        'label'       => __('Third Whats Hot Recipe', 'FoodRecipe'),
        'desc'        => __('Select third item for whats hot area', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'whats_hot4',
        'label'       => __('Fourth Whats Hot Recipe', 'FoodRecipe'),
        'desc'        => __('Select fourth item for whats hot area', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'l_slider_statement',
        'label'       => __('Slider Statement', 'FoodRecipe'),
        'desc'        => __('Enter statement for slider.', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'left_image_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_info_slider',
        'label'       => __('Right Info Slider', 'FoodRecipe'),
        'desc'        => __('Give your required recipe post IDs for each slide.', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'left_image_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'b_slider_statement',
        'label'       => __('Slider Statement', 'FoodRecipe'),
        'desc'        => __('Enter Slider Heading Statement', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'basic_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'basic_image_slider',
        'label'       => __('Basic Slider', 'FoodRecipe'),
        'desc'        => __('Select Images and recipe post IDs to show in Basic Slider. Required dimension is: width 905px and height 386px', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'basic_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'nivo_image_slider',
        'label'       => __('Nivo Image Slider', 'FoodRecipe'),
        'desc'        => __('Select Images for Nivo Slider and give Recipe Post IDs. Required dimension is: width 905px and height 370px', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'nivo_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'thumb_slider_images',
        'label'       => __('Thumbnail Slider Images', 'FoodRecipe'),
        'desc'        => __('Add images for thumbnail slider. Required dimension is: width 905px and height 370px', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'thumbnail_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'accor_slider_images',
        'label'       => __('Accordion Slider Images', 'FoodRecipe'),
        'desc'        => __('Add images for thumbnail slider. Required dimension is: width 740px and height 425px', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'accordion_slider',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'copyright_statement',
        'label'       => __('Copyright Statement', 'FoodRecipe'),
        'desc'        => __('Enter copyright statement for footer', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_dev_statement',
        'label'       => __('Designer and Developer Statement', 'FoodRecipe'),
        'desc'        => __('Enter Designer and Developter Statement', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'weekly_special_recipe',
        'label'       => __('Weekly Special Recipe', 'FoodRecipe'),
        'desc'        => __('Select Weekly Special Recipe for Weekly Special Widget', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'other_options',
        'rows'        => '',
        'post_type'   => 'recipe',
        'taxonomy'    => '',
        'class'       => ''
      ),
        array(
            'id'          => 'recipes_per_page_listing',
            'label'       => __('Recipes Per Page (number only)', 'FoodRecipe'),
            'desc'        => __('Enter the number of recipes you want to show on recipe listing page. Default value is 6.', 'FoodRecipe'),
            'std'         => '6',
            'type'        => 'text',
            'section'     => 'other_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
        ),
      array(
        'id'          => 'recipe_template_type',
        'label'       => __('Select Single Recipe Template Type', 'FoodRecipe'),
        'desc'        => __('Select from the options how you want to show your single recipe page.', 'FoodRecipe'),
        'std'         => 'Recipe Template with Sidebar',
        'type'        => 'select',
        'section'     => 'other_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Recipe Template with Sidebar',
            'label'       => __('Recipe Template with Sidebar', 'FoodRecipe'),
            'src'         => ''
          ),
          array(
            'value'       => 'Recipe Template Full Width',
            'label'       => __('Recipe Template Full Width', 'FoodRecipe'),
            'src'         => ''
          )
        ),
      ),array(
            'id'          => 'skin_set',
            'label'       => __('Color Skins', 'FoodRecipe'),
            'desc'        => __('Select color skin from the given options.', 'FoodRecipe'),
            'std'         => 'default',
            'type'        => 'select',
            'section'     => 'theme_styling',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array(
                array(
                    'value'       => 'skin_default',
                    'label'       => __('Default', 'FoodRecipe'),
                    'src'         => ''
                ),array(
                    'value'       => 'skin_blue',
                    'label'       => __('Blue', 'FoodRecipe'),
                    'src'         => ''
                ),array(
                    'value'       => 'skin_orange',
                    'label'       => __('Orange', 'FoodRecipe'),
                    'src'         => ''
                ),
                array(
                    'value'       => 'skin_red',
                    'label'       => __('Red', 'FoodRecipe'),
                    'src'         => ''
                )
            ),
        ),
      array(
        'id'          => 'quick_css_box',
        'label'       => __('Quick CSS Box', 'FoodRecipe'),
        'desc'        => 'If you want to do minor changes in styles, you target elements from this box. If you want to do heavy changes then put your styles in custom-styles.css file in theme root directory.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'theme_styling',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),array(
            'id'          => 'recipe_show_social_icons',
            'label'       => __('Show Social icons on Single Recipe Page', 'FoodRecipe'),
            'desc'        => __('Select if you want to enable or disable social icons at the end of each single recipe.', 'FoodRecipe'),
            'std'         => 'show',
            'type'        => 'select',
            'section'     => 'other_options',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array(
                array(
                    'value'       => 'show_social',
                    'label'       => __('Show', 'FoodRecipe'),
                    'src'         => ''
                ),array(
                    'value'       => 'hide_social',
                    'label'       => __('Hide', 'FoodRecipe'),
                    'src'         => ''
                )
            ),
        ),
      array(
        'id'          => 'show_contact_map',
        'label'       => __('Google  Map', 'FoodRecipe'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'show',
            'label'       => __('Show', 'FoodRecipe'),
            'src'         => ''
          ),
          array(
            'value'       => 'hide',
            'label'       => __('Hide', 'FoodRecipe'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'map_latitude',
        'label'       => __('Map Latitude', 'FoodRecipe'),
        'desc'        => __('Enter Google Map Latitude for your place. You can get Latitude Value From	http://itouchmap.com/latlong.html', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'map_longitude',
        'label'       => __('Map Longitude', 'FoodRecipe'),
        'desc'        => __('Enter Google Map Longitude for your place. You can get Longitude Value From	http://itouchmap.com/latlong.html', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'map_zoom_level',
        'label'       => __('Map Zoom Level', 'FoodRecipe'),
        'desc'        => __('Enter Google Map Zoom Level', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'contact_form_heading',
        'label'       => __('Contact Form Heading', 'FoodRecipe'),
        'desc'        => __('Give a heading to your contact form.', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'contact_email_address',
        'label'       => __('Contact Email Address', 'FoodRecipe'),
        'desc'        => __('Enter an email address that will recieve contact form messages.', 'FoodRecipe'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

?>