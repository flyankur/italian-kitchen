<?php
/*
Template Name: Gallery
*/
?>
<?php global $more, $wp_query, $wpdb; ?>
<?php $theme_options = get_option('therestaurant'); ?>
<?php get_header() ?>
<?php 
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
	$pageid = $wp_query->post->ID;
	$categories = get_post_meta($pageid, "categories", true);
	$number = get_post_meta($pageid, "number", true);
}
?>
<div id="gallery">
    <div id="content-top"></div>
    <div id="content-border">
        <div id="content">
            <div class="title-container">
                <div class="bar-left"></div>
                <div class="bar-right"></div>
                <div class="bar-bg"></div>
                <div class="title">
                    <h1 class="post-title"><?php echo $pagetitle; ?></h1>
                </div>
            </div>
            <div id="post-container">
				<?php $count = 1;
				$paged = intval(get_query_var('paged'));
                query_posts('&cat='.$categories.'&posts_per_page='.$number.'&paged='.$paged );
                while( have_posts() ) : the_post(); $more = 0; ?>
				<div class="gal_item">
                    <div class="post-img">
                    	<div class="post-img-border">
                        <?php if (has_post_thumbnail()) {
							the_post_thumbnail('gallery_thumb');
						} ?>
                        </div>
                    </div>
                	<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark"><?php the_title() ?></a></h2>
                    <div class="post-content">
                        <?php the_content(''); ?>
                    </div>
                    <div class="readmore">
                    	<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">Read more</a>
                    </div>
                </div>
                <?php if ($count % 3 == 0) { ?>
                    <div class="gal-devider"></div>
                <?php }
                $count++; ?>
                <?php endwhile ?>
        	</div>
        </div><!-- #content -->
    </div>
    <div id="content-bottom"></div>
    <div id="nicepagination">
    	<?php nicepagination($wp_query, $pageid); ?>
    </div>
    <?php wp_reset_query(); ?>
</div>
<?php get_footer() ?>