<?php $theme_options = get_option('therestaurant');
$cat_ID = get_query_var('cat');
$category = get_category($cat_ID,false);
$cat_parent = $category->category_parent;
if ($cat_parent > 0) {
	$cat_ID = $cat_parent;
}

$sql = "SELECT DISTINCT p.ID, p.post_title, pm.meta_value AS page_template, pm2.meta_value AS mc_categories FROM " . $wpdb->posts . " AS p ";
$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = '_wp_page_template') ";
$sql .= "AS pm ON p.ID = pm.post_id ";
$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = 'categories') ";
$sql .= "AS pm2 ON p.ID = pm2.post_id ";
$sql .= "WHERE pm.meta_value = 'menucard.php' ";
//$sql .= "OR pm.meta_value = 'gallery.php' ";
//$sql .= "OR pm.meta_value = 'blog.php' ";
$rows = $wpdb->get_results($sql,OBJECT);

$include_page = '';
foreach($rows as $row) {
	$mc_categories = explode(',', $row->mc_categories);
	if (in_array($cat_ID, $mc_categories)) {
		if ($row->page_template == 'menucard.php') {
			$include_page = 'menucard';
		}
		/*else if ($row->page_template == 'gallery.php') {
			$include_page = 'gallery';
		}
		else if ($row->page_template == 'blog.php') {
			$include_page = 'blog';
		}*/
	}
}

if ($include_page == 'menucard') {
	include('menucard.php');
}
/*else if ($include_page == 'gallery') {
	include('gallery.php');
}
else if ($include_page == 'blog') {
	include('blog.php');
}*/
else { ?>
	<?php get_header() ?>
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
                        <h1 class="post-title">Category</h1>
                    </div>
                </div>
                <div id="post-container">
                    <h3 class="page-subtitle">Category Archive: <?php echo single_cat_title() ?></h3>
                    <?php //$paged = intval(get_query_var('paged'));
                	//query_posts('&cat='.$cat_ID.'&paged='.$paged );
					while( have_posts() ) : the_post(); ?>
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
                </div>
            </div><!-- #content -->
        </div>
        <div id="content-bottom"></div>
    </div>
    <?php get_footer() ?>
<?php } ?>