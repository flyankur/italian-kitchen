<?php $theme_options = get_option('therestaurant');
get_header(); ?>
<div class="<?php echo sidebar_pos(); ?>">
	<div id="content-top"></div>
	<div id="content-border">
        <div id="content">
        	<?php if ($theme_options['cp_sidebar_position'] != 'hidden') { get_sidebar(); } ?>
            <div class="title-container">
                <div class="bar-left"></div>
                <div class="bar-right"></div>
                <div class="bar-bg"></div>
                <div class="title">
                    <h1 class="post-title">Not found</h1>
                </div>
            </div>
            <div id="post-container">
            	<div id="post-0" class="post error404">
                    <div class="post-content">
                        <p><?php echo stripslashes(__($theme_options['cp_error'])); ?></p>
                    </div>
                    <form id="error404-searchform" method="get" action="<?php bloginfo('home') ?>">
                        <div>
                            <input id="error404-s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="40" />
                            <input id="error404-searchsubmit" name="searchsubmit" type="submit" value="Find" />
                        </div>
                    </form>
                </div><!-- .post -->

        	</div>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
</div>
<?php get_footer() ?>