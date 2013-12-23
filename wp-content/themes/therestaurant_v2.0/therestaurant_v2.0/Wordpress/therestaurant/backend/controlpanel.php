<?php
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	header( 'Location: '.admin_url().'admin.php?page=therestaurant' ) ;
}
class ControlPanel {
  var $default_settings = Array(
	'cp_color_theme' => 'red', 
	'cp_color' => 'c10000',
	'cp_sidebar_position' => 'right',
	'cp_imgloader' => '1',
	'cp_breadcrumbs' => '1',
	'cp_post_title' => 'Post',
	'cp_tagline' => 'Truely the best restaurant in town - The New York Times',
	'cp_error' => 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.',
	'cp_search_error' => 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.',
	'cp_slider_show' => 'frontpage',
	'cp_slider_effect' => 'random',
	'cp_slider_time' => '10',
	'cp_slider_number' => '5',
	'cp_fronttext_show' => 'text'
  );
  function ControlPanel() {
	add_action('admin_menu', array(&$this, 'admin_menu'));
	add_action('admin_head', array(&$this, 'admin_head'));
	if (!is_array(get_option('therestaurant'))) {
		add_option('therestaurant', $this->default_settings);
		$this->options = get_option('therestaurant');
	}
	$this->options = get_option('therestaurant');
  }
  function admin_menu() {
    add_theme_page('Theme Control Panel', 'The Restaurant theme settings', 'edit_themes', "therestaurant", array(&$this, 'optionsmenu'));
  }
  function admin_head() {
  	ob_start();
  	?>
	<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/backend/css/colorpicker.css" type="text/css" />
  	<?php
  	$o = ob_get_contents();
  	return $o;
  }
  function optionsmenu() {
	  ?>
      <script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/backend/js/colorpicker.js"></script>
	  <script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/backend/js/eye.js"></script>
      <script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/backend/js/utils.js"></script>
      <script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/backend/js/layout.js?ver=1.0.2"></script>
      <script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/backend/js/jquery-ui-1.7.3.custom.min.js"></script>
	  <script type="text/javascript">
	  jQuery(document).ready(function($){
		  $("#cp_color").ColorPicker({
			  onSubmit: function(hsb, hex, rgb, el) {
				  $(el).val(hex);
				  $(el).ColorPickerHide();
			  },
			  onBeforeShow: function () {
				  $(this).ColorPickerSetColor(this.value);
			  }
		  })
		  .bind("keyup", function(){
			  $(this).ColorPickerSetColor(this.value);
		  });
		  $(".item-general").css("display","block");
		  $(".menu-item").click(function(){
			  $(".menu-item").removeClass("current-item");
			  $(this).addClass("current-item");
			  var item = $(this).attr("item");
			  $(".rm_section").css("display","none");
			  $("."+item).css("display","block");
			  return false;
		  });
		  
		  $('#add_slide_button').click(function(){
			  var content = '<div class="rm_input rm_select"><label for="cp_slider_post_img[]">New slide image</label><input type="text" name="cp_slider_post_img[]" class="upload_field" id="cp_slider_post_img[]" /><small><input class="upload_button" type="button" value="Browse" /></small><div class="clearfix"></div><label for="cp_slider_post_text[]">New slide caption</label><textarea rows="5" cols="50" name="cp_slider_post_text[]" id="cp_slider_post_text[]"></textarea><small>The text you want to display</small><div class="clearfix"></div><label for="cp_slider_post_url[]">New slide link</label><input type="text" name="cp_slider_post_url[]" id="cp_slider_post_url[]" /><small>The read more link (optional)</small><div class="clearfix"></div></div>';
			  $('#sliderposts').append(content);
			  return false;
		  });
		  $('#add_sidebar_button').click(function(){
			  var content = '<div class="rm_input rm_select"><label for="cp_sidebar_name[]">New sidebar name</label><input type="text" name="cp_sidebar_name[]" id="cp_sidebar_name[]" value="" /><small>The nickname of the sidebar. Please dont use special characters!</small><div class="clearfix"></div></div>';
			  $('#customsidebars').append(content);
			  return false;
		  });
	  });
	  </script>
	  <?php
	  
	  if ($_POST['ss_action'] == 'save') {
		$this->options["cp_bloglogo"] = $_POST['cp_bloglogo'];
		$this->options["cp_favicon"] = $_POST['cp_favicon'];
		$this->options["cp_trackingcode"] = $_POST['cp_trackingcode'];
		$this->options["cp_sidebar_position"] = $_POST['cp_sidebar_position'];
		$this->options["cp_post_title"] = $_POST['cp_post_title'];
		$this->options["cp_tagline"] = $_POST['cp_tagline'];
		$this->options["cp_error"] = $_POST['cp_error'];
		$this->options["cp_search_error"] = $_POST['cp_error'];
		if ($this->options["cp_color_theme"] != $_POST['cp_color_theme']) {
			if ($_POST['cp_color_theme'] == 'green') {
				$this->options["cp_color"] = '217526';
			} elseif ($_POST['cp_color_theme'] == 'red') {
				$this->options["cp_color"] = 'c10000';
			} elseif ($_POST['cp_color_theme'] == 'blue') {
				$this->options["cp_color"] = '256c8e';
			} elseif ($_POST['cp_color_theme'] == 'gray') {
				$this->options["cp_color"] = '403f3e';
			} else {
				$this->options["cp_color"] = $_POST['cp_color'];
			}
		} else {
			$this->options["cp_color"] = $_POST['cp_color'];
		}
		$this->options["cp_color_theme"] = $_POST['cp_color_theme'];
		$this->options["cp_imgloader"] = $_POST['cp_imgloader'];
		$this->options["cp_breadcrumbs"] = $_POST['cp_breadcrumbs'];
		$this->options["cp_fronttext_show"] = $_POST['cp_fronttext_show'];
		$this->options["cp_fronttext1_title"] = $_POST['cp_fronttext1_title'];
		$this->options["cp_fronttext1_img"] = $_POST['cp_fronttext1_img'];
		$this->options["cp_fronttext1_text"] = $_POST['cp_fronttext1_text'];
		$this->options["cp_fronttext1_url"] = $_POST['cp_fronttext1_url'];
		$this->options["cp_fronttext2_title"] = $_POST['cp_fronttext2_title'];
		$this->options["cp_fronttext2_img"] = $_POST['cp_fronttext2_img'];
		$this->options["cp_fronttext2_text"] = $_POST['cp_fronttext2_text'];
		$this->options["cp_fronttext2_url"] = $_POST['cp_fronttext2_url'];
		$this->options["cp_fronttext3_title"] = $_POST['cp_fronttext3_title'];
		$this->options["cp_fronttext3_img"] = $_POST['cp_fronttext3_img'];
		$this->options["cp_fronttext3_text"] = $_POST['cp_fronttext3_text'];
		$this->options["cp_fronttext3_url"] = $_POST['cp_fronttext3_url'];
		$this->options["cp_slider_show"] = $_POST['cp_slider_show'];
		$this->options["cp_slider_effect"] = $_POST['cp_slider_effect'];
		$this->options["cp_slider_time"] = $_POST['cp_slider_time'];
		$this->options["cp_slider_post_img[]"] = $_POST['cp_slider_post_img'];
		$this->options["cp_slider_post_text[]"] = $_POST['cp_slider_post_text'];
		$this->options["cp_slider_post_url[]"] = $_POST['cp_slider_post_url'];
		$this->options["cp_contact"] = $_POST['cp_contact'];
		$this->options["cp_contact_title"] = $_POST['cp_contact_title'];
		$this->options["cp_contact_twitter"] = $_POST['cp_contact_twitter'];
		$this->options["cp_contact_facebook"] = $_POST['cp_contact_facebook'];
		$this->options["cp_contact_flickr"] = $_POST['cp_contact_flickr'];
		$this->options["cp_contact_linkedin"] = $_POST['cp_contact_linkedin'];
		$this->options["cp_contact_phone"] = $_POST['cp_contact_phone'];
		$this->options["cp_contact_email"] = $_POST['cp_contact_email'];
		$this->options["cp_sidebar_name[]"] = $_POST['cp_sidebar_name'];
		update_option('therestaurant', $this->options);
		echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 300px; margin-left: 20px"><p>Settings <strong>saved</strong>.</p></div>';
	  }
	  ?>
      <div class="wrap rm_wrap">
          <h2>The Restaurant theme settings</h2>
          <p>To easily use the theme, use the options below.</p>
          <div id="theme-menu">
              <div class="menu-item current-item" item="item-general">General</div>
              <div class="menu-item" item="item-frontpage">Frontpage</div>
              <div class="menu-item" item="item-contact">Contact widget</div>
              <div class="menu-item" item="item-sidebars">Custom sidebars</div>
          </div>
          <div class="rm_opts">
              <form action="" method="post" class="themeform">
                  <input type="hidden" id="ss_action" name="ss_action" value="save">
                  <div class="rm_section item-general">
                      <div class="rm_title">
                          <h3>General</h3>
                          <span class="submit">
                              <input type="submit" value="Save Changes" name="cp_save"/>
                          </span>
                          <div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_bloglogo">Blog logo</label>
                          <input type="text" name="cp_bloglogo" id="cp_bloglogo" class="upload_field" value="<?php echo $this->options["cp_bloglogo"]; ?>" />
                          <small><input class="upload_button" type="button" value="Browse" /></small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_favicon">Favicon</label>
                          <input type="text" name="cp_favicon" id="cp_favicon" class="upload_field" value="<?php echo $this->options["cp_favicon"]; ?>" />
                          <small><input class="upload_button" type="button" value="Browse" /></small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_trackingcode">Google analytics</label>
                          <input type="text" name="cp_trackingcode" id="cp_trackingcode" value="<?php echo $this->options["cp_trackingcode"]; ?>" />
                          <small>Insert your google analytics tracking number</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_select">
                          <label for="cp_color_theme">Color theme</label>
                          <select name="cp_color_theme" id="cp_color_theme">
                          	  <option <?php if ($this->options["cp_color_theme"] == 'green') { ?>selected="selected"<?php } ?> value="green">Green</option>
                              <option <?php if ($this->options["cp_color_theme"] == 'red') { ?>selected="selected"<?php } ?> value="red">Red</option>
                              <option <?php if ($this->options["cp_color_theme"] == 'blue') { ?>selected="selected"<?php } ?> value="blue">Blue</option>
                              <option <?php if ($this->options["cp_color_theme"] == 'gray') { ?>selected="selected"<?php } ?> value="gray">Gray</option>
                          </select>
                          <small>The color theme of the website. This effects the main color and the arrow color. The main color can be altered below</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_color">Website main color</label>
                          <input type="text" name="cp_color" id="cp_color" value="<?php echo $this->options["cp_color"]; ?>" />
                          <small>This is the color of the links used on this website</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_select">
                          <label for="cp_sidebar_position">Sidebar position</label>
                          <select name="cp_sidebar_position" id="cp_sidebar_position">
                          	  <option <?php if ($this->options["cp_sidebar_position"] == 'left') { ?>selected="selected"<?php } ?> value="left">Left</option>
                              <option <?php if ($this->options["cp_sidebar_position"] == 'right') { ?>selected="selected"<?php } ?> value="right">Right</option>
                              <option <?php if ($this->options["cp_sidebar_position"] == 'hidden') { ?>selected="selected"<?php } ?> value="hidden">Hidden (full width content)</option>
                          </select>
                          <small>The position of the sidebar</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_breadcrumbs">Display breadcrumbs</label>
                          <input type="checkbox" <?php if ($this->options["cp_breadcrumbs"] == '1') { echo 'checked'; } ?>  name="cp_breadcrumbs" id="cp_breadcrumbs" value="1" />
                          <small>Displays breadcrumbs at the top of every page</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_imgloader">Image loader</label>
                          <input type="checkbox" <?php if ($this->options["cp_imgloader"] == '1') { echo 'checked'; } ?>  name="cp_imgloader" id="cp_imgloader" value="1" />
                          <small>Neatly fades in images once they're loaded</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_post_title">Post heading</label>
                          <input type="text" name="cp_post_title" id="cp_post_title" value="<?php echo $this->options["cp_post_title"]; ?>" />
                          <small>The heading for posts</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_tagline">Header tagline</label>
                          <textarea rows="5" cols="50" name="cp_tagline" id="cp_tagline"><?php echo stripslashes(htmlspecialchars($this->options["cp_tagline"])); ?></textarea>
                          <small>The tagline found in the top right corner of the website</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_search_error">Search error</label>
                          <textarea rows="5" cols="50" name="cp_search_error" id="cp_search_error"><?php echo stripslashes(htmlspecialchars($this->options["cp_search_error"])); ?></textarea>
                          <small>The text displayed on a 'No search results found' page</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_error">404 error message</label>
                          <textarea rows="5" cols="50" name="cp_error" id="cp_error"><?php echo stripslashes(htmlspecialchars($this->options["cp_error"])); ?></textarea>
                          <small>The text displayed on a 404 error page</small><div class="clearfix"></div>
                      </div>
                  </div>
                  <div class="rm_section item-frontpage">
                      <div class="rm_title">
                          <h3>Content slider</h3>
                          <span class="submit">
                              <input type="submit" value="Save Changes" name="cp_save"/>
                          </span>
                          <div class="clearfix"></div>
                      </div>
                      
                      <div class="rm_input rm_select">
                          <label for="cp_slider_show">Slider display option</label>
                          <select name="cp_slider_show" id="cp_slider_show">
                          	  <option <?php if ($this->options["cp_slider_show"] == 'frontpage') { ?>selected="selected"<?php } ?> value="frontpage">Only on frontpage</option>
                              <option <?php if ($this->options["cp_slider_show"] == 'all') { ?>selected="selected"<?php } ?> value="all">On all pages</option>
                              <option <?php if ($this->options["cp_slider_show"] == 'hidden') { ?>selected="selected"<?php } ?> value="hidden">Hidden</option>
                          </select>
                          <small>Auto hide the slider on pages other then the frontpage</small><div class="clearfix"></div>
                      </div>
                      
                      <div class="rm_input rm_select">
                          <label for="cp_slider_effect">Transition effect</label>
                          <select name="cp_slider_effect" id="cp_slider_effect">
                          	  <option <?php if ($this->options["cp_slider_effect"] == 'random') { ?>selected="selected"<?php } ?> value="random">Random</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'sliceDown') { ?>selected="selected"<?php } ?> value="sliceDown">Slice down</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'sliceDownLeft') { ?>selected="selected"<?php } ?> value="sliceDownLeft">Slice down left</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'sliceUp') { ?>selected="selected"<?php } ?> value="sliceUp">Slice up</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'sliceUpLeft') { ?>selected="selected"<?php } ?> value="sliceUpLeft">Slice up left</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'sliceUpDown') { ?>selected="selected"<?php } ?> value="sliceUpDown">Slice up down</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'sliceUpDownLeft') { ?>selected="selected"<?php } ?> value="sliceUpDownLeft">Slice up down left</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'fold') { ?>selected="selected"<?php } ?> value="fold">Fold</option>
                              <option <?php if ($this->options["cp_slider_effect"] == 'fade') { ?>selected="selected"<?php } ?> value="fade">Fade</option>
                          </select>
                          <small>The effect of the slider transition</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_slider_time">Rotation interval</label>
                          <input type="text" name="cp_slider_time" id="cp_slider_time" value="<?php echo $this->options["cp_slider_time"]; ?>" />
                          <small>Number of seconds each item should be displayed</small><div class="clearfix"></div>
                      </div>
                      <div id="sliderposts">
					  <?php 
					  if ($this->options["cp_slider_post_img[]"]) {
						  $count = 1;
					  	  foreach ($this->options["cp_slider_post_img[]"] as $i=>$value) {
							  if ($value) { ?>
                                  <div class="rm_input rm_select">
                                      <label for="cp_slider_post_img[<?php echo $i; ?>]">Slide #<?php echo $count; ?> image</label>
                                      <input type="text" name="cp_slider_post_img[<?php echo $i; ?>]" class="upload_field" id="cp_slider_post_img[<?php echo $i; ?>]" value="<?php echo $this->options["cp_slider_post_img[]"][$i]; ?>" />
                                      <small><input class="upload_button" type="button" value="Browse" /></small><div class="clearfix"></div>
                                      
                                      <label for="cp_slider_post_text[<?php echo $i; ?>]">Slide #<?php echo $count; ?> caption</label>
                                      <textarea rows="5" cols="50" name="cp_slider_post_text[<?php echo $i; ?>]" id="cp_slider_post_text[<?php echo $i; ?>]"><?php echo stripslashes(htmlspecialchars($this->options["cp_slider_post_text[]"][$i])); ?></textarea>
                                      <small>The text you want to display</small><div class="clearfix"></div>
                                      
                                      <label for="cp_slider_post_url[<?php echo $i; ?>]">Slide #<?php echo $count; ?> link</label>
                                      <input type="text" name="cp_slider_post_url[<?php echo $i; ?>]" id="cp_slider_post_url[<?php echo $i; ?>]" value="<?php echo $this->options["cp_slider_post_url[]"][$i]; ?>" />
                                      <small>The read more link (optional)</small><div class="clearfix"></div>
                                  </div>
					  	  	  <?php $count++;
							  }
						  }
					  } ?>
                      </div>
                      <div class="rm_input rm_select">
                          <input id="add_slide_button" type="button" value="Add new slide" />
                          <small></small><div class="clearfix"></div>
                      </div>
                      <div class="rm_title">
                          <h3>Frontpage widgets</h3>
                          <span class="submit">
                              <input type="submit" value="Save Changes" name="cp_save"/>
                          </span>
                          <div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_select">
                          <label for="cp_fronttext_show">Widget area options</label>
                          <select name="cp_fronttext_show" id="cp_fronttext_show">
                          	  <option <?php if ($this->options["cp_fronttext_show"] == 'text') { ?>selected="selected"<?php } ?> value="text">Three text blocks (see options below)</option>
                              <option <?php if ($this->options["cp_fronttext_show"] == 'widgets') { ?>selected="selected"<?php } ?> value="widgets">Frontpage widget area</option>
                              <option <?php if ($this->options["cp_fronttext_show"] == 'both') { ?>selected="selected"<?php } ?> value="both">Both</option>
                          </select>
                          <small>Display text blocks or custom widgets on the frontpage</small><div class="clearfix"></div>
                      </div>
                      <?php for ($i=1;$i<4;$i++) { ?>
                          <div class="rm_input rm_select">
                              <label for="cp_fronttext<?php echo $i; ?>_title">Text block #<?php echo $i; ?> title</label>
                              <input type="text" name="cp_fronttext<?php echo $i; ?>_title" id="cp_fronttext<?php echo $i; ?>_title" value="<?php echo stripslashes(htmlspecialchars($this->options["cp_fronttext".$i."_title"])); ?>" />
                              <small>The title of the text block</small><div class="clearfix"></div>
                              <label for="cp_fronttext<?php echo $i; ?>_img">Text block #<?php echo $i; ?> image</label>
                              <input type="text" name="cp_fronttext<?php echo $i; ?>_img" class="upload_field" id="cp_fronttext<?php echo $i; ?>_img" value="<?php echo $this->options["cp_fronttext".$i."_img"]; ?>" />
                              <small><input class="upload_button" type="button" value="Browse" /> (optional)</small><div class="clearfix"></div>
                              <label for="cp_fronttext<?php echo $i; ?>_text">Text block #<?php echo $i; ?> text</label>
                              <textarea rows="5" cols="50" name="cp_fronttext<?php echo $i; ?>_text" id="cp_fronttext<?php echo $i; ?>_text"><?php echo stripslashes(htmlspecialchars($this->options["cp_fronttext".$i."_text"])); ?></textarea>
                              <small>The text you want to display</small><div class="clearfix"></div>
                              <label for="cp_fronttext<?php echo $i; ?>_url">Text block #<?php echo $i; ?> link</label>
                              <input type="text" name="cp_fronttext<?php echo $i; ?>_url" id="cp_fronttext<?php echo $i; ?>_url" value="<?php echo $this->options["cp_fronttext".$i."_url"]; ?>" />
                              <small>The read more link (optional)</small><div class="clearfix"></div>
                          </div>
                      <?php } ?>
                  </div>
                  <div class="rm_section item-contact">
                      <div class="rm_title">
                          <h3>Contact widget</h3>
                          <span class="submit">
                              <input type="submit" value="Save Changes" name="cp_save"/>
                          </span>
                          <div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact">Display contact widget</label>
                          <input type="checkbox" <?php if ($this->options["cp_contact"] == '1') { echo 'checked'; } ?>  name="cp_contact" id="cp_contact" value="1" />
                          <small>Display the contact widget in the footer</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_title">Contact widget title</label>
                          <input type="text" name="cp_contact_title" id="cp_contact_title" value="<?php echo stripslashes(htmlspecialchars($this->options["cp_contact_title"])); ?>" />
                          <small>The contact widget title</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_twitter">Twitter username</label>
                          <input type="text" name="cp_contact_twitter" id="cp_contact_twitter" value="<?php echo $this->options["cp_contact_twitter"]; ?>" />
                          <small>Your twitter username</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_facebook">Facebook profile url</label>
                          <input type="text" name="cp_contact_facebook" id="cp_contact_facebook" value="<?php echo $this->options["cp_contact_facebook"]; ?>" />
                          <small>Url to your facebook profile</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_flickr">Flickr profile url</label>
                          <input type="text" name="cp_contact_flickr" id="cp_contact_flickr" value="<?php echo $this->options["cp_contact_flickr"]; ?>" />
                          <small>Url to your flickr profile</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_linkedin">LinkedIn profile url</label>
                          <input type="text" name="cp_contact_linkedin" id="cp_contact_linkedin" value="<?php echo $this->options["cp_contact_linkedin"]; ?>" />
                          <small>Url to your linkedin profile</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_phone">Your phone number</label>
                          <input type="text" name="cp_contact_phone" id="cp_contact_phone" value="<?php echo $this->options["cp_contact_phone"]; ?>" />
                          <small>Display your phone number on the frontpage</small><div class="clearfix"></div>
                      </div>
                      <div class="rm_input rm_text">
                          <label for="cp_contact_email">Your email address</label>
                          <input type="text" name="cp_contact_email" id="cp_contact_email" value="<?php echo $this->options["cp_contact_email"]; ?>" />
                          <small>Display your email address on the frontpage</small><div class="clearfix"></div>
                      </div>
                  </div>
                  <div class="rm_section item-sidebars">
                      <div class="rm_title">
                          <h3>Custom sidebars (will be added to the widget page)</h3>
                          <span class="submit">
                              <input type="submit" value="Save Changes" name="cp_save"/>
                          </span>
                          <div class="clearfix"></div>
                      </div>
                      <div id="customsidebars">
					  <?php 
					  if ($this->options["cp_sidebar_name[]"]) {
						  $count = 1;
					  	  foreach ($this->options["cp_sidebar_name[]"] as $i=>$value) {
							  if ($value) { ?>
                                  <div class="rm_input rm_select">
                                      <label for="cp_sidebar_name[<?php echo $i; ?>]">Sidebar #<?php echo $count; ?> name</label>
                                      <input type="text" name="cp_sidebar_name[<?php echo $i; ?>]" id="cp_sidebar_name[<?php echo $i; ?>]" value="<?php echo $this->options["cp_sidebar_name[]"][$i]; ?>" />
                                      <small>The nickname of the sidebar. Please don't use special characters!</small><div class="clearfix"></div>
                                  </div>
					  	  	  <?php $count++;
							  }
						  }
					  } ?>
                      </div>
                      <div class="rm_input rm_select">
                          <input id="add_sidebar_button" type="button" value="Add new sidebar" />
                          <small></small><div class="clearfix"></div>
              		  </div>
              </form>
          </div>
      </div>
      <?php	 
  }
}
?>