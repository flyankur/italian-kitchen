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
                    <div class="post-title"><?php echo $theme_options['cp_post_title']; ?></div>
                </div>
            </div>
            <div id="post-container">
            	<?php the_post(); ?>
                <div id="post-<?php the_ID() ?>" class="post">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-img">
                            <?php if ($theme_options['cp_sidebar_position'] != 'hidden') {
								the_post_thumbnail('mediumwidth');
							} else {
								the_post_thumbnail('fullwidth');
							} ?>
                        </div>
                    <?php } ?>
                    <div class="topleft-meta">
                        <h1 class="post-title"><?php the_title() ?></h1>								
                        <div class="post-meta">
                            <div class="meta-content">Posted on <?php the_time('F j, Y'); ?> in: <?php the_category(', '); ?></div>
                        </div>
                    </div>
                    <div class="topright-meta">
                    	<?php if (comments_open()) { ?><a href="#comments">Jump To Comments</a><?php } ?>
                    </div>
                    <div class="devider"></div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </div><!-- .post -->
                <div class="devider"></div>
                <?php comments_template(); ?>
        	</div>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
</div>
<?php get_footer() ?>