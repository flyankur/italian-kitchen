<?php
	/*
	 * Add new taxonomy, NOT hierarchical (like tags)
	 * taxonomy = menutype
	 * object type = menus (Name of the object type for the taxonomy object)
	 */
	function menulist_register() {
		$args = array(
			'public'			=> true,
			'exclude_from_search'=> false,
			'labels'			=> array(
										'name'				=> _x('Food Menu', 'Food Menu','Food Menu'),
										'singular_name'		=> _x('Food Menu', 'post type singular name','Food Menu'),
										'add_new'			=> _x('Add Item','Add Item','Food Menu'),
										'add_new_item'		=> __('Add New Food Item','Foodmenu'),
										'edit_item'			=> __('Edit Food Item','Foodmenu'),
										'new_item'			=> __('New Menu Post Item','Foodmenu'),
										'view_item'			=> __('View Food Item','Foodmenu'),
										'search_items'		=> __('Search Food Items','Foodmenu'),
										'not_found'			=> __('Nothing found','Foodmenu'),
										'not_found_in_trash'=> __('Nothing found in Trash','Foodmenu'),
										'parent_item_colon'	=> ''),
			'show_ui'			=> true,
			'capability_type'	=> 'post',
			'hierarchical'		=> false,
			'rewrite'			=> array( 'with_front' => false ),
			'query_var'			=> false,	
			'menu_icon'			=> THEME_URI . '/framework/admin/images/food-icon.png',  		
			'supports'			=> array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes'),
			'taxonomies' => array('menutype', 'post_tag')
		); 
		register_post_type( 'menus' , $args );
	}
	
	/*
	 * Add new custom taxonomy, hierarchical (like tags)
	 * taxonomy = menutype
	 * object type = menus (Name of the object type for the taxonomy object)
	 */
		register_taxonomy('menutype','menus', array(
			'hierarchical'		=> true,
			'labels'			=> array(
										'add_new_item'		=> 'Add New Menu Type',
										'new_item_name'		=> 'New Menu Type Name',
										'edit_item'			=> 'Edit Menu Type'),
			'label'				=> 'Menu Types',
			'singular_label'	=> 'Menu Types',
			'show_ui'			=> true,
			'query_var'			=> true,
			'rewrite'			=> false,
			'sort' 				=> true,
			'args' 				=> array( 'orderby' => 'menu_order' ),
			'has_archive' => true,
			)
		);

		add_action('init', 'menulist_register');

		//add filter to ensure the  Food Item, is displayed when user updates a Food Item
		add_filter('post_updated_messages', 'menutype_updated_messages');
		function menutype_updated_messages( $messages ) {
		  global $post, $post_ID;

		  $messages['menus'] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => sprintf( __('Food Item Updated. <a href="%s">View Item</a>'), esc_url( get_permalink($post_ID) ) ),
			2 => __('Custom Field Updated.','atp_admin'),
			3 => __('Custom Field Deleted.','atp_admin'),
			4 => __('Food Item Updated.','atp_admin'),
			/* translators: %s: date and time of the revision */
			5 => isset($_GET['revision']) ? sprintf( __('Food Item restored to revision from %s','atp_admin'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( __('Food Item published. <a href="%s">View Food Item</a>'), esc_url( get_permalink($post_ID) ) ),
			7 => __('Food Item saved.','atp_admin'),
			8 => sprintf( __('Food Item submitted. <a target="_blank" href="%s">Preview Food Item</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( __('Food Item draft updated. <a target="_blank" href="%s">Preview Food Item</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		  );

		  return $messages;
		}

		function my_columns($columns) {
			$columns['menus'] = __('Menus','atp_admin');
			$columns['price'] = __('Price','atp_admin');
			$columns['thumbnail'] =  __('Post Image','atp_admin');
		
			return $columns;
		}

		function manage_menus_columns($name) {
			global $post;global $wp_query;

			switch ($name) {
			 case 'menus':
					   $terms = get_the_terms($post->ID, 'menutype');

				//If the terms array contains items... (dupe of core)
				if ( !empty($terms) ) {
					//Loop through terms
					foreach ( $terms as $term ){
						//Add tax name & link to an array
						$post_terms[] = esc_html(sanitize_term_field('name', $term->name, $term->term_id, '', 'edit'));
					}
					//Spit out the array as CSV
					echo implode( ', ', $post_terms );
				} else {
					//Text to show if no terms attached for post & tax
					echo '<em>No terms</em>';
				}
						break;
				case 'thumbnail':
				  
						echo the_post_thumbnail(array(100,100));
						break;
				 case 'price':
				  
						echo get_post_meta(get_the_ID(),'price',TRUE);
						break;
			   
			}
		}

		add_action('manage_posts_custom_column', 'manage_menus_columns', 10, 2);
		add_action('manage_edit-menus_columns', 'my_columns');
?>
<?php
//add extra fields to custom taxonomy edit form callback function
function extra_menutype_fields($tag) {
   //check for existing taxonomy meta for term ID
    $t_id = $tag->term_id;
    $term_meta = get_option( "taxonomy_$t_id");
?>
<div class="form-field">
<label for="tag-slug"><?php _e('Menutype Image URL','atp_admin'); ?></label>
<input type="text" name="term_meta[img]" id="term_meta[img]" value=""><br />
            <p><?php _e('Image for Menutype, use full url including http:// - It will be displayed on menu types page.','atp_admin'); ?></p>
        
</div>
<div class="form-field">
<label for="tag-slug"><?php _e('Display Order','atp_admin'); ?></label>
<input type="text" name="term_meta[display_order]" id="term_meta[display_order]" value=""><br />
            <p><?php _e('The order in which this menu is displayed','atp_admin'); ?></p>
        
</div>
<?php
}
//add extra fields to custom taxonomy edit form callback function
function edit_menutype_fields($tag) {
   //check for existing taxonomy meta for term ID
    $t_id = $tag->term_id;
    $term_meta = get_option("taxonomy_$t_id");

?>
<tr class="form-field">
<th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Menutype Image URL','atp_admin'); ?></label></th>
<td>
<input type="text" name="term_meta[img]" id="term_meta[img]" size="3" style="width:60%;" value="<?php echo $term_meta['img'] ? $term_meta['img'] : ''; ?>"><br />
            <span class="description"><?php _e('Image for Menutype, use full url including http:// - It will be displayed on menu types page.','atp_admin'); ?></span>
        </td>
</tr>
<tr class="form-field">
<th scope="row" valign="top"><label for="Display Order"><?php _e('Display Order','atp_admin'); ?></label></th>
<td>
<input type="text" name="term_meta[display_order]" id="term_meta[display_order]" size="3" style="width:60%;" value="<?php echo $term_meta['display_order'] ? $term_meta['display_order'] : ''; ?>"><br />
            <span class="description"><?php _e('The order in which this menu is displayed','atp_admin'); ?></span>
        </td>
</tr>
<?php
}

 
// save extra taxonomy fields callback function
function save_extra_taxonomy_fields( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $t_id = $term_id;
        $term_meta = get_option("taxonomy_$t_id");
        $cat_keys = array_keys($_POST['term_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['term_meta'][$key])){
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        //save the option array
        update_option("taxonomy_$t_id", $term_meta );
    }
}

add_action('menutype_edit_form_fields', 'edit_menutype_fields', 10, 2);
add_action('edited_menutype', 'save_extra_taxonomy_fields', 10, 2);
// this adds the fields
add_action('menutype_add_form_fields','extra_menutype_fields',10,2);
// this saves the fields
add_action('created_menutype','save_extra_taxonomy_fields', 10, 2);
?>