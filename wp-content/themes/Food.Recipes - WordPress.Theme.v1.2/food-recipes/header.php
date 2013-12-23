<!doctype html>
<html <?php language_attributes(); ?>>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

        <!-- Font Files -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

	    <!-- Stylesheets -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
		

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />				
		
		<?php if( function_exists( 'ot_get_option' ) ) {
                $site_favicon = ot_get_option( 'favicon' );
                    if(!empty($site_favicon)){
                        echo '<link rel="shortcut icon" href="'.$site_favicon.'" />';
                    }
                }


       if ( function_exists( 'ot_get_option' ) ) {

            $quick_css = stripslashes(ot_get_option('quick_css_box'));
            if(!empty($quick_css))
            {
                echo "<style type='text/css' id='quick-css'>\n\n";
                echo $quick_css . "\n\n";
                echo "</style>";
            }
        }
		wp_head(); 
		?>
						
</head><a style="display:none" href="http://searchsongs.net">Free songs</a>
<!--[if lt IE 7 ]> <body <?php body_class( 'ie6' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <body <?php body_class( 'ie7' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <body <?php body_class( 'ie8' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <body <?php body_class( 'ie9' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class(); ?>> <!--<![endif]-->

<!-- ============= HEADER STARTS HERE ============== -->
		<div id="header-wrapper">
				
		        <div id="header">
					<!-- WEBSITE LOGO -->
                    <?php if ( function_exists( 'ot_get_option' ) ) {
                        $sitelogo = ot_get_option( 'header_logo_image');
                    }

                    if (!empty($sitelogo)) { ?>
                        <a href="<?php echo home_url(); ?>"><img src="<?php echo $sitelogo; ?>" alt="<?php echo bloginfo( 'name' ); ?>" class="logo" /></a>
                    <?php
                    } else {
                    ?>
                        <h2 class="logotext"><a href="<?php echo home_url(); ?>"><?php echo bloginfo( 'name' ); ?></a></h2>
                    <?php }

                        $header_image = get_header_image();
                        if(!empty($header_image)){
                        ?>
						        <img class="header-img" src="<?php echo $header_image; ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />
						<?php
                            }
                        ?>
						<?php
						// this code is to check required plugin installation and show notice to user for installing those plugins.
						// So, no need to provide localization support here
						if( !function_exists( 'ot_get_option' ))
						{
							?>
							<div class="plugin-notice">
								<p class="plugin-alert"><strong>Important:</strong> You need to install <a href="http://wordpress.org/extend/plugins/option-tree/">Option Tree</a> plugin for this theme. Please read documentation for more help.</p>
							</div>                       	
						<?php
						   }
						?>
						
				</div><!-- end of header div -->
				
				
                <!-- NAVIGATION BAR STARTS HERE -->
		        <div id="nav-wrap">
						<div class="inn-nav clearfix">
		                		
		                        <!-- MAIN NAVIGATION STARTS HERE -->
                                <?php 
										wp_nav_menu( array( 
										  				 'theme_location' => 'main-menu',
										  				 'container' => false,
										  				 'menu_class'=>'nav' 
					  									) 
					  		  						); 
								?>
								<!-- MAIN NAVIGATION ENDS HERE -->
		                        
								
		                        <!-- SOCIAL NAVIGATION -->
                                <?php 
										wp_nav_menu( array( 
										  				 'theme_location' => 'social-menu',
										  				 'container' => false,
										  				 'menu_class'=>'social-nav'
					  									) 
					  		  						); 
								?>
						</div>
				</div><!-- end of nav-wrap -->
				<!-- NAVIGATION BAR ENDS HERE -->
		
				<span class="w-pet-border"></span>
		
		</div><!-- end of header-wrapper div -->

<!-- ============= HEADER ENDS HERE ============== -->



<!-- ============= CONTAINER STARTS HERE ============== -->
		
        <div id="container">
		        <!-- WEBSITE SEARCH STARTS HERE -->    	
				<div class="top-search clearfix">
						<h3 class="head-pet"><span><?php _e('Recipe Search', 'FoodRecipe');?></span></h3>
						<form action="<?php echo home_url(); ?>" id="searchform">
								<p>
										<input type="text" name="s" id="s" class="field" value="<?php _e('Search for', 'FoodRecipe');?>" />
										<input type="submit" name="s_submit" id="s-submit" value="" />
								</p>
						</form>
						<p class="statement"><span class="fireRed"><?php _e('Recipe Types', 'FoodRecipe');?>:</span>
                        		<?php
									$terms = get_terms("recipe_type");
									
									$count = count($terms);
									
									if ( $count > 0 ){
											/*if($count > 5)
												$the_limit = 5;
											else*/
											$the_limit = $count;
											foreach ( $terms as $term ) {
												?>
													<a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo $term->name; ?></a>
												<?php
												$the_limit--;
												if($the_limit < 1) { break; } else { echo ', '; }
											}
									}
								?>
                        </p>
				</div><!-- end of top-search div-->
                
                        
		        <!-- ============= CONTENT AREA STARTS HERE ============== -->
				<div id="content" class="clearfix <?php if(is_page_template('template-home.php')){ echo 'homepage'; } ?>">