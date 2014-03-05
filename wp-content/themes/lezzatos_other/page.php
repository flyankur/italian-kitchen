<?php get_header(); ?>
<div id="content-wrapper">
		<div class="container">
    	<!-- ********** content *********** -->
             		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
					<?php the_content(); ?>  
                    <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                    <?php endwhile; else: ?>  
                    <h2>Woops...</h2>  
                    <p><?php echo __('Sorry, no posts found.','Lezzatos'); ?></p>  
                    <?php endif; ?>  
        <!-- ********** close content *********** -->
<?php get_footer(); ?>