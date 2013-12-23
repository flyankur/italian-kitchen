/** Handle Post Formats Custom Meta boxes **/

	function postformat_meta() {
  
		//show metat box based on selection of post format
		var postformat_type_grp = jQuery('#post-formats-select input');
			
		jQuery('#post-formats-select input').change(function () { 
			//hide all the post format meta boxes
			if(jQuery(this).is(':checked') === true) { //alert(jQuery(this).val());
				jQuery('div[class*="postformatmetabox-"]').hide();   
				jQuery('.postformatmetabox-'+jQuery(this).val()).show();
			}
		}).change();
	}

	styleSelect = {
		init: function () {
			jQuery('.select_wrapper').each(function () {
				jQuery(this).prepend('<span>' + jQuery(this).find('.select option:selected').text() + '</span>');
			});
			jQuery('.select').live('change', function () {
				jQuery(this).prev('span').replaceWith('<span>' + jQuery(this).find('option:selected').text() + '</span>');
			});
			jQuery('.select').bind(jQuery.browser.msie ? 'click' : 'change', function(event) {
				jQuery(this).prev('span').replaceWith('<span>' + jQuery(this).find('option:selected').text() + '</span>');
			}); 
		}
	};

jQuery(document).ready(function($) {
		jQuery('.atp-radio-option').click(function(){
			jQuery(this).parent().parent().find('.atp-radio-option').removeClass('atp-radio-option-selected');
			jQuery(this).addClass('atp-radio-option-selected');
		});
		jQuery('.atp-radio-option').show();
		jQuery('.atp-radio-img-label').hide();
		jQuery('.atp-radio-img-radio').hide();
		postformat_meta();
		styleSelect.init();
		
		if (jQuery('.jmslider').is('.atp_options_box')) {
			jQuery(".jmhide").show();
		} else {
			jQuery(".jmhide").hide();
		}
		
		jQuery('#atp_cufon').change(function() {
			var cuf = "";
			var fcuf="";
			var str;
		
			jQuery("#atp_cufon option:selected").each(function() { 
				cuf += jQuery(this).text() + "";
				str= jQuery(this).text();
				string = str.replace(/\s{1,}/g, '_');
			});

			var cufonfonturl = "<script type='text/javascript' charset='utf-8' src='"+atp_panel.SiteUrl+"/js/cufon/"+str.replace(/\s{1,}/g, '_')+".js'>";
			jQuery("head").append(cufonfonturl);
			Cufon.replace('.cufonlive', { hover:true, fontFamily: cuf });
		});
	
		/*-- postlinkurl selection--*/
		jQuery("input[name=postlinktype_options]").change(function () {
			jQuery(".postlinkurl").hide();
			selected_plurl = jQuery("input[name=postlinktype_options]:checked").val();
			jQuery("."+selected_plurl).show();
		}).change();

		/*-- custom teaser option selection--*/
		jQuery("#atp_teaser").change(function () {
			jQuery(".atpteaseroption").hide();
			selected_teaser = jQuery("#atp_teaser option:selected").val();
			jQuery("."+selected_teaser).show();
		}).change();
	
		/*-- custom Testimonial uploadimage/gravatar selection--*/
		jQuery("#testimonial_image_option").change(function () {
			jQuery(".testimonialoption").hide();
			testimonialoption = jQuery("#testimonial_image_option option:selected").val();
			jQuery("."+testimonialoption).show();
		}).change();	
		
		/*-- custom Logo option selection--*/
		jQuery("#atp_logo").change(function () {
			jQuery(".title").hide();
			jQuery(".logo").hide();
			selected_teaser = jQuery("#atp_logo option:selected").val();
			jQuery("."+selected_teaser).show();
		}).change();	
		
		/*-- custom teaser option selection--*/
		jQuery("#subheader_teaser_options").change(function () {
			jQuery(".sub_teaser_option").hide();
			subheader_teaser_select = jQuery("#subheader_teaser_options option:selected").val();
			jQuery("."+subheader_teaser_select).show();
		}).change();
				/*-- Revolution selection--*/
		jQuery("#page_slider").change(function () {
		jQuery(".page_slider").hide();
			revolution_select = jQuery("#page_slider option:selected").val();
			//alert(revolution_select);
			if(revolution_select =="revolution")
			{
			jQuery("."+revolution_select).show();
			}
		}).change();

		/*-- custom slider selection--*/
		jQuery("#atp_slider").change(function () {
			jQuery(".atpsliders").hide();
			jQuery(".subtoggle").hide();
			selected_slider = jQuery("#atp_slider option:selected").val();
			jQuery("."+selected_slider).show();
	
		// If is toggle slider selected show sub elements
		if(selected_slider == 'toggleslider') {
			jQuery("#atp_toggleslider").change(function () {
				jQuery(".subtoggle").hide();
				selected_toggle_slider = jQuery("#atp_toggleslider option:selected").val();
				jQuery("."+selected_toggle_slider).show();
			}).change();
		}
		}).change();

		/*-- portfolio post type selection--*/
		jQuery("#port_posttype_option").change(function () {
			jQuery(".ptoption").hide();
			selected_ptoption = jQuery("#port_posttype_option option:selected").val();
			jQuery("."+selected_ptoption).show();
		}).change();
	
		jQuery('#media-items').bind('DOMNodeInserted',function(){
			jQuery('input[value="Insert into Post"]').each(function(){
				jQuery(this).attr('value','Use This Image');
			});
		});
	
		jQuery('.custom_upload_image_button').click(function() {
			var clickedID = jQuery(this).attr('name');
			formfield = jQuery(this).siblings('.custom_upload_image');
			preview = jQuery(this).siblings('.custom_preview_image');
			tb_show('', 'media-upload.php?type=image&mysite_upload_button=1&amp;TB_iframe=true');
			window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				jQuery('#atp_imagepreview-'+clickedID).append('<img id="'+clickedID+'"  class="custom_preview_image" src="'+imgurl+'" width="100" height="100">');
				classes = jQuery('img', html).attr('class');
				id = classes.replace(/(.*?)wp-image-/, '');
				formfield.val(imgurl);
				//preview.attr('src', imgurl);
				tb_remove();
			}
			return false;
		});
		
		jQuery('.cimage_remove').click(function() { 
			var defaultImage = jQuery(this).parent().siblings('.custom_default_image').text();
			jQuery(this).parent().siblings('.custom_upload_image').val('');
			jQuery(this).parent('.screenshot').remove();
			return false;
		});
		
		jQuery('.repeatable-add').click(function() {
			field = jQuery(this).closest('td').find('.custom_repeatable li:last').clone(true);
			fieldLocation = jQuery(this).closest('td').find('.custom_repeatable li:last');
			jQuery('input', field).val('').attr('name', function(index, name) {
				return name.replace(/(\d+)/, function(fullMatch, n) {
					return Number(n) + 1;
				});
			})
			field.insertAfter(fieldLocation, jQuery(this).closest('td'))
			return false;
		});
	
		jQuery('.repeatable-remove').click(function(){
			jQuery(this).parent().remove();
			return false;
		});

	});
	jQuery(document).ready(function($) {
		window.restore_send_to_editor = window.send_to_editor;

		jQuery('.upload_sc').click(function($) {
			formfield = jQuery(this).siblings('.custom_upload_image');
			preview = jQuery(this).siblings('.custom_preview_image');
			tb_show('', 'media-upload.php?type=image&mysite_upload_button=1&amp;TB_iframe=true');
			window.send_to_editor = function(html) {
				imgurl = jQuery('img',html).attr('src');
				formfield.val(imgurl);
				//preview.attr('src', imgurl);
				tb_remove();
				window.send_to_editor = window.restore_send_to_editor;
			}
			return false;
		});
	});
	