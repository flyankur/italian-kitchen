jQuery(document).ready(function() {
 jQuery('#upload_main').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#main_pic').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#upload_1').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#pic_1').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});
 
jQuery(document).ready(function() {
 jQuery('#upload_2').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#pic_2').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#upload_3').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#pic_3').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#upload_4').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#pic_4').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#upload_5').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#pic_5').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#btn_thumbnail').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#thumbnail').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});

jQuery(document).ready(function() {
 jQuery('#upload_bg_image').click(function() {
 window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#bg_image').val(imgurl);
 tb_remove();
 }
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
});