<?php

	//Required Variables 
	$atp_readmoretxt = get_option('atp_readmoretxt') ? get_option('atp_readmoretxt') : 'Read More';
	$atp_viewprofiletxt = get_option('atp_viewprofiletxt') ? get_option('atp_viewprofiletxt') : 'View full porfile';
	/**
	 * Please refrain from editing this file 
	 * Required Variables Globally in the theme
	 */
	$atp_breadcrumbs = get_option('atp_breadcrumbs');
	$atp_singlenavigation = get_option('atp_singlenavigation');
	$relatedposts = get_option('atp_relatedposts');
	$atp_singlefeaturedimg = get_option('atp_singlefeaturedimg');
	$aboutauthor = get_option('atp_aboutauthor');
	$atp_teaser = get_option('atp_teaser');	
	$atp_timthumb = get_option('atp_timthumb');
	$readmoretxt = get_option('atp_readmore_text') ? get_option('atp_readmore_text'):'Read More';
	$reservationleftsidetext = get_option('atp_reservationleftsidetext') ? get_option('atp_reservationleftsidetext'):'Select the date for your reservation:';
	$reservationinformationtext = get_option('atp_reservationinformationtext') ? get_option('atp_reservationinformationtext'):'Reservation Information:';
	$priceperserving= get_option('atp_priceperserving') ? get_option('atp_priceperserving'):'';
	$homepage_id = get_option('atp_homepage');
	
	$comments = get_option('atp_commentstemplate');
	/**
	 * Excludes categories for custom post type tags archive
	 */
	add_filter('pre_get_posts', 'query_post_type');

	function query_post_type($query) {
		if ( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
			$post_type = get_query_var('post_type');
			if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('post','menus'); 
			$query->set('post_type',$post_type);
			return $query;
		}
	}

	$atp_ribbons = array(
		''		=> 'Select Ribbons',
		'01'	=>'New',
		'02'	=>'Updated',
		'03'	=>'Featured',
		'05'	=>'100%',
		'06'	=>'100% Money Back',
		'07'	=>'100% Warranty',
		'08'	=>'100% satisfaction',
		'09'	=>'Buy 1 Get 1 Free',
		'10'	=>'Buy 2 Get 1 Free',
		'11'	=>'FREE Bonus Offer',
		'12'	=>'Special Offer',
		'13'	=>'Best Choice',
		'14'	=>'Get 1 Free',
		'15'	=>'FREE',
		'16'	=>'TRY!',
		'17'	=>'TRY NOW!',
		'18'	=>'BUY',
		'19'	=>'BUY NOW!',
		'20'	=>'NOW!',
		'21'	=>'SOON',
		'22'	=>'Limited Offer',
		'23'	=>'Limited',
		'24'	=>'Stock Limited',
		'25'	=>'SALE',
		'26'	=>'Best Price',
		'27'	=>'Sold',
		'28'	=>'SOLD OUT!',
		'29'	=>'HOT DEALS',
		'30'	=>'HOT!',
		'31'	=>'COOL',
		'32'	=>'Best Seller',
		'33'	=>'Latest',
		'34'	=>'5% OFF',
		'35'	=>'10% OFF',
		'36'	=>'15% OFF',
		'37'	=>'20% OFF',
		'38'	=>'25% OFF',
		'39'	=>'30% OFF',
		'40'	=>'35% OFF',
		'41'	=>'40% OFF',
		'42'	=>'45% OFF',
		'43'	=>'50% OFF',
		'44'	=>'55% OFF',
		'45'	=>'60% OFF',
		'46'	=>'65% OFF',
		'47'	=>'70% OFF',
		'48'	=>'75% OFF',
		'49'	=>'80% OFF',
		'50'	=>'85% OFF',
		'51'	=>'90% OFF',
		'52'	=>'95% OFF',
		'53'	=>'Required',
		'54'	=>'Rated',
		'55'	=>'Start Rated',
		'56'	=>'5 Star',
		'57'	=>'4 Star',
		'58'	=>'3 Star',
		'59'	=>'2 Star',
		'60'	=>'1 Star',
		'61'	=>'0 Star',
		'62'	=>'HURRY!',
		'63'	=>'Coming Soon',
		'64'	=>'Best Value',
		'65'	=>'Guaranteed'	
	);
	// atp function start
	if(!class_exists('atp_theme')){
		// class start
		class atp_theme {
		public $theme_name;
			public function __construct()	{
				$this->atp_constant();
				$this->atp_themesupport();
				$this->atp_head();
				$this->atp_cufonfont();
				$this->atp_themepanel();
				$this->atp_widgets();
				$this->atp_post_types();
				$this->atp_custom_meta();
				$this->atp_shortcodes();
				$this->atp_common();
			}

			function atp_constant()	{
				/**
				 * Framework General Variables and directory paths
				 */
				define('FRAMEWORK', '2.0'); //  Framework Version
				$theme_data = wp_get_theme();
				$theme_name =  $theme_data->Name;
				define('THEMENAME',$theme_data->Name);
				define('THEMEVERSION',$theme_data->Version);
				/**
				 * Set the file path based on whether the Options Framework is in a parent theme or child theme
				 * Directory Structure
				 */
				define('THEME_URI', get_template_directory_uri());	
				define('THEME_DIR',get_template_directory());
				
				define('FRAMEWORK_DIR', get_template_directory() . '/framework/');
				define('FRAMEWORK_URI', get_template_directory_uri() . '/framework/');
				define('CUSTOM_META', FRAMEWORK_DIR . '/custom-meta/');
				define('CUSTOM_PLUGINS', FRAMEWORK_DIR . '/custom-plugins/');
				define('CUSTOM_POST', FRAMEWORK_DIR . '/custom-post/');
				
				define('THEME_JS', THEME_URI . '/js');
				define('THEME_CSS', THEME_URI . '/css');

				define('THEME_SHORTCODES', FRAMEWORK_DIR . 'shortcode/');
				define('THEME_WIDGETS', FRAMEWORK_DIR . 'widgets/');
				define('THEME_PLUGINS', FRAMEWORK_DIR . 'plugins/');
				define('THEME_POSTTYPE',FRAMEWORK_DIR .'custom-post/');
				define('THEME_CUSTOMMETA',FRAMEWORK_DIR.'custom-meta/');
				define('THEME_PATTDIR', get_template_directory_uri().'/images/patterns/');

			}
			// widgets
			function atp_widgets() {
				$atp_widgts=array('register_widget','reservation','contactform','contactinfo','gmap','business_hours','flickr','twitter','sociable','popularpost','recentpost');
				foreach($atp_widgts as $widget)
				{
					require_once(THEME_WIDGETS .$widget.'.php');
				}
			}
			// header loads
			function atp_head(){
				require_once(FRAMEWORK_DIR . 'common/head.php');
			}
			// atp cufon font
			function atp_cufonfont(){
				require_once(FRAMEWORK_DIR . 'common/atp_googlefont.php');
				require_once(FRAMEWORK_DIR . 'common/atp_cufon.php');
			}
			// shortcodes
			function atp_shortcodes(){
				$atp_short=array('boxes','buttons','chart','contactform','contactinfo','flickr','general','gmap','gallery','foodmenu','image','layout','lightbox','messageboxes','flexslider','popular','recent','sociable','tabs_toggles','todayspecial','twitter','videos');
				foreach($atp_short as $short){
					require_once(THEME_SHORTCODES .$short.'.php');
				}
			}
			// support functions
			function atp_themesupport() {
					
				// Add support for a variety of post formats
				//add_theme_support( 'post-formats', array( 'aside','audio','link', 'image', 'gallery', 'quote','status','video') );
				/**
				 * Add Theme Support for 
				 * post thumbnails and automatic feed links
				 */
				add_theme_support('post-thumbnails', array('post', 'page', 'menus','reservation','slider'));
				add_theme_support('automatic-feed-links');
					if ( ! isset( $content_width ) )
				$content_width = 900;
				// This theme styles the visual editor with editor-style.css to match the theme style.
				add_editor_style();
				/**
				 * function register_my_menus - Registers Menus
				 */
				add_theme_support( 'editor-style' );
				add_theme_support('menus');
				
			   register_nav_menus(array(
					'primary-menu' => __( '<p>Primary Menu <br><small>This will appear beside Logo</small></p>','ATP_ADMIN_SITE' )
					//'secondary-menu' => __( '<p>Secondary Menu <br><small>This will appear above Logo</small></p>','ATP_ADMIN_SITE' )
				));

			}
			function atp_common() {
				require_once(FRAMEWORK_DIR . 'common/atp_generator.php');
				require_once(FRAMEWORK_DIR . 'common/pagination.php');
				require_once(FRAMEWORK_DIR . 'common/sociable-bookmark.php');
				require_once(FRAMEWORK_DIR . 'includes/image_resize.php');
				require_once(THEME_PLUGINS . 'breadcrumbs-plus/breadcrumbs-plus.php'); 
			}
			// posttype
			function atp_post_types(){
				require_once(THEME_POSTTYPE . '/slider.php');
				require_once(THEME_POSTTYPE . '/menus.php');
				require_once(THEME_POSTTYPE.'/reservations.php');
			}
			// custommeta
			function atp_custom_meta(){
				require_once(THEME_CUSTOMMETA . '/page-meta.php');
				require_once(THEME_CUSTOMMETA . '/post-meta.php');
				require_once(THEME_CUSTOMMETA . '/reservation-meta.php');
				require_once(THEME_CUSTOMMETA . '/menus-meta.php');
				require_once(THEME_CUSTOMMETA . '/slider-meta.php');
				require_once(THEME_CUSTOMMETA . '/meta-generator.php');
				require_once(THEME_CUSTOMMETA . '/shortcode-meta.php');
				require_once(THEME_CUSTOMMETA . '/shortcode-generator.php');			
			}
			// shortcodes
			function atp_themepanel(){	
				// These files build out the options interface.  
				//require_once(FRAMEWORK_DIR . 'admin/admin-functions.php');
				require_once(FRAMEWORK_DIR . 'admin/admin-interface.php');
				require_once(FRAMEWORK_DIR . 'admin/theme-options.php');
				if(isset($_GET['page']) == 'advance') {
					require_once(FRAMEWORK_DIR . 'admin/advance-options.php');
				}
			}
			// class end
		}
	}
	$atp_theme=new atp_theme();

	function pfix($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);

		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'pfix');
	
	$shortname = "atp";
	$url =  FRAMEWORK_URI . 'admin/images/';

	/**
	 * Allows shortcodes in sidebar widgets / Text widget
	 * Content with shortcodes replaced by the output from the shortcode's handler(s).  
	 */
	add_filter('widget_text', 'do_shortcode');
	$atp_singlenavigation = get_option('atp_singlenavigation');
	
	/**
	 * code that executes when theme is being activated
	 */
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' && get_option('atp_default_template_option_values','defaultoptionsnotexists') =='defaultoptionsnotexists'){
	$default_option_values = 'YToyMjI6e3M6ODoiYXRwX2xvZ28iO3M6NDoibG9nbyI7czoxNToiYXRwX2hlYWRlcl9sb2dvIjtzOjYyOiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS92aWN0b3JpYS9maWxlcy8yMDEyLzA2L3ZpY3RvcmlhLnBuZyI7czoxOToiYXRwX2xvZ290aXRsZV9jb2xvciI7czo3OiIjMGQwZDBkIjtzOjE4OiJhdHBfbG9nb3RpdGxlX2ZhY2UiO3M6MDoiIjtzOjE4OiJhdHBfbG9nb3RpdGxlX3NpemUiO3M6NDoiNTBweCI7czoyNDoiYXRwX2xvZ290aXRsZV9saW5laGVpZ2h0IjtzOjQ6IjM0cHgiO3M6MTk6ImF0cF9sb2dvdGl0bGVfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjI1OiJhdHBfbG9nb3RpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxNzoiYXRwX3RhZ2xpbmVfY29sb3IiO3M6MDoiIjtzOjE2OiJhdHBfdGFnbGluZV9mYWNlIjtzOjE0OiJHZW9yZ2lhLCBzZXJpZiI7czoxNjoiYXRwX3RhZ2xpbmVfc2l6ZSI7czo0OiIxMnB4IjtzOjIyOiJhdHBfdGFnbGluZV9saW5laGVpZ2h0IjtzOjQ6IjE2cHgiO3M6MTc6ImF0cF90YWdsaW5lX3N0eWxlIjtzOjY6Iml0YWxpYyI7czoyMzoiYXRwX3RhZ2xpbmVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjExOiJhdHBfbG9nb19tdCI7czowOiIiO3M6MTE6ImF0cF9sb2dvX21iIjtzOjA6IiI7czoxODoiYXRwX2N1c3RvbV9mYXZpY29uIjtzOjA6IiI7czoxMDoiYXRwX3RlYXNlciI7czo3OiJkZWZhdWx0IjtzOjE3OiJhdHBfdGVhc2VyX2N1c3RvbSI7czowOiIiO3M6MTg6ImF0cF90ZWFzZXJfdHdpdHRlciI7czoxMzoic3lzdGVtMzJzdG9yZSI7czoxNjoiYXRwX2xheW91dG9wdGlvbiI7czo1OiJib3hlZCI7czoyNDoiYXRwX2Zyb250cGFnZXdpZGdldGNvdW50IjtzOjE6IjMiO3M6MTM6ImF0cF90ZWFzZXJfYmciO3M6NzoiIzU3M2YyZiI7czoyNDoiYXRwX2hvbWVwYWdldGVhc2VyX2NvbG9yIjtzOjc6IiNlM2QyYWEiO3M6MjM6ImF0cF9ob21lcGFnZXRlYXNlcl9mYWNlIjtzOjA6IiI7czoyMzoiYXRwX2hvbWVwYWdldGVhc2VyX3NpemUiO3M6MDoiIjtzOjI5OiJhdHBfaG9tZXBhZ2V0ZWFzZXJfbGluZWhlaWdodCI7czowOiIiO3M6MjQ6ImF0cF9ob21lcGFnZXRlYXNlcl9zdHlsZSI7czowOiIiO3M6MzA6ImF0cF9ob21lcGFnZXRlYXNlcl9mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9ob21lcGFnZSI7czoyOiIyNiI7czo5OiJhdHBfc3R5bGUiO3M6MToiMCI7czoyNDoiYXRwX2JvZHlwcm9wZXJ0aWVzX2ltYWdlIjtzOjc1OiJodHRwOi8vd3d3LmFpdmFodGhlbWVzLmNvbS92aWN0b3JpYS9maWxlcy8yMDEyLzA2L3RpbGVhYmxlX3dvb2RfdGV4dHVyZS5wbmciO3M6MjQ6ImF0cF9ib2R5cHJvcGVydGllc19jb2xvciI7czowOiIiO3M6MjQ6ImF0cF9ib2R5cHJvcGVydGllc19zdHlsZSI7czo2OiJyZXBlYXQiO3M6Mjc6ImF0cF9ib2R5cHJvcGVydGllc19wb3NpdGlvbiI7czo4OiJsZWZ0IHRvcCI7czoyOToiYXRwX2JvZHlwcm9wZXJ0aWVzX2F0dGFjaG1lbnQiO3M6NToiZml4ZWQiO3M6MTc6ImF0cF9vdmVybGF5aW1hZ2VzIjtzOjEyOiJwYXR0ZXJuNi5wbmciO3M6MjM6ImF0cF9zbGlkZXJiZ3Byb3VwX2ltYWdlIjtzOjA6IiI7czoyMzoiYXRwX3NsaWRlcmJncHJvdXBfY29sb3IiO3M6MDoiIjtzOjIzOiJhdHBfc2xpZGVyYmdwcm91cF9zdHlsZSI7czo2OiJyZXBlYXQiO3M6MjY6ImF0cF9zbGlkZXJiZ3Byb3VwX3Bvc2l0aW9uIjtzOjEwOiJjZW50ZXIgdG9wIjtzOjI4OiJhdHBfc2xpZGVyYmdwcm91cF9hdHRhY2htZW50IjtzOjY6InNjcm9sbCI7czoxNDoiYXRwX3RoZW1lY29sb3IiO3M6MDoiIjtzOjEwOiJhdHBfd3JhcGJnIjtzOjA6IiI7czoyOToiYXRwX3N1YmhlYWRlcnByb3BlcnRpZXNfaW1hZ2UiO3M6MDoiIjtzOjI5OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19jb2xvciI7czo3OiIjZTgxMjQxIjtzOjI5OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19zdHlsZSI7czo5OiJuby1yZXBlYXQiO3M6MzI6ImF0cF9zdWJoZWFkZXJwcm9wZXJ0aWVzX3Bvc2l0aW9uIjtzOjEwOiJjZW50ZXIgdG9wIjtzOjM0OiJhdHBfc3ViaGVhZGVycHJvcGVydGllc19hdHRhY2htZW50IjtzOjY6InNjcm9sbCI7czoxNzoiYXRwX3N1YmhlYWRlcnRleHQiO3M6MDoiIjtzOjE2OiJhdHBfc3ViaGVhZGVyX3B0IjtzOjA6IiI7czoxNjoiYXRwX3N1YmhlYWRlcl9wYiI7czowOiIiO3M6MTc6ImF0cF9mb290ZXJiZ2NvbG9yIjtzOjA6IiI7czoxOToiYXRwX2Zvb3RlcnRleHRjb2xvciI7czowOiIiO3M6MjE6ImF0cF9mb290ZXJ0aXRsZV9jb2xvciI7czowOiIiO3M6MjA6ImF0cF9mb290ZXJ0aXRsZV9mYWNlIjtzOjA6IiI7czoyMDoiYXRwX2Zvb3RlcnRpdGxlX3NpemUiO3M6MDoiIjtzOjI2OiJhdHBfZm9vdGVydGl0bGVfbGluZWhlaWdodCI7czowOiIiO3M6MjE6ImF0cF9mb290ZXJ0aXRsZV9zdHlsZSI7czowOiIiO3M6Mjc6ImF0cF9mb290ZXJ0aXRsZV9mb250dmFyaWFudCI7czowOiIiO3M6MTU6ImF0cF9jb3B5Ymdjb2xvciI7czowOiIiO3M6MjA6ImF0cF9jb3B5cmlnaHRzX2NvbG9yIjtzOjA6IiI7czoxOToiYXRwX2NvcHlyaWdodHNfZmFjZSI7czoxMToiRHJvaWQgU2VyaWYiO3M6MTk6ImF0cF9jb3B5cmlnaHRzX3NpemUiO3M6NDoiMTFweCI7czoyNToiYXRwX2NvcHlyaWdodHNfbGluZWhlaWdodCI7czo0OiIyMHB4IjtzOjIwOiJhdHBfY29weXJpZ2h0c19zdHlsZSI7czo2OiJub3JtYWwiO3M6MjY6ImF0cF9jb3B5cmlnaHRzX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxNToiYXRwX21haW5tZW51X2JnIjtzOjA6IiI7czoxODoiYXRwX21haW5tZW51X2NvbG9yIjtzOjA6IiI7czoxNzoiYXRwX21haW5tZW51X2ZhY2UiO3M6MDoiIjtzOjE3OiJhdHBfbWFpbm1lbnVfc2l6ZSI7czo0OiIxNnB4IjtzOjIzOiJhdHBfbWFpbm1lbnVfbGluZWhlaWdodCI7czowOiIiO3M6MTg6ImF0cF9tYWlubWVudV9zdHlsZSI7czowOiIiO3M6MjQ6ImF0cF9tYWlubWVudV9mb250dmFyaWFudCI7czowOiIiO3M6MjY6ImF0cF9tYWlubWVudWRyb3Bkb3duX2NvbG9yIjtzOjA6IiI7czoyNToiYXRwX21haW5tZW51ZHJvcGRvd25fZmFjZSI7czowOiIiO3M6MjU6ImF0cF9tYWlubWVudWRyb3Bkb3duX3NpemUiO3M6MDoiIjtzOjMxOiJhdHBfbWFpbm1lbnVkcm9wZG93bl9saW5laGVpZ2h0IjtzOjA6IiI7czoyNjoiYXRwX21haW5tZW51ZHJvcGRvd25fc3R5bGUiO3M6MDoiIjtzOjMyOiJhdHBfbWFpbm1lbnVkcm9wZG93bl9mb250dmFyaWFudCI7czowOiIiO3M6MjI6ImF0cF9tYWlubWVudV9saW5raG92ZXIiO3M6MDoiIjtzOjE5OiJhdHBfbWFpbm1lbnVfc3ViX2JnIjtzOjA6IiI7czoyMToiYXRwX21haW5tZW51X3N1Yl9saW5rIjtzOjA6IiI7czoyNjoiYXRwX21haW5tZW51X3N1Yl9saW5raG92ZXIiO3M6MDoiIjtzOjI0OiJhdHBfbWFpbm1lbnVfc3ViX2hvdmVyYmciO3M6MDoiIjtzOjg6ImF0cF9saW5rIjtzOjA6IiI7czoxMzoiYXRwX2xpbmtob3ZlciI7czowOiIiO3M6MTc6ImF0cF9zdWJoZWFkZXJsaW5rIjtzOjA6IiI7czoyMjoiYXRwX3N1YmhlYWRlcmxpbmtob3ZlciI7czowOiIiO3M6MTg6ImF0cF9icmVhZGNydW1ibGluayI7czowOiIiO3M6MjM6ImF0cF9icmVhZGNydW1ibGlua2hvdmVyIjtzOjA6IiI7czoyMzoiYXRwX2VudHJ5dGl0bGVsaW5raG92ZXIiO3M6MDoiIjtzOjE0OiJhdHBfZm9vdGVybGluayI7czowOiIiO3M6MTk6ImF0cF9mb290ZXJsaW5raG92ZXIiO3M6MDoiIjtzOjE3OiJhdHBfY29weXJpZ2h0bGluayI7czowOiIiO3M6OToiYXRwX2N1Zm9uIjtzOjE5OiJUaXRpbGxpdW1UZXh0MjJMIEx0IjtzOjE1OiJhdHBfYm9keXBfY29sb3IiO3M6MDoiIjtzOjE0OiJhdHBfYm9keXBfZmFjZSI7czowOiIiO3M6MTQ6ImF0cF9ib2R5cF9zaXplIjtzOjQ6IjEycHgiO3M6MjA6ImF0cF9ib2R5cF9saW5laGVpZ2h0IjtzOjQ6IjE4cHgiO3M6MTU6ImF0cF9ib2R5cF9zdHlsZSI7czo2OiJub3JtYWwiO3M6MjE6ImF0cF9ib2R5cF9mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9oZWFkaW5ncyI7czowOiIiO3M6MTI6ImF0cF9oMV9jb2xvciI7czowOiIiO3M6MTE6ImF0cF9oMV9mYWNlIjtzOjExOiJDcmV0ZSBSb3VuZCI7czoxMToiYXRwX2gxX3NpemUiO3M6NDoiMzBweCI7czoxNzoiYXRwX2gxX2xpbmVoZWlnaHQiO3M6NDoiMzJweCI7czoxMjoiYXRwX2gxX3N0eWxlIjtzOjY6Im5vcm1hbCI7czoxODoiYXRwX2gxX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMjoiYXRwX2gyX2NvbG9yIjtzOjA6IiI7czoxMToiYXRwX2gyX2ZhY2UiO3M6MTE6IkNyZXRlIFJvdW5kIjtzOjExOiJhdHBfaDJfc2l6ZSI7czo0OiIyNHB4IjtzOjE3OiJhdHBfaDJfbGluZWhlaWdodCI7czo0OiIyN3B4IjtzOjEyOiJhdHBfaDJfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjE4OiJhdHBfaDJfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDNfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDNfZmFjZSI7czoxMToiQ3JldGUgUm91bmQiO3M6MTE6ImF0cF9oM19zaXplIjtzOjQ6IjIwcHgiO3M6MTc6ImF0cF9oM19saW5laGVpZ2h0IjtzOjQ6IjIzcHgiO3M6MTI6ImF0cF9oM19zdHlsZSI7czo2OiJub3JtYWwiO3M6MTg6ImF0cF9oM19mb250dmFyaWFudCI7czowOiIiO3M6MTI6ImF0cF9oNF9jb2xvciI7czowOiIiO3M6MTE6ImF0cF9oNF9mYWNlIjtzOjExOiJDcmV0ZSBSb3VuZCI7czoxMToiYXRwX2g0X3NpemUiO3M6NDoiMThweCI7czoxNzoiYXRwX2g0X2xpbmVoZWlnaHQiO3M6NDoiMjBweCI7czoxMjoiYXRwX2g0X3N0eWxlIjtzOjY6Im5vcm1hbCI7czoxODoiYXRwX2g0X2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMjoiYXRwX2g1X2NvbG9yIjtzOjA6IiI7czoxMToiYXRwX2g1X2ZhY2UiO3M6MTE6IkNyZXRlIFJvdW5kIjtzOjExOiJhdHBfaDVfc2l6ZSI7czo0OiIxNHB4IjtzOjE3OiJhdHBfaDVfbGluZWhlaWdodCI7czo0OiIxN3B4IjtzOjEyOiJhdHBfaDVfc3R5bGUiO3M6Njoibm9ybWFsIjtzOjE4OiJhdHBfaDVfZm9udHZhcmlhbnQiO3M6MDoiIjtzOjEyOiJhdHBfaDZfY29sb3IiO3M6MDoiIjtzOjExOiJhdHBfaDZfZmFjZSI7czoxMToiQ3JldGUgUm91bmQiO3M6MTE6ImF0cF9oNl9zaXplIjtzOjQ6IjEycHgiO3M6MTc6ImF0cF9oNl9saW5laGVpZ2h0IjtzOjQ6IjE0cHgiO3M6MTI6ImF0cF9oNl9zdHlsZSI7czo2OiJub3JtYWwiO3M6MTg6ImF0cF9oNl9mb250dmFyaWFudCI7czowOiIiO3M6MjA6ImF0cF9lbnRyeXRpdGxlX2NvbG9yIjtzOjA6IiI7czoxOToiYXRwX2VudHJ5dGl0bGVfZmFjZSI7czowOiIiO3M6MTk6ImF0cF9lbnRyeXRpdGxlX3NpemUiO3M6NDoiMThweCI7czoyNToiYXRwX2VudHJ5dGl0bGVfbGluZWhlaWdodCI7czo0OiIyNHB4IjtzOjIwOiJhdHBfZW50cnl0aXRsZV9zdHlsZSI7czo2OiJub3JtYWwiO3M6MjY6ImF0cF9lbnRyeXRpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoyMjoiYXRwX3NpZGViYXJ0aXRsZV9jb2xvciI7czowOiIiO3M6MjE6ImF0cF9zaWRlYmFydGl0bGVfZmFjZSI7czowOiIiO3M6MjE6ImF0cF9zaWRlYmFydGl0bGVfc2l6ZSI7czowOiIiO3M6Mjc6ImF0cF9zaWRlYmFydGl0bGVfbGluZWhlaWdodCI7czo0OiIxNnB4IjtzOjIyOiJhdHBfc2lkZWJhcnRpdGxlX3N0eWxlIjtzOjY6Im5vcm1hbCI7czoyODoiYXRwX3NpZGViYXJ0aXRsZV9mb250dmFyaWFudCI7czowOiIiO3M6MjQ6ImF0cF9mcHdpZGdldF90aXRsZV9jb2xvciI7czowOiIiO3M6MjM6ImF0cF9mcHdpZGdldF90aXRsZV9mYWNlIjtzOjc6IkJhbmdlcnMiO3M6MjM6ImF0cF9mcHdpZGdldF90aXRsZV9zaXplIjtzOjQ6IjI3cHgiO3M6Mjk6ImF0cF9mcHdpZGdldF90aXRsZV9saW5laGVpZ2h0IjtzOjA6IiI7czoyNDoiYXRwX2Zwd2lkZ2V0X3RpdGxlX3N0eWxlIjtzOjA6IiI7czozMDoiYXRwX2Zwd2lkZ2V0X3RpdGxlX2ZvbnR2YXJpYW50IjtzOjA6IiI7czoxMjoiYXRwX2V4dHJhY3NzIjtzOjA6IiI7czoxNjoiYXRwX3NsaWRlcnZpc2JsZSI7czoyOiJvbiI7czoxMDoiYXRwX3NsaWRlciI7czoxMToiY3ljbGVzbGlkZXIiO3M6MTk6ImF0cF9jeWNsZXNsaWRlbGltaXQiO3M6MToiMyI7czoxMjoiYXRwX3ZpZGVvX2lkIjtzOjEzOToiPGlmcmFtZSB3aWR0aD0iMTAyMCIgaGVpZ2h0PSI0MDAiIHNyYz0iaHR0cDovL3d3dy55b3V0dWJlLmNvbS9lbWJlZC9HZ1I2ZHl6a0tIST93bW9kZT10cmFuc3BhcmVudCIgZnJhbWVib3JkZXI9IjAiIHdtb2RlPSJPcGFxdWUiPjwvaWZyYW1lPiI7czoyMzoiYXRwX3N0YXRpY19pbWFnZV91cGxvYWQiO3M6NjA6Imh0dHA6Ly93d3cuYWl2YWh0aGVtZXMuY29tL3ZpY3RvcmlhL2ZpbGVzLzIwMTMvMDEvc3RhdGljLnBuZyI7czoxNToiYXRwX3N0YXRpY19saW5rIjtzOjE6IiMiO3M6MjA6ImF0cF9jb21tZW50c3RlbXBsYXRlIjtzOjU6InBvc3RzIjtzOjEzOiJhdHBfYmxvZ2FjYXRzIjthOjE6e2k6MDtzOjE6IjEiO31zOjE3OiJhdHBfcHNkX2ltZ2hlaWdodCI7czowOiIiO3M6MTc6ImF0cF9wczFfaW1naGVpZ2h0IjtzOjA6IiI7czoxNzoiYXRwX3BzMl9pbWdoZWlnaHQiO3M6MDoiIjtzOjE3OiJhdHBfcHMzX2ltZ2hlaWdodCI7czowOiIiO3M6MTc6ImF0cF9jdXN0b21zaWRlYmFyIjthOjI6e2k6MDtzOjEwOiJjdXN0b21ob21lIjtpOjE7czoxMDoibmV3c2lkZWJhciI7fXM6MjI6ImF0cF90ZWFzZXJfZm9vdGVyX3RleHQiO3M6MTA4OiI8aDMgYWxpZ249ImNlbnRlciI+Rm9vdGVyIFRlYXNlciBBcmVhIDogQ3VzdG9tIEhUTUwgYW5kIFRleHQgdGhhdCB3aWxsIGFwcGVhciBhYm92ZSB0aGUgc2lkZWJhciBmb290ZXIuPC9oMz4iO3M6MjE6ImF0cF9mb290ZXJ3aWRnZXRjb3VudCI7czoxOiI0IjtzOjE5OiJhdHBfZ29vZ2xlYW5hbHl0aWNzIjtzOjA6IiI7czoxMzoiYXRwX2NvcHlyaWdodCI7czo1NToiwqkgMjAxMC0yMDEzIC0gQWxsIFJpZ2h0cyBSZXNlcnZlZCAtVmljdG9yaWEgUmVzdGF1cmFudCI7czoyMDoic3lzX3NvY2lhbF9maWxlX2ljb24iO3M6MTQ6InlvdXR1YmVfMTYucG5nIjtzOjE5OiJhdHBfc29jaWFsX2Jvb2ttYXJrIjtzOjE0MToiVHdpdHRlciN8dHdpdHRlcl8xNi5wbmcjfCMjO0ZhY2Vib29rI3xmYWNlYm9va18xNi5wbmcjfCMjO1JTUyN8cnNzXzE2LnBuZyN8IyM7U3R1bWJsZSBVcG9uI3xzdHVtYmxldXBvbl8xNi5wbmcjfCMjO1lvdXR1YmUjfHlvdXR1YmVfMTYucG5nI3wjIjtzOjE4OiJhdHBfcG9zdHNpbmdsZXBhZ2UiO3M6MDoiIjtzOjE1OiJhdHBfZXJyb3I0MDR0eHQiO3M6MzI6Ik9vcHMhIEJyb3dzZSB0aHJvdWdoIHRoZSBzaXRlbWFwIjtzOjExOiJhdHBfbmFtZXR4dCI7czo0OiJObWVzIjtzOjEyOiJhdHBfZW1haWx0eHQiO3M6MDoiIjtzOjEyOiJhdHBfcGhvbmV0eHQiO3M6MDoiIjtzOjEyOiJhdHBfbm90ZXN0eHQiO3M6MDoiIjtzOjEzOiJhdHBfcGVvcGxldHh0IjtzOjA6IiI7czoxMToiYXRwX3RpbWV0eHQiO3M6MDoiIjtzOjE2OiJhdHBfY2xvc2VkbXNndHh0IjtzOjA6IiI7czoxMzoiYXRwX2Nsb3NlZHR4dCI7czowOiIiO3M6MTM6ImF0cF9zdW5kYXl0eHQiO3M6NjoiU3VuZGF5IjtzOjEzOiJhdHBfbW9uZGF5dHh0IjtzOjY6Ik1vbmRheSI7czoxNDoiYXRwX3R1ZXNkYXl0eHQiO3M6NzoiVHVlc2RheSI7czoxNjoiYXRwX3dlZG5lc2RheXR4dCI7czo5OiJXZWRuZXNkYXkiO3M6MTU6ImF0cF90aHVyc2RheXR4dCI7czo4OiJUaHVyc2RheSI7czoxMzoiYXRwX2ZyaWRheXR4dCI7czo2OiJGcmlkYXkiO3M6MTU6ImF0cF9zYXR1cmRheXR4dCI7czo4OiJTYXR1cmRheSI7czoxODoiYXRwX3N1bmRheV9vcGVuaW5nIjtzOjU6IjExOjAwIjtzOjE4OiJhdHBfc3VuZGF5X2Nsb3NpbmciO3M6NToiMjE6MzAiO3M6MTY6ImF0cF9zdW5kYXlfY2xvc2UiO3M6Mjoib24iO3M6MTg6ImF0cF9tb25kYXlfb3BlbmluZyI7czo1OiIwOTowMCI7czoxODoiYXRwX21vbmRheV9jbG9zaW5nIjtzOjU6IjIxOjQ1IjtzOjE5OiJhdHBfdHVlc2RheV9vcGVuaW5nIjtzOjU6IjA5OjAwIjtzOjE5OiJhdHBfdHVlc2RheV9jbG9zaW5nIjtzOjU6IjIxOjQ1IjtzOjIxOiJhdHBfd2VkbmVzZGF5X29wZW5pbmciO3M6NToiMDk6MDAiO3M6MjE6ImF0cF93ZWRuZXNkYXlfY2xvc2luZyI7czo1OiIyMjoxNSI7czoyMDoiYXRwX3RodXJzZGF5X29wZW5pbmciO3M6NToiMDk6MDAiO3M6MjA6ImF0cF90aHVyc2RheV9jbG9zaW5nIjtzOjU6IjIyOjMwIjtzOjE4OiJhdHBfZnJpZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MTg6ImF0cF9mcmlkYXlfY2xvc2luZyI7czo1OiIwMDowMCI7czoyMDoiYXRwX3NhdHVyZGF5X29wZW5pbmciO3M6NToiMTA6MDAiO3M6MjA6ImF0cF9zYXR1cmRheV9jbG9zaW5nIjtzOjU6IjAwOjAwIjtzOjIwOiJhdHBfcmVzZXJ2YXRpb25lbWFpbCI7czoyNToic3Jpbml2YXMubmFnaWRpQGdtYWlsLmNvbSI7czoyMDoiYXRwX25vdGlmaWNhdGlvbl9tc2ciO3M6MjUyOiJEZWFyIEFkbWluDQoNCk5hbWUgIFtjb250YWN0X25hbWVdDQpFbWFpbDpbY29udGFjdF9lbWFpbF0NClBob25lOltjb250YWN0X3Bob25lXQ0KDQpZb3UgSGF2ZSAgYSBCb29raW5nIHJlc2VydmF0aW9uIGF0IFtyZXN0YXVyYW50X25hbWVdIGZvciBbbnVtYmVyX29mX3Blb3BsZV0gcGVvcGxlIGF0IFtyZXNlcnZhdGlvbl90aW1lXSBvbiBbcmVzZXJ2YXRpb25fZGF0ZV0uIA0KDQpDbGllbnRzIE1lc3NhZ2UgOiBbcmVzZXJ2YXRpb25fbm90ZV0iO3M6MjQ6ImF0cF9ib29raW5nX3RoYW5reW91X21zZyI7czo4NzoiVGhhbmsgeW91ISBZb3VyIFJlc2VydmF0aW9uIGhhcyBib29rZWQgYW5kIHlvdSB3aWxsIGJlIGNvbnRhY3RlZCBzb29uIGZvciBjb25maXJtYXRpb24uIjtzOjE4OiJhdHBfY29uZmlybXN1YmplY3QiO3M6NTE6IltyZXN0YXVyYW50X25hbWVdIDogQm9va2luZyBSZXF1ZXN0IElEIFtib29raW5nX2lkXSI7czoxMToiYXRwX2NvbmZpcm0iO3M6Mjc0OiJEZWFyIFtjb250YWN0X25hbWVdDQpUaGFuayB5b3UgZm9yIHlvdXIgcmVzZXJ2YXRpb24gYXQgW3Jlc3RhdXJhbnRfbmFtZV0gZm9yIFtudW1iZXJfb2ZfcGVvcGxlXSBwZW9wbGUgYXQgW3Jlc2VydmF0aW9uX3RpbWVdIG9uIFtyZXNlcnZhdGlvbl9kYXRlXS4gDQoNCllvdXIgY29uZmlybWF0aW9uIGZvciByZXNlcnZhdGlvbiB3aWxsIGJlIGRvbmUgb24gcGhvbmUgdmlhIG91ciBzdGFmZiBzb29uLg0KDQpTaW5jZXJlbHksDQpUaGUgU3RhZmYgYXQgW3Jlc3RhdXJhbnRfbmFtZV0uIjtzOjE3OiJhdHBfc3RhdHVzc3ViamVjdCI7czo1ODoiW3Jlc3RhdXJhbnRfbmFtZV0gOiBCb29raW5nIElEIFtib29raW5nX2lkXSBTdGF0dXMgQ2hhbmdlZCI7czoxMDoiYXRwX3N0YXR1cyI7czozMTc6IkRlYXIgW2NvbnRhY3RfbmFtZV0sIA0KDQpUaGlzIGlzIGEgY291cnRlc3kgZS1tYWlsIHRvIGluZm9ybSB5b3UgdGhhdCB0aGUgc3RhdHVzIG9mIHlvdXIgcmVzZXJ2YXRpb24gYXQgW3Jlc3RhdXJhbnRfbmFtZV0gZm9yIFtudW1iZXJfb2ZfcGVvcGxlXSBwZW9wbGUgYXQgW3Jlc2VydmF0aW9uX3RpbWVdIG9uIFtyZXNlcnZhdGlvbl9kYXRlXSBoYXMgYmVlbiB1cGRhdGVkLg0KDQpUaGUgbmV3IHJlc2VydmF0aW9uIHN0YXR1cyBpcyAiW3Jlc2VydmF0aW9uX3N0YXR1c10iLg0KDQpTaW5jZXJlbHksDQpUaGUgU3RhZmYgYXQgW3Jlc3RhdXJhbnRfbmFtZV0uIjtzOjE5OiJhdHBfcmVzZXJ2YXRpb25wYWdlIjtzOjI6IjE1IjtzOjIyOiJhdHBfcmVzZXJ2YXRpb25mb3JtdHh0IjtzOjE4OiJNYWtlIGEgUmVzZXJ2YXRpb24iO3M6MTI6ImF0cF9maXJzdGRheSI7czoxOiIwIjtzOjE0OiJhdHBfdGltZWZvcm1hdCI7czoyOiIxMiI7czoxMzoiYXRwX21lbnVvcmRlciI7czoxMzoiZGlzcGxheV9vcmRlciI7czoyNjoiYXRwX3RlbXBsYXRlX29wdGlvbl92YWx1ZXMiO3M6MDoiIjt9';

	//add default values for the theme options
	add_option( 'atp_default_template_option_values', $default_option_values, '', 'yes' );
	atp_options();
	update_option_values($options,unserialize(base64_decode($default_option_values)));   
	}
	
	/***
	 * LOAD TEXT DOMAIN / Theme localization
	 */
	function themetextdomain()
	{
		$lang_dir = get_template_directory() . '/languages';  
		echo $lang_dir;
		load_theme_textdomain( 'THEME_FRONT_SITE', $lang_dir );
	} 
	add_action( 'after_theme_setup', 'themetextdomain' );

?>