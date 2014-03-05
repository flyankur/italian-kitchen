<?php
/* Template Name: Page with sidebar (right) */
get_header(); 
$sb = get_post_meta($post->ID, 'my_select_1', true);
?>
<div id="content-wrapper">
		<div class="container">
    	<!-- ********** content *********** -->
         <?php if($sb=="None"){
			 echo '<div class="sixteen columns">';
			 }else{
			 echo '<div class="twelve columns">';	 
			 }?>
             		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
					<?php the_content(); ?>  
                    <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
                    <?php endwhile; else: ?>  
                    <h2>Woops...</h2>  
                    <p><?php echo __('Sorry, no posts found.','Lezzatos'); ?></p>  
                    <?php endif; ?>  
        <!-- ********** close content *********** -->
       </div>
       
            <?php if($sb!="None"){
			 echo '<div class="four columns">';	
				dynamic_sidebar( $sb );
			 echo '</div>' ;
			 }?> 
<?php get_footer(); ?>