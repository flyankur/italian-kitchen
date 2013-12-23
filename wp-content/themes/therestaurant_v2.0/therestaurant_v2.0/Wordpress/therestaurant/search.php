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
                    <h1 class="post-title">Search</h1>
                </div>
            </div>
            <div id="post-container">
            	<?php if (have_posts()) : ?>
                	<h3 class="page-subtitle">Search results for: <?php echo wp_specialchars(stripslashes($_GET['s']), true); ?></h3>
					<?php while( have_posts() ) : the_post(); ?>
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
				<?php else : ?>
                    <div id="post-0" class="post">
                        <h2 class="post-title">Nothing Found</h2>
                        <div class="post-content">
                            <p><?php echo __($theme_options['cp_search_error']); ?></p>
                        </div>
                        <form id="searchform" method="get" action="<?php bloginfo('home') ?>">
                            <div>
                                <input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="40" />
                                <input id="searchsubmit" name="searchsubmit" type="submit" value="Find" />
                            </div>
                        </form>
                    </div><!-- .post -->
                <?php endif; ?>
        	</div>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
</div>
<?php get_footer() ?>