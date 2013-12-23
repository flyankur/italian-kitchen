<?php global $more;
$theme_options = get_option('therestaurant');
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
                    <h1 class="post-title">Posts</h1>
                </div>
            </div>
            <div id="post-container">
				<?php while( have_posts() ) : the_post(); $more = 0; ?>
                <div id="post-<?php the_ID() ?>" class="post">
                    <?php $postimage = get_post_meta($post->ID, "post-img", true);
                    if ($postimage) { ?>
                        <div class="post-img">
                            <img class="load" src="<?php echo $postimage; ?>" alt="<?php the_title() ?>" />
                        </div>
                    <?php } ?>
                    <div class="topleft-meta">
                        <h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark"><?php the_title() ?></a></h2>								
                        <div class="post-meta">
                            <div class="meta-content">Posted on <?php the_time('F j, Y'); ?> in: <?php the_category(', '); ?></div>
                        </div>
                    </div>
                    <div class="topright-meta">
                    	<div class="jump_to_comments"><?php if (comments_open()) { comments_popup_link('Post Comment', '1 Comment', '% Comments'); } ?></div>
                    </div>
                    <div class="devider"></div>
                    <div class="post-content">
                        <?php the_content(''); ?>
                    </div>
                    <div class="readmore">
                    	<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">Read more</a>
                    </div>
                </div><!-- .post -->
                <?php endwhile ?>
                <div class="navigation">
                    <div class="navleft"><?php next_posts_link('&laquo; Older Posts', '0') ?></div>
                    <div class="navright"><?php previous_posts_link('Newer Posts &raquo;', '0') ?></div>
                </div>
        	</div>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
</div>
<?php get_footer() ?>