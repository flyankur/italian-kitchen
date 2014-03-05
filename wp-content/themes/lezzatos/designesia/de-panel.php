<?php
include "de-theme-options.php";

function mytheme_add_admin() {
global $themename, $shortname, $options;
if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
 
	 if ( isset($_POST['action']) && $_POST['action'] == 'save' ) {

 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
		foreach ($options as $value) {
		if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { 			delete_option( $value['id'] ); } }
		 
			header("Location: admin.php?page=de-panel.php&saved=true");
		die;
		 
		} 
if ( isset($_POST['action']) && $_POST['action'] == 'reset' ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=de-panel.php&reset=true");
die;
 
}
}
 
add_theme_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_template_directory_uri();
wp_enqueue_style("de-panel", $file_dir."/css/de-panel.css", false, "1.0", "all");
wp_enqueue_script("de_script", $file_dir."/js/de_script.js", false, "1.0");
wp_enqueue_script("functions_upload_img", $file_dir."/js/functions_upload_img.js", false, "1.0", "all");
wp_enqueue_script("de_script-2", $file_dir."/js/jscolor/jscolor.js", false, "1.0");


}

function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
 
if ( isset($_POST['action']) && $_POST['action'] == 'save' ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( isset($_POST['action']) && $_POST['action'] == 'reset' ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap de_wrap">
<!--<h2><?php echo $themename; ?>Settings</h2> -->

<div class="custom_panel_logo"></div>
<div class="de_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;

/////////////////////////////////////////////////////////////////////////////////// 
 
case "title":
?>

 
<?php break;

/////////////////////////////////////////////////////////////////////////////////// 
 
case 'text':
?>

<div class="de_input de_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
/////////////////////////////////////////////////////////////////////////////////// 

case 'textarea':
?>

<div class="de_input de_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
  
/////////////////////////////////////////////////////////////////////////////////// 

case 'picker':
?>

<div class="de_input de_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>"  class="color"/> <!-- <button type="button" onclick="document.getElementById('<?php echo $value['id']; ?>').value = '<?php echo $value['std']; ?>';">Reset</button> -->

 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 	
 </div>
<?php
break;

/////////////////////////////////////////////////////////////////////////////////// 
  
case 'select':
?>

<div class="de_input de_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
/////////////////////////////////////////////////////////////////////////////////// 

case "checkbox":
?>

<div class="de_input de_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 

/////////////////////////////////////////////////////////////////////////////////// 

case "section":
$i++;
?>

<div class="de_section">
<div class="de_title"><h3><img src="<?php get_template_directory_uri() ?>/images/blank.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" class="btnsave" />
</span><div class="clearfix"></div></div>
<div class="de_options">
<?php break;
 
/////////////////////////////////////////////////////////////////////////////////// 


case "group":
?>

<div class="de_group">
<h3><?php echo $value['name']; ?></h3>
</div>
<?php break;
 
/////////////////////////////////////////////////////////////////////////////////// 
 
case 'upload':
?>

<div class="de_input de_upload">
	<?php if(get_option('DE_custom_logo')<>""):?>
  	<img src="<?php echo get_option('DE_custom_logo'); ?>" style="margin:0 0 10px 170px;"/></br>
    <?php endif; ?>
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input class="txt" name="<?php echo $value['id']; ?>" id="main_pic" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	<input class="button" type="button" value="browse" id="upload_main" />
 	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
  
<?php
break;


case 'upload-2':
?>

<div class="de_input de_upload">
	<?php if(get_option('DE_bg_image')<>""):?>
  	<img src="<?php echo get_option('DE_bg_image'); ?>" style="width:200px; margin:0 0 10px 170px;"/></br>
    <?php endif; ?>
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input class="txt" name="<?php echo $value['id']; ?>" id="pic_2" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	<input class="button" type="button" value="browse" id="upload_2" />
 	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
  
<?php
break;


case 'hr': ?>
<hr> 
<?php
break; 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<?php
/*<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
*/ ?>
</div>
<?php } ?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>