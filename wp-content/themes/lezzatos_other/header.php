<?php 
	$de_data = get_option( 'Lezatos_options' ); 
	global $de_data;
	
	if(!empty($de_data['DE_scheme_color'])){
	$de_scheme = $de_data['DE_scheme_color'];
	}else{
	$de_scheme = '';
	}
	
	$de_logo_file = $de_data ['DE_logo']; 
	$de_logo = get_site_url().substr($de_logo_file,10);
	$de_description = $de_data ['DE_website_description'];
	$de_keywords = $de_data ['DE_website_keywords'];
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<html <?php language_attributes(); ?>><head>
<?php if($de_description){ ?>
<meta name="description" content="<?php echo $de_description ?>">
<?php } ?>
<?php if($de_keywords){ ?>
<meta name="keywords" content="<?php echo $de_keywords ?>">
<?php } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
<!-- ********** wp_head ********** -->
<?php wp_head(); ?>
</head>
<?php $req="" ?>
<?php if($req=="unpassed"):  ?>
<body  <?php body_class( $class );?> >
<?php endif; ?> 
<body>
		
		<?php 	
			$current_post_type = get_post_type( $post );
			$current_tax = get_query_var('project_categories');
		 ?>
        
		<?php if(is_home()){ ?>
		<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/supersized/js/supersized.3.2.7.js'></script>
		<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/supersized/theme/supersized.shutter.min.js'></script>
		 <?php 	include 'slider/fullscreen-slider.php'; } ?>
		<?php wp_reset_query(); ?>    
<div id="canvas">	
<div style="position:absolute; top:0; left:0; width: 239px; height:100px;z-index: 10000;color: white;margin-top: 39px;display: inline;">
		<img style="width:50px; height:50px;float: left;display: inline;padding-left: 5px;" src="http://italiankitchen.co/wp-content/uploads/2014/03/icon_26575.png">
		<div style="
    float: left;
    display: inline;
    padding-top: 2px;
    padding-left: 10px;
">For Home Delivery call us at <p style="
    font-size: 29px;
    padding-top: 5px;
">8829055855</p></div>
	</div>
	
<div id="header" class="header">
    <div class="container">
    	<div class="four columns">
        	<div id="mainlogo" class="logo"><div class="inner"><a href="<?php echo home_url(); ?>"><img src="<?php if ( $de_logo_file ) { echo $de_logo;} else{ echo get_template_directory_uri();
			if($de_scheme=="color-black.css"){echo '/images/logo-black.png';}
			else if($de_scheme=="color-brown.css"){echo '/images/logo-brown.png';}
			else if($de_scheme=="color-purple.css"){echo '/images/logo-purple.png';}
			else{echo '/images/logo.png';}
			?><?php } ?>" alt="logo"/></a></div></div>
        </div>
        <div class="twelve columns">
        	            <div class="twelve columns">
             <!-- ********** mainmenu ********** -->
                    <?php $defaults = array(
                        'theme_location'  => '',
                        'menu'            => '', 
                        'container'       => 'div', 
                        'container_class' => 'menu-container', 
                        'container_id'    => 'mainmenu',
                        'menu_class'      => 'menu', 
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="nav" class="nav">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    ); ?>
                    <?php wp_nav_menu( $defaults ); ?>
        </div>
    </div>
</div>
</div>
