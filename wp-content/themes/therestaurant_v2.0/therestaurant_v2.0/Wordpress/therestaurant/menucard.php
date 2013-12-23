<?php
/*
Template Name: Menu card
*/
?>
<?php global $more, $post, $wpdb;
$theme_options = get_option('therestaurant');
get_header();
//if page is a category
if ($cat_ID) {
	$sql = "SELECT DISTINCT p.ID, p.post_title, pm2.meta_value AS mc_categories FROM " . $wpdb->posts . " AS p ";
	$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = '_wp_page_template') ";
	$sql .= "AS pm ON p.ID = pm.post_id ";
	$sql .= "LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " WHERE meta_key = 'categories') ";
	$sql .= "AS pm2 ON p.ID = pm2.post_id ";
	$sql .= "WHERE pm.meta_value = 'menucard.php' ";
	$rows = $wpdb->get_results($sql,OBJECT);
	foreach($rows as $row) {
		$mc_categories = explode(',', $row->mc_categories);
		if (in_array($cat_ID, $mc_categories)) {
			$pagetitle = __($row->post_title);
			$theme_options["cp_menucard_cat"] = $row->mc_categories;
		}
	}
}
else {
	//if page is a.. page
	$pagetitle = get_the_title();
	$pageid = $post->ID;
	$theme_options["cp_menucard_cat"] = get_post_meta($pageid, "categories", true);
}
?>
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
            <a href="" id="card-prev"></a>
            <a href="" id="card-next"></a>
            <?php 
            if ($cat_ID > 0) {
				$card_cats = explode(',',$theme_options["cp_menucard_cat"]);
				$count = 1;
				for ($x=0; $x < count($card_cats); $x=$x+2) {
					for ($i=0;$i<2;$i++) { 
						$array_location = $x+$i;
						if ($cat_ID == $card_cats[$array_location]) {
							$activepage = $count;
						}
					}
					$count++;
				}
			} else {
				$activepage = 1;
			}?>
            <div id="card-container" activepage="<?php echo $activepage; ?>">
            	<div id="card-slider">
					<?php $card_cats = explode(',',$theme_options["cp_menucard_cat"]);
					$count = 1;
                    for ($x=0; $x < count($card_cats); $x=$x+2) { ?>
						<div id="cardpageid-<?php echo $count; ?>" class="card-page">
                        	<div class="menucard-devider"></div>
                        	<?php for ($i=0;$i<2;$i++) { 
                            	$array_location = $x+$i;
								if (isset($card_cats[$array_location])) { ?>
                                    <div class="card-cat" id="cardcatid-<?php echo $card_cats[$array_location]; ?>" catid="<?php echo $card_cats[$array_location]; ?>">
                                        <h2><?php echo get_cat_name($card_cats[$array_location]); ?></h2>
                                        <?php $child_cats = get_categories('child_of='.$card_cats[$array_location]);
										$cat_array = '';
										foreach ($child_cats as $child_cat) {
											if ($cat_array != '') {
												$cat_array .= ',';
											}
											$cat_array .= '-'.$child_cat->term_id;
										}
										query_posts('cat='.$card_cats[$array_location].','.$cat_array.'&showposts=-1');
                                        if ( have_posts() ) : while ( have_posts() ) : the_post(); $more = 0; ?>
                                            <div class="card-item">
                                            	<?php if (has_post_thumbnail()) { ?>
                                                <div class="item-img">
                                                	<div class="item-img-border">
                                                    	<div class="item-img-border2">
                                                			<?php the_post_thumbnail('menucard_thumb'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <div class="item-text <?php if (!has_post_thumbnail()) { echo 'item-text-wide'; } ?>">
													<?php $postlink = get_post_meta($post->ID, "postlink", true);
                                                    if ($postlink) { ?>
                                                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">
                                                    <?php } ?>
                                                    <div class="name"><?php the_title() ?></div>
                                                    <?php if ($postlink) { ?>
                                                    </a>
                                                    <?php }
													$description = get_post_meta($post->ID, "description", true);
                                                    if ($description) { ?>
                                                        <div class="description"><?php echo $description; ?></div>
                                                    <?php } ?>
                                            	</div>
                                                <?php $itemprice = get_post_meta($post->ID, "price", true);
												if ($itemprice) { ?>
                                                <div class="price"><?php echo $itemprice; ?></div>
                                                <?php } ?>
                                            </div>
                                        <?php endwhile; endif;
                                        wp_reset_query();
										if ($child_cats) { 
											foreach ($child_cats as $child_cat) { ?>
												<h3><?php echo __($child_cat->cat_name); ?></h3>
                                        		<div class="devider"></div>
												<?php query_posts('cat='.$child_cat->term_id.'&showposts=-1');
												if ( have_posts() ) : while ( have_posts() ) : the_post(); $more = 0; ?>
													<div class="card-item">
                                                        <?php if (has_post_thumbnail()) { ?>
                                                        <div class="item-img">
                                                            <div class="item-img-border">
                                                                <div class="item-img-border2">
                                                                    <?php the_post_thumbnail('menucard_thumb'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <div class="item-text <?php if (!has_post_thumbnail()) { echo 'item-text-wide'; } ?>">
                                                            <?php $postlink = get_post_meta($post->ID, "postlink", true);
                                                            if ($postlink) { ?>
                                                            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">
                                                            <?php } ?>
                                                            <div class="name"><?php the_title() ?></div>
                                                            <?php if ($postlink) { ?>
                                                            </a>
                                                            <?php }
                                                            $description = get_post_meta($post->ID, "description", true);
                                                            if ($description) { ?>
                                                                <div class="description"><?php echo $description; ?></div>
                                                            <?php } ?>
                                                        </div>
                                                        <?php $itemprice = get_post_meta($post->ID, "price", true);
                                                        if ($itemprice) { ?>
                                                        <div class="price"><?php echo $itemprice; ?></div>
                                                        <?php } ?>
                                                    </div>
												<?php endwhile; endif;
												wp_reset_query();
											}
										} ?>
                                    </div>
								<?php }
							} ?>
                        </div>
                    	<?php $count++;
					} ?>
            	</div>
            </div>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
<?php get_footer() ?>