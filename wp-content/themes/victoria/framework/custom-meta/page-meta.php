<?php

	// P A G E   M E T A B O X 
	//--------------------------------------------------------
	$prefix = '';
	$meta_box = array();
	global $atp_ribbons;

	// Defines custom sidebar widget based on custom option
	$sidebarwidget = get_option('atp_customsidebar');
	/**
	 * Retrieve Post Categories.
	 */
	$cats_array = get_categories('hide_empty=0');
	$dynamic_cats = array();
	foreach ($cats_array as $categs) {
		$dynamic_cats[$categs->cat_ID] = $categs->cat_name;
		$cats_ids[] = $categs->cat_ID;
	}

	/**
	 * Retrieve Taxonomy Tags.
	 */
	$tags = get_tags( array( 'taxonomy' => 'post_tag' ));
	$dynamic_tags = array();
	foreach ($tags as $listarray) {
		$dynamic_tags[$listarray->slug] = $listarray->slug;
	}

	/**
	 * Retrieve Taxonomy Categories.
	 */
	$menulistarray = get_terms('menutype','orderby=name&hide_empty=0');
	$dynamic_list = array();
	if(is_array($menulistarray)) {
		foreach ($menulistarray as $listmenu) {
			$dynamic_list[$listmenu->slug] = $listmenu->name;
			$listmenu_ids[] = $listmenu->slug;
		}
	}

	$meta_box['page'] = array(
		'id'		=> 'page-meta-box',
		'title'		=> THEMENAME.'&nbsp;Page Options',
		'context'	=> 'normal',
		'priority'	=> 'core',
		'fields'	=> array(
			// C U S T O M   S U B H E A D E R   T E A S E R 
			//--------------------------------------------------------
			array(
				'name'	=> __('Subheader Options','ATP_ADMIN_SITE'),
				'desc'	=> __('Select the Teaser type mode you want to display in subheader of the this Post','ATP_ADMIN_SITE'),
				'id'	=> $prefix . 'subheader_teaser_options',
				'std'	=> '',
				'type'	=> 'select',
				'options'=> array(
							'default'	=> 'Default ( Options Panel )',
							'twitter'	=> 'Twitter', 	
							'custom'	=> 'Custom', 
							'customhtml'	=> 'Custom Html',
							'disable'	=> 'Disable')
			),
			// T E A S E R   T E X T 
			//--------------------------------------------------------
			array(
				'name'	=> __('Teaser Text','ATP_ADMIN_SITE'),
				'desc'	=> __('Type the text you wish to display in the subheader of this page/post. If you wish to use bold text then use strong element example &lt;strong&gt;bold text &lt;/strong&gt;','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'page_desc',
				'title'	=> 'Title &amp; Teaser Text',
				'class'	=> 'sub_teaser_option custom',
				'std'	=> '',
				'type'	=> 'textarea',
			),
			// C U S T O M   H T M L 
			//--------------------------------------------------------
			array(
				'name'	=> __('Custom HTML / Shortcode','ATP_ADMIN_SITE'),
				'desc'	=> __('Type any text or shortcode you wish to display in the subheader area. This field supports shortcode','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'custom_html',
				'title'	=> 'Custom Text / Shortcode',
				'class'	=> 'sub_teaser_option customhtml',
				'std'	=> '',
				'type'	=> 'textarea',
			),
			// P A G E   B A C K G R O U N D
			//--------------------------------------------------------
			array(
				'name'	=> __('Page Background','ATP_ADMIN_SITE'),
				'desc'	=> __('Upload the image for the page background','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'page_bg_image',
				'std'	=> '',
				'title'	=> 'Background Image',
				'type'	=> 'upload',
			),
			// S U B H E A D E R   C O L O R
			//--------------------------------------------------------
			array(
				'name'	=> __('Subheader Background','ATP_ADMIN_SITE'),
				'desc'	=> __('Choose the color for subheader background','ATP_ADMIN_SITE'),
				'id'	=> $prefix .'subheader_bg_color',
				'std'	=> '',
				'title'	=> 'Subheader Background',
				'type'	=> 'color',
			),
			// S U B H E A D E R   B A C K G R O U N D 
			//--------------------------------------------------------
			array(
				'name'	=> __('Subheader Image','ATP_ADMIN_SITE'),
				'desc'	=> __('Upload Subheader Image','ATP_ADMIN_SITE'),
				'id'	=> $prefix.'subheader_img',
				'type'	=> 'upload',
				'std' 	=> '',
				
			),
			// C U S T O M   S I D E B A R 
			//--------------------------------------------------------
			array(
				'name'	=> __('Custom Sidebar','ATP_ADMIN_SITE'),
				'desc'	=> __('Select the Sidebar you wish to assign for this page.','ATP_ADMIN_SITE'),
				'id'	=> $prefix . 'custom_widget',
				'type'	=> 'customselect',
				'std'	=> '',
				
				'options'=> $sidebarwidget
			),
			// L A Y O U T   O P T I O N S 
			//--------------------------------------------------------
			array(
				'name'	=> __('Layout Option','ATP_ADMIN_SITE'),
				'desc'	=> __('Select the Layout style you wish to use for this page, Left Sidebar or Right Sidebar or Full Width.','ATP_ADMIN_SITE'),
				'id'	=> $prefix . 'sidebar_options',
				'std'	=> 'rightsidebar',
				'type'	=> 'layout',
				'options'=> array(
						'rightsidebar'	=>  FRAMEWORK_URI . 'admin/images/right-sidebar.png', 
						'leftsidebar'	=>  FRAMEWORK_URI . 'admin/images/left-sidebar.png',
						'fullwidth'		=>  FRAMEWORK_URI . 'admin/images/fullwidth.png')	
			),
			// B R E A D C R U M B 
			//--------------------------------------------------------
			array(
				'name'	=> __('Breadcrumb','ATP_ADMIN_SITE'),
				'desc'	=> __('Check this if you wish to disable the breadcrumb for this page.','ATP_ADMIN_SITE'),
				'id'	=> $prefix.'breadcrumb',
				'std' 	=> '',
				'type'	=> 'checkbox',
			),
		)
	);
?>