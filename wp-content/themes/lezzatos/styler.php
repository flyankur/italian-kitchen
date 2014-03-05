<?php
global $de_data;
$de_data = get_option( 'Lezatos_options' ); 
$accent_color = $de_data ['DE_accent_color']; 
$custom_css = $de_data['custom_css'];
$show_text_mobile = $de_data['DE_slider_text_mobile'];
/* DEFINE VARIABLES */ 
/* body css */ 
$DE_body_font = $de_data['DE_body_font'];
$body_font_face = $DE_body_font['face']; 
$body_font_size = $DE_body_font['size'];
$body_font_style = $DE_body_font['style'];
$body_font_color = $DE_body_font['color'];

/* heading 1 */
$DE_heading_1_font = $de_data['DE_heading_1_font'];
$h1_font_face = $DE_heading_1_font['face']; 
$h1_font_size = $DE_heading_1_font['size'];
$h1_font_style = $DE_heading_1_font['style'];
$h1_font_color = $DE_heading_1_font['color'];
/* heading 2 */
$DE_heading_2_font = $de_data['DE_heading_2_font'];
$h2_font_face = $DE_heading_2_font['face']; 
$h2_font_size = $DE_heading_2_font['size'];
$h2_font_style = $DE_heading_2_font['style'];
$h2_font_color = $DE_heading_2_font['color'];
/* heading 3 */
$DE_heading_3_font = $de_data['DE_heading_3_font'];
$h3_font_face = $DE_heading_3_font['face']; 
$h3_font_size = $DE_heading_3_font['size'];
$h3_font_style = $DE_heading_3_font['style'];
$h3_font_color = $DE_heading_3_font['color'];
/* heading 4 */
$DE_heading_4_font = $de_data['DE_heading_4_font'];
$h4_font_face = $DE_heading_4_font['face']; 
$h4_font_size = $DE_heading_4_font['size'];
$h4_font_style = $DE_heading_4_font['style'];
$h4_font_color = $DE_heading_4_font['color'];
/* heading 5 */
$DE_heading_5_font = $de_data['DE_heading_5_font'];
$h5_font_face = $DE_heading_5_font['face']; 
$h5_font_size = $DE_heading_5_font['size'];
$h5_font_style = $DE_heading_5_font['style'];
$h5_font_color = $DE_heading_5_font['color'];
/* heading 6 */
$DE_heading_6_font = $de_data['DE_heading_6_font'];
$h6_font_face = $DE_heading_6_font['face']; 
$h6_font_size = $DE_heading_6_font['size'];
$h6_font_style = $DE_heading_6_font['style'];
$h6_font_color = $DE_heading_6_font['color'];

/* general */
$header_bg = $de_data ['DE_header_background']; 
$page_bg = $de_data ['DE_page_background']; 
$footer_bg = $de_data ['DE_footer_background']; 
$menu_font_color = $de_data ['DE_menu_font_color']; 
$menu_bg_color = $de_data ['DE_menu_background']; 
$menu_font_color_hover = $de_data ['DE_menu_font_color_hover']; 
$menu_bg_hover_color = $de_data ['DE_menu_background_hover'];
/* mainmenu css */ 
$DE_menu_font = $de_data ['DE_menu_font'];
$menu_font_face = $DE_menu_font['face']; 
$menu_font_size = $DE_menu_font['size'];
$menu_font_style = $DE_menu_font['style'];
?>
<?php if($body_font_face<>""&&$body_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $body_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($menu_font_face<>""&&$menu_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $menu_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h1_font_face<>""&&$h1_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h1_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h2_font_face<>""&&$h2_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h2_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h3_font_face<>""&&$h3_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h3_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h4_font_face<>""&&$h4_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h4_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h5_font_face<>""&&$h5_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h5_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
<?php if($h6_font_face<>""&&$h6_font_face<>"default"):?>
<link href='http://fonts.googleapis.com/css?family=<?php echo $h6_font_face; ?>'  rel='stylesheet' type='text/css' media='screen'>
<?php endif; ?>
    

<style type="text/css">
  	body{ 
	<?php if($body_font_face<>""&&$body_font_face<>"default"):?>
	font-family:"<?php echo $body_font_face; ?>";
	<?php endif; ?>
	<?php if(get_option('DE_font_body_size')<>""&&get_option('DE_font_body_size')<>"default"):?>
	font-size:<?php echo get_option('DE_font_body_size'); ?>;
	<?php endif; ?>
	background:<?php if(get_option('DE_bg_image')<>""):?>url( <?php echo get_option('DE_bg_image');?>) <?php echo get_option(DE_bg_pos_1);?> <?php echo get_option('DE_bg_pos_2');?> <?php if(get_option('DE_bg_repeat')<>"repeat"):echo get_option('DE_bg_repeat'); endif;?> <?php echo get_option('DE_bg_scroll')?><?php endif?>#<?php echo get_option('DE_bg_color'); ?>
	;color:<?php echo "#".get_option('DE_font_body_color');?>;}
  	h1,h2,h3,h4,h5,h6,.mainmenu ul{ 
	<?php if($h1_font_face<>""&&$h1_font_face<>"default"):?>
	font-family:"<?php echo $h1_font_face; ?>";<?php endif; ?> 
	color:<?php echo "#".get_option('DE_font_title_color'); ?>;}
 	<?php echo get_option('DE_custom_css'); ?>
	h1.tagline{ color:<?php echo "#".get_option('DE_font_body_color');?>;}
	h1.titletext{color:#fff;}
	#portfolio li h2{color:#fff;}
	

#header,
#footer,	
::-moz-selection,
.page a:hover,
.page .active a,
#portfolio li .btnquit,
.deco-line,
#contact input.btn,
#tab-content ul li a:hover,
#tab-content .nav li a,
.btn-contact a,
#respond input.button,
.pagination a:hover,
.pagination .current,
.page a:hover,
.page .active a,
.btn,
.menu-item .price,
#menu-grid-view .price,
.category li a:hover,
.category li.active a,
.separator-b,
a.btn_readmore,
.blog_format_quote,
#bloglist .date,#blogread .date,
span.overlay
{background-color:<?php echo $accent_color;?>;}

span.overlay{
background-image: url(../images/hover_pic.png) center no-repeat;
}

a,
.idcolor,
#twitter span a
{color:<?php echo $accent_color;?>;}

code:hover,
#contact input:focus,
#contact textarea:focus,
#respond textarea:focus
{border:solid 1px <?php echo $accent_color;?>;}

body {
	  <?php if($body_font_face!='default'):?>font-family:'<?php echo $body_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $body_font_size;?>;
	  font-style:<?php echo $body_font_style;?>;
	  color:<?php echo $body_font_color;?>;
}
#content-wrapper{background:<?php echo $page_bg;?>;}
h1 {
	  <?php if($h1_font_face!='default'):?>font-family:'<?php echo $h1_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h1_font_size;?>;
	  font-style:<?php echo $h1_font_style;?>;
	  color:<?php echo $h1_font_color;?>;
}
h2 {
	  <?php if($h2_font_face!='default'):?>font-family:'<?php echo $h2_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h2_font_size;?>;
	  font-style:<?php echo $h2_font_style;?>;
	  color:<?php echo $h2_font_color;?>;
}
h3 {
	  <?php if($h3_font_face!='default'):?>font-family:'<?php echo $h3_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h3_font_size;?>;
	  font-style:<?php echo $h3_font_style;?>;
	  color:<?php echo $h3_font_color;?>;
}
h4 {
	  <?php if($h4_font_face!='default'):?>font-family:'<?php echo $h4_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h4_font_size;?>;
	  font-style:<?php echo $h4_font_style;?>;
	  color:<?php echo $h4_font_color;?>;
}
h5 {
	  <?php if($h5_font_face!='default'):?>font-family:'<?php echo $h5_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h5_font_size;?>;
	  font-style:<?php echo $h5_font_style;?>;
	  color:<?php echo $h5_font_color;?>;
}
h6 {
	  <?php if($h6_font_face!='default'):?>font-family:'<?php echo $h6_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $h6_font_size;?>;
	  font-style:<?php echo $h6_font_style;?>;
	  color:<?php echo $h6_font_color;?>;
}

#header{background:<?php echo $header_bg;?>;}
#footer{background:<?php echo $footer_bg;?>;}

#mainmenu {
	  <?php if($menu_font_face!='default'):?>font-family:'<?php echo $menu_font_face;?>';<?php endif; ?>
	  font-size:<?php echo $menu_font_size;?>;
	  font-style:<?php echo $menu_font_style;?>;
}

#mainmenu a{ color:<?php echo $menu_font_color;?>; background:<?php echo $menu_bg_color;?>;}
#mainmenu a:hover,#mainmenu li:hover a{ color:<?php echo $menu_font_color_hover;?>; background:<?php echo $menu_bg_hover_color;?>;}
#mainmenu li li a:hover {
  background-image:url('<?php echo get_template_directory_uri();?>/images/dotblack30.png');
}



<?php if($de_data['DE_slider_element_play_pause']=="0"){?>#play-button,#pause-button{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_number']=="0"){?>#slidecounter{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_list']=="0"){?>#slide-list{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_arrow']=="0"){?>#prevslide.load-item,#nextslide.load-item{ display:none; width:0; height:0;} <?php } ?>
<?php if($de_data['DE_slider_element_progress_bar']=="0"){?>#progress-back.load-item,.separator-b{ display:none; width:0; height:0;} <?php } ?>


<?php if($show_text_mobile==1): ?>
@media only screen and (max-width: 767px) {
.slide_text{ display:block; margin-top:100px;}
}
<?php endif; ?>


<?php echo $custom_css; ?>
</style>
   
	