<?php

	/**
	 * F O O D   M E N U
	 */

	function menutype_menuspecial ($atts, $content = null,$code) {
	
		global $wp_filter, $post, $wpdb, $wp_query, $permalink ,$post_title , $post_date;

		//variables
		$nopage_str = __('Sorry but we could not find what you were looking for. But don\'\t give up, keep at it','THEME_FRONT_SITE');
		$hover_class = ''; //stores class name of the postlink based on postlinktype(image/video/link)

		$the_content_filter= $wp_filter['the_content'];
		extract(shortcode_atts(array(
			'cats'		=> '',
			'limit'	    => '1000',
			'title'		=> '',
			'titlelink'	=> 'true',
			'pagination'=> '',
			'charlimits'=> '50',
			'columns'	=> '',
			'desc'		=> '',
			'thumb'		=> 'true'
		), $atts));

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$query = array(
				'post_type'			=> 'menus', 
				'posts_per_page'	=> $limit, 
				'taxonomy'			=> 'menutype', 
				'term'				=> $cats, 
				'paged'				=> $paged,
				'order'				=> 'DESC'
		);

		query_posts($query); //get the results
		
		if($columns === 'true') {
			$columns = 'twocolumn';
		}
		else {
			$columns = '';
		}

		//if have posts, loop through posts
		$out = '<div class="menulist_sc '.$columns.'">';
		if(have_posts()) : while(have_posts()) : the_post(); 

	
			$post_title = get_the_title(get_the_id());
			$permalink = get_permalink(get_the_id());
			$menu_desc=get_post_meta($post->ID,'item_desc',TRUE);
			$out .= '<section class="menus menulist">';
			$out .= '<div class="menuthumb">';
			if (has_post_thumbnail()) {
				$width = $height = '80';
				$fullimg=get_post_meta($post->ID,'fullimg',TRUE);
				if($thumb == "true"){
					$out .= '<div class="menuimg" style="width:80px; height:80px;">';
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full', false, '' );
					$img_src= ($fullimg!='') ? $fullimg :$src['0'];
					$out .= '<a href="'.$img_src.'" class="lightbox" rel="prettyPhoto[mixed]">';
					$out .= atp_resize($post->ID,'',$width,$height,'','');
					$out .= '</a>';
					$out .= '</div>';
				}
			}
			if(get_post_meta($post->ID,'price',TRUE)) {
				$out.='<span class="pricenew">'.get_post_meta($post->ID,'price',TRUE).'</span>';
			}
			$out .= '</div>';
			$out.='<div class="menu-info">';
			if($title == "true") {
				$out .= '<h4 class="menu-title">';
				if($titlelink == "true") {
					$out .= '<a href="' .$permalink. '">'. $post_title. '</a>';
				}else {
					$out .= $post_title;
				}
				$out.='</h4>';
			}
			if($desc=="true"){
				if($menu_desc !=""){	
					$out .= wpautop(substr($menu_desc,0,$charlimits));
				}else{
					$out .= wp_html_excerpt(get_the_excerpt(''),$charlimits);
				}
			}
			$out.= '</div>';
			ob_start();
			if(function_exists('the_ratings')) {   $out.=the_ratings(); }
			$out .= ob_get_contents();
			ob_end_clean();
			$out .= '</section>';
		endwhile;
		else :
		$out .= '<h2>'.$nopage_str.'</h2>';
		endif; 

		$out .= '</div>';
		$out .= '<div class="clear"></div>';
		if( $pagination == "true" ){
			$out .= atpmenutypepagination(); 
		} 
		wp_reset_query();
		$wp_filter['the_content'] = $the_content_filter;

		return $out;

	}

	add_shortcode('foodmenu','menutype_menuspecial'); //add shortcode

	/**
	 * Multiple taxonomies
	 */
	function multi_tax_terms($where) {
		global $wp_query, $wpdb;

		if (isset($wp_query->query_vars['term']) && (strpos($wp_query->query_vars['term'], ',') !== false && strpos($where, "AND 0") !== false)) {
			//Get the terms
			$term_arr = explode(",", $wp_query->query_vars['term']);
			foreach ($term_arr as $term_item) {
				$terms[] = get_terms($wp_query->query_vars['taxonomy'], array(
					'slug' => $term_item
				));
			} //$term_arr as $term_item
				
			//Get the id of posts with that term in that taxonomy
			foreach ($terms as $term) {
				$term_ids[] = $term[0]->term_id;
			} //$terms as $term
			
			$post_ids = get_objects_in_term($term_ids, $wp_query->query_vars['taxonomy']);
			
			if (!is_wp_error($post_ids) && count($post_ids)) {
				// Build the new query
				$new_where = " AND $wpdb->posts.ID IN (" . implode(', ', $post_ids) . ") ";
				$where     = str_replace("AND 0", $new_where, $where);
			}else {
			}
		} //$wp_query
		return $where;
	}

	add_filter("posts_where", "multi_tax_terms");
?>