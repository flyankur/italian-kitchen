<?php get_header(); ?>

       	<?php $btn_visit = get_option('DE_btn_view '); ?>
   		<?php $btn_more_images = get_option('DE_btn_more_images');?>

        
        <div id="content">
        <?php echo __('Page not found!','Lezzatos'); ?>
        
        <?php if($req=="unpassed"):  ?>
        <?php if ( ! isset( $content_width ) ) $content_width = 900; ?>
		 <?php wp_list_comments( $args ); ?>
         <?php wp_link_pages( $args ); ?>
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php paginate_comments_links(); ?>
          <?php comment_form(); ?>
          <?php  posts_nav_link(); ?>
          <?php add_theme_support( 'automatic-feed-links' ); ?>
          <?php dynamic_sidebar( $index ); ?> 
          <?php the_tags( $before, $sep, $after ); ?>
         <?php endif; ?>

    	<div class="clear"></div>
		</div>
        
        <!-- ********** close content *********** -->
<?php get_footer(); ?>