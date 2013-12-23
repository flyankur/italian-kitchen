<?php $theme_options = get_option('therestaurant'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version') ?>" /><!-- Please leave for stats -->
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="icon" href="<?php echo $theme_options['cp_favicon']; ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $theme_options['cp_favicon']; ?>" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Comments RSS Feed" href="<?php bloginfo('comments_rss2_url') ?>"  />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head() ?>

<style type="text/css">
/* main color */
#mainmenu ul.menu li:hover a, #mainmenu ul.menu li.current-menu-item a, #mainmenu ul.menu li.current-menu-parent a, #breadcrumbs a, .topright-meta a, .post-title a, .post-meta a, .card-cat h2, .card-item .price, .post-content h1, .post-content a, #nicepagination ul li.active {
	color: #<?php echo $theme_options['cp_color']; ?>;
}
#menu-left, #menu-right, #menu-container, .title-container .title, .readmore, input[type="submit"] {
	background-color: #<?php echo $theme_options['cp_color']; ?>;
}
#menu-container, .title-container .title, .title-container .bar-left, .title-container .bar-right, .readmore, input[type="submit"] {
	border-bottom-color: #<?php echo $theme_options['cp_color']; ?>;
}
.title-container .title, #mainmenu ul.menu li:hover .dropdown_arrow, #mainmenu ul.menu li.current-menu-item .dropdown_arrow, #mainmenu ul.menu li.current-menu-parent .dropdown_arrow, .readmore, input[type="submit"] {
	border-top-color: #<?php echo $theme_options['cp_color']; ?>;
}
.title-container .bar-right {
	border-left-color: #<?php echo $theme_options['cp_color']; ?>;
}
.title-container .bar-left {
	border-right-color: #<?php echo $theme_options['cp_color']; ?>;
}
<?php if ((is_front_page() && $theme_options['cp_slider_show'] == 'frontpage') || $theme_options['cp_slider_show'] == 'all') { ?>
#header {
	height: 400px;
}
#slider {
	display: inline-block;
}
<?php } ?>
</style>
</head>

<?php
flush();

$bodyclasses = '';
if ($theme_options['cp_color_theme'] == 'green') { $bodyclasses .= 'green '; } 
elseif ($theme_options['cp_color_theme'] == 'red') { $bodyclasses .= 'red '; } 
elseif ($theme_options['cp_color_theme'] == 'blue') { $bodyclasses .= 'blue '; } 
elseif ($theme_options['cp_color_theme'] == 'gray') { $bodyclasses .= 'gray '; }
if ($theme_options['cp_imgloader']) { $bodyclasses .= 'imgloader '; }
?>
<!--[if IE 7]> <body class="<?php echo $bodyclasses; ?> ie7"> <![endif]-->
<!--[if IE 8]> <body class="<?php echo $bodyclasses; ?> ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body class="<?php echo $bodyclasses; ?>"> <!--<![endif]-->

<div id="wrapper">
	<div id="mainmenu">
    	<div class="wrapper">
        	<div id="menu-bg"></div>
            <div id="menu-container">
            	<?php wp_nav_menu('main'); ?>
            </div>
            <div id="menu-left"></div>
            <div id="menu-right"></div>
            <div id="stars-left"></div>
            <div id="stars-right"></div>
    	</div>
    </div>
	<div id="top">
    	<div class="wrapper">
            <div id="logo-container">
                <?php if (!is_front_page()) { ?>
                <h3 id="logo"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><?php if ($theme_options['cp_bloglogo']) { ?><img src="<?php echo $theme_options['cp_bloglogo']; ?>" alt="Logo" /><?php } else { ?><span id="text_logo"><?php bloginfo('name'); ?></span><?php } ?></a></h3>
                <?php if (!$theme_options['cp_bloglogo']) { ?><div id="description"><?php bloginfo('description') ?></div><?php } ?>
				<?php
                } else { ?>
                <h1 id="logo"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><?php if ($theme_options['cp_bloglogo']) { ?><img src="<?php echo $theme_options['cp_bloglogo']; ?>" alt="Logo" /><?php } else { ?><span id="text_logo"><?php bloginfo('name'); ?></span><?php } ?></a></h1>
                <?php if (!$theme_options['cp_bloglogo']) { ?><div id="description"><?php bloginfo('description') ?></div><?php } ?>
				<?php }	?>
            </div>
            <div id="tagline">
            	<p><?php echo stripslashes(__($theme_options['cp_tagline'])); ?></p>
            </div>
    	</div>
    </div>
	<div id="header">
    	<div id="slider">
			<?php if ($theme_options['cp_slider_post_img[]']) {
				foreach ($theme_options['cp_slider_post_img[]'] as $i=>$value) {
					if ($value) {
						$title = stripslashes($theme_options['cp_slider_post_text[]'][$i]);
						if ($theme_options['cp_slider_post_url[]'][$i]) { ?>
                        <a href="<?php echo $theme_options['cp_slider_post_url[]'][$i]; ?>">
                        <?php } ?>
						<img src="<?php echo $value; ?>" title="<?php echo $title; ?>" alt="<?php echo $title; ?>" />
                        <?php if ($theme_options['cp_slider_post_url[]'][$i]) { ?>
                        </a>
                        <?php } ?>
					<?php }
				}
			} else { ?>
                <img src="<?php bloginfo('template_directory') ?>/images/slider_bg.jpg" title="If food is an experience, then you will find it at this restaurant" alt="Example image" />
            <?php } ?>
        </div>
	</div><!--  #header -->
	<div id="container">
    	<div id="slider_arrow" class="arrow_down"></div>
        <div id="ornament"></div>
    	<div class="wrapper">
        	<?php if ($theme_options['cp_breadcrumbs']) {
        		the_breadcrumb();
			} ?>