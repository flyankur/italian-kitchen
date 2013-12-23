<?php
/*
Template Name: Blog
*/
?>
<?php global $more, $post, $wpdb;
$theme_options = get_option('therestaurant');
get_header();
$pageid = $post->ID;
//if page is a category
if ($cat_ID) {
	//overwrite title and category if current page is on a specific category
	$sql = "SELECT DISTINCT p.ID, p.post_title, pm2.meta_value AS mc_categories, pm3.meta_value AS number_items FROM " . $wpdb->posts . " AS p ";
	$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = '_wp_page_template') ";
	$sql .= "AS pm ON p.ID = pm.post_id ";
	$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = 'categories') ";
	$sql .= "AS pm2 ON p.ID = pm2.post_id ";
	$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = 'number') ";
	$sql .= "AS pm3 ON p.ID = pm3.post_id ";
	$sql .= "WHERE pm.meta_value = 'gallery.php' ";
	$rows = $wpdb->get_results($sql,OBJECT);
	foreach($rows as $row) {
		$mc_categories = explode(',', $row->mc_categories);
		if (in_array($cat_ID, $mc_categories)) {
			$pagetitle = __($row->post_title);
			$categories = $row->mc_categories;
			$number = $row->number_items;
		}
	}
}
else {
	//if page is a.. page
	$pagetitle = get_the_title();
	$categories = get_post_meta($pageid, "categories", true);
	$number = get_post_meta($pageid, "number", true);
}
$sidebar_pos = sidebar_pos(); ?>
<div class="<?php echo $sidebar_pos; ?>">
	<div id="content-top"></div>
	<div id="content-border">
        <div id="content">
        	<?php if ($sidebar_pos != 'fullwidthpage') { get_sidebar(); } ?>
            <div class="title-container">
                <div class="bar-left"></div>
                <div class="bar-right"></div>
                <div class="bar-bg"></div>
                <div class="title">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </div>
            </div>
            <div id="post-container">
				<?php $paged = intval(get_query_var('paged'));
                query_posts('&cat='.$categories.'&posts_per_page='.$number.'&paged='.$paged );
                while( have_posts() ) : the_post(); $more = 0; ?>
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
                <?php wp_reset_query(); ?>
        	</div>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
</div>
<?php get_footer() ?>