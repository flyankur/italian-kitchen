<?php
$prefix = 'pf_';
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_template_directory_uri() . '/js/upload.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
?>
<?php
add_action( 'add_meta_boxes', 'de_meta_box_add' );
function de_meta_box_add(){	
	// project
	add_meta_box( 'my-meta-box-id-2', 'Menu', 'menu_meta', 'menu', 'normal', 'high' );
	// gallery
	//add_meta_box( 'gallery-meta-box', 'Pictures', 'add_pictures_gallery', 'gallery', 'normal', 'high' );
	// slider
	add_meta_box( 'my-meta-box-id-3', 'Slider Picture', 'add_pictures_slider', 'slider', 'normal', 'high' );
	// page
	add_meta_box( 'my-meta-box-id-4', 'Custom Page Background', 'add_background', 'page', 'normal', 'high' );
	// post
	add_meta_box( 'my-meta-box-id-5', 'Custom Page Background', 'add_background', 'post', 'normal', 'high' );

	// blog meta
	// ==================================================
	//add_meta_box( 'blog-meta-quote', 'Quote Setting', 'add_quote', 'post', 'normal', 'high' );
	//add_meta_box( 'blog-meta-video', 'Video Setting', 'add_video_meta', 'post', 'normal', 'high' );
	//add_meta_box( 'blog-meta-link', 'Link Setting', 'add_link_meta', 'post', 'normal', 'high' );
	//add_meta_box( 'blog-meta-audio', 'Audio Setting', 'add_audio_meta', 'post', 'normal', 'high' );
}
?>
<?php
function menu_meta( $post ){
	$values = get_post_custom( $post->ID );
	
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	$price = isset( $values['price'] ) ? esc_attr( $values['price'][0] ) : '';
	// ==========
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
      <table>
        <tr>
          <th>
            <div class="title">Price</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="price" id="price" value="<?php echo $price; ?>" />
          </td>
          </tr>
      </table> 
	  <?php if($main_pic!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $main_pic; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
    <!--
    <div class="upload-pic">
    	<?php if($pic_1!=''):?><div class="display-pic"><img src="<?php echo $pic_1; ?>" width="100px;" /></div> <?php endif; ?>
    	<label class="label" for="pic_1">Picture 1</label>
		<input class="text" type="text" name="pic_1" id="pic_1" value="<?php echo $pic_1; ?>" />
        <input class="button" type="button" value="browse" id="upload_1" />
	</div>
    <div class="upload-pic">
    	<?php if($pic_2!=''):?><div class="display-pic"><img src="<?php echo $pic_2; ?>" width="100px;" /></div> <?php endif; ?>
    	<label class="label" for="pic_2">Picture 2</label>
		<input class="text" type="text" name="pic_2" id="pic_2" value="<?php echo $pic_2; ?>" />
        <input class="button" type="button" value="browse" id="upload_2" />
	</div>
    <div class="upload-pic">
    	<?php if($pic_3!=''):?><div class="display-pic"><img src="<?php echo $pic_3; ?>" width="100px;" /></div> <?php endif; ?>
    	<label class="label" for="pic_3">Picture 3</label>
		<input class="text" type="text" name="pic_3" id="pic_3" value="<?php echo $pic_3; ?>" />
        <input class="button" type="button" value="browse" id="upload_3" />
	</div>
    <div class="upload-pic">
    	<?php if($pic_4!=''):?><div class="display-pic"><img src="<?php echo $pic_4; ?>" width="100px;" /></div> <?php endif; ?>
    	<label class="label" for="pic_4">Picture 4</label>
		<input class="text" type="text" name="pic_4" id="pic_4" value="<?php echo $pic_4; ?>" />
        <input class="button" type="button" value="browse" id="upload_4" />
	</div>
    <div class="upload-pic">
    	<?php if($pic_5!=''):?><div class="display-pic"><img src="<?php echo $pic_5; ?>" width="100px;" /></div> <?php endif; ?>
    	<label class="label" for="pic_5">Picture 5</label>
		<input class="text" type="text" name="pic_5" id="pic_5" value="<?php echo $pic_5; ?>" />
        <input class="button" type="button" value="browse" id="upload_5" />
	</div>
    -->
	<?php	}
function add_picture( $post ){
		$values = get_post_custom( $post->ID );
	
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="upload-pic main">
    <?php if($main_pic!=''):?><div class="display-pic"><img src="<?php echo $main_pic; ?>" width="100px;" /></div> 
	<?php endif; ?>    	
    <label class="label" for="main_pic">Main picture</label>
		<input class="text" type="text" name="main_pic" id="main_pic" value="<?php echo $main_pic; ?>" />
        <input class="button" type="button" value="browse" id="upload_main" />
        <span class="info-text">Image size must be <strong>600 x 600px</strong></span>
	</div>
<?php }
function add_options( $post ){
	$values = get_post_custom( $post->ID );
	
	$project_url = isset( $values['project_url'] ) ? esc_attr( $values['project_url'][0] ) : '';
	
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    
    <div class="wrap-content">
    	<label class="label" for="project_url">Project URL</label>
		<input class="text" type="text" name="project_url" id="project_url" value="<?php echo $project_url; ?>" />
        <span class="info-text">Enter project url or leave it blank (use "http://")</strong></span>
    </div>
	<?php	}
function add_video( $post ){
	$values = get_post_custom( $post->ID );
	
	$extra_url = isset( $values['extra_url'] ) ? esc_attr( $values['extra_url'][0] ) : '';
	
	$text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
	$selected = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	$check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
<div class="wrap-content">
    	<label class="label" for="project_url">Video URL</label>
		<input class="text" type="text" name="extra_url" id="extra_url" value="<?php echo $extra_url; ?>" />
        <span class="info-text">Enter Youtube / Vimeo video url (use "http://")</strong></span>
    </div>
	<?php	}
add_action( 'save_post', 'de_meta_box_save' );
function de_meta_box_save( $post_id )
{
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	if( !current_user_can( 'edit_post' ) ) return;
	$allowed = array( 
		'a' => array( 
			'href' => array() 
		)
	);
	
	if( isset( $_POST['my_meta_box_text'] ) )
		update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
	if( isset( $_POST['main_pic'] ) )
		update_post_meta( $post_id, 'main_pic', wp_kses( $_POST['main_pic'], $allowed ) );	
	if( isset( $_POST['pic_1'] ) )
		update_post_meta( $post_id, 'pic_1', wp_kses( $_POST['pic_1'], $allowed ) );
	if( isset( $_POST['pic_2'] ) )
		update_post_meta( $post_id, 'pic_2', wp_kses( $_POST['pic_2'], $allowed ) );
	if( isset( $_POST['pic_3'] ) )
		update_post_meta( $post_id, 'pic_3', wp_kses( $_POST['pic_3'], $allowed ) );
	if( isset( $_POST['pic_4'] ) )
		update_post_meta( $post_id, 'pic_4', wp_kses( $_POST['pic_4'], $allowed ) );
	if( isset( $_POST['pic_5'] ) )
		update_post_meta( $post_id, 'pic_5', wp_kses( $_POST['pic_5'], $allowed ) );
	if( isset( $_POST['thumbnail'] ) )
		update_post_meta( $post_id, 'thumbnail', wp_kses( $_POST['thumbnail'], $allowed ) );
	if( isset( $_POST['bg_image'] ) )
		update_post_meta( $post_id, 'bg_image', wp_kses( $_POST['bg_image'], $allowed ) );	
	
	if( isset( $_POST['url'] ) )
		update_post_meta( $post_id, 'url', wp_kses( $_POST['url'], $allowed ) );
	
	if( isset( $_POST['project_url'] ) )
		update_post_meta( $post_id, 'project_url', wp_kses( $_POST['project_url'], $allowed ) );
	
	if( isset( $_POST['extra_url'] ) )
		update_post_meta( $post_id, 'extra_url', wp_kses( $_POST['extra_url'], $allowed ) );
		
	if( isset( $_POST['quote'] ) )
		update_post_meta( $post_id, 'quote', wp_kses( $_POST['quote'], $allowed ) );
		
	if( isset( $_POST['price'] ) )
		update_post_meta( $post_id, 'price', wp_kses( $_POST['price'], $allowed ) );
		
	
	if( isset( $_POST['video'] ) )
		update_post_meta( $post_id, 'video', wp_kses( $_POST['video'], $allowed ) );
	
	if( isset( $_POST['audio_meta_mp3'] ) )
		update_post_meta( $post_id, 'audio_meta_mp3', wp_kses( $_POST['audio_meta_mp3'], $allowed ) );

	if( isset( $_POST['audio_meta_ogg'] ) )
		update_post_meta( $post_id, 'audio_meta_ogg', wp_kses( $_POST['audio_meta_ogg'], $allowed ) );
		
	if( isset( $_POST['link_meta'] ) )
		update_post_meta( $post_id, 'link_meta', wp_kses( $_POST['link_meta'], $allowed ) );
			
	if( isset( $_POST['my_select_1'] ) )
		update_post_meta( $post_id, 'my_select_1', esc_attr( $_POST['my_select_1'] ) );
		
		
		
	$chk = ( isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_check'] ) ? 'on' : 'off';
	update_post_meta( $post_id, 'my_meta_box_check', $chk );
}
?>
<?php // GALLERY METABOX
function add_pictures_gallery( $post ){
	$values = get_post_custom( $post->ID );
	$main_pic = isset( $values['main_pic'] ) ? esc_attr( $values['main_pic'][0] ) : '';
	$thumbnail = isset( $values['thumbnail'] ) ? esc_attr( $values['thumbnail'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
      <table>
        <tr>
          <th>
            <div class="title">Main picture</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="main_pic" id="main_pic" value="<?php echo $main_pic; ?>" />
          <input class="button" type="button" value="browse" id="upload_main" />
          </td>
          </tr>
      </table> 
      <div class="separator"></div>
       <table>
        <tr>
          <th>
            <div class="title">Thumbnail</div>
            <div class="info-text">Image size (300 x 225 px)</div>
          </th>
          <td><input class="text" type="text" name="thumbnail" id="thumbnail" value="<?php echo $thumbnail; ?>" />
          <input class="button" type="button" value="browse" id="btn_thumbnail" />
          </td>
          </tr>
      </table>          
	  <?php if($main_pic!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $main_pic; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
	<?php } ?>
<?php // ========== SLIDER METABOX ==========
function add_pictures_slider( $post ){
	$values = get_post_custom( $post->ID );
	$pic_1 = isset( $values['pic_1'] ) ? esc_attr( $values['pic_1'][0] ) : '';
	$url = isset( $values['url'] ) ? esc_attr( $values['url'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
      <table>
        <tr>
          <th>
            <div class="title">Main picture</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="pic_1" id="pic_1" value="<?php echo $pic_1; ?>" />
          <input class="button" type="button" value="browse" id="upload_1" />
          </td>
          </tr>
          
          <tr>
          <th>
            <div class="title">Click URL</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="url" id="url" value="<?php echo $url; ?>" />
          </td>
          </tr>
       		
      </table>          
	  <?php if($pic_1!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $pic_1; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
	<?php } ?>
<?php // ========== custom page/post background ==========
function add_background( $post ){
	$values = get_post_custom( $post->ID );
	$bg_image = isset( $values['bg_image'] ) ? esc_attr( $values['bg_image'][0] ) : '';
	$my_select_1 = isset( $values['my_select_1'] ) ? esc_attr( $values['my_select_1'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
    <div class="wrap-content">
    <table>
        <tr>
          <th>
            <div class="title">Select Sidebar</div>
            <div class="info-text">This option only work for page template with sidebar</div>
          </th>
          <td><select class="select" type="text" name="my_select_1" id="my_select_1"/>
          			<option <?php if($my_select_1=='None'){?>selected="selected"<?php } ?>>None</option>
                    <option <?php if($my_select_1=='Sidebar One'){?>selected="selected"<?php } ?>>Sidebar One</option>
                    <option <?php if($my_select_1=='Sidebar Two'){?>selected="selected"<?php } ?>>Sidebar Two</option>
                    <option <?php if($my_select_1=='Sidebar Three'){?>selected="selected"<?php } ?>>Sidebar Three</option>
                    <option <?php if($my_select_1=='Sidebar Four'){?>selected="selected"<?php } ?>>Sidebar Four</option>
                    <option <?php if($my_select_1=='Sidebar Five'){?>selected="selected"<?php } ?>>Sidebar Five</option>
                </select>
          </td>
          
          </tr>
      </table>   
    	<div class="separator"></div>
      <table>
        <tr>
          <th>
            <div class="title">Select Picture</div>
            <div class="info-text"></div>
          </th>
          <td><input class="text" type="text" name="bg_image" id="bg_image" value="<?php echo $bg_image; ?>" />
          <input class="button" type="button" value="browse" id="upload_bg_image" />
          </td>
          </tr>
      </table>      
      
            
	  <?php if($bg_image!=''):?><div class="separator"></div><div class="display-pic"><img src="<?php echo $bg_image; ?>" class="preview_big" /></div> 
	<?php endif; ?>    	
	</div>
	<?php } ?>