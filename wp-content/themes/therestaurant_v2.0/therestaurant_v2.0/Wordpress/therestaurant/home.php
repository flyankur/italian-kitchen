<?php $theme_options = get_option('therestaurant');
global $more;
get_header(); ?>
    <div id="content-top"></div>
	<?php if ($theme_options["cp_fronttext_show"] == 'text' || $theme_options["cp_fronttext_show"] == 'both') { ?>
	<div id="content-border">
        <div id="content">
        	<div id="fronttext-devider1"></div>
            <div id="fronttext-devider2"></div>
            <?php for ($i=1;$i<4;$i++) { ?>
                <div class="fronttext">
                    <?php
                    $title = stripslashes(__($theme_options['cp_fronttext'.$i.'_title']));
                    $img = $theme_options['cp_fronttext'.$i.'_img'];
                    $text = stripslashes(__($theme_options['cp_fronttext'.$i.'_text']));
                    $url = $theme_options['cp_fronttext'.$i.'_url'];
                    ?>
                    <div class="title-container">
                        <div class="bar-left"></div>
                        <div class="bar-right"></div>
                        <div class="bar-bg"></div>
                        <div class="title">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                    <div class="frontcontent-container">
                        <?php if ($img) { ?>
                            <div class="postimage-container">
                                <div class="postimage">
                                	<?php if ($url) { ?><a href="<?php echo $url; ?>" title="<?php echo $title; ?>" rel="bookmark"><?php } ?>
                                        <img class="load" src="<?php echo $img; ?>" alt="<?php echo $title; ?>" />
                                    <?php if ($url) { ?></a><?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="frontcontent">
                            <p><?php echo $text; ?></p>
                        </div>
                        <?php if ($url) { ?>
                            <div class="readmore">
                                <a href="<?php echo $url; ?>" title="<?php echo $title; ?>" rel="bookmark">Read more</a>
                            </div>
                        <?php } ?>
                    </div>
                </div><!-- .fronttext -->
        	<?php } ?>
        </div><!-- #content -->
	</div>
    <div id="content-bottom"></div>
    <?php }
    if ($theme_options["cp_fronttext_show"] == 'widgets' || $theme_options["cp_fronttext_show"] == 'both') { ?>
    <div id="widget-border">
        <div id="frontwidgets">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('frontpage') ) :
            endif; ?>
        </div><!-- #content -->
	</div>
    <div id="widget-bottom"></div>
    <?php } ?>
<?php get_footer() ?>