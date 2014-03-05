<?php
/**
* Template Name: Menu thumbnail view
*
*/
?> 
<?php get_header(); ?>
<script type="text/javascript">
window.onload = function(event) {
    $('#menu-thumbnail-view').masonry({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };	

window.onresize = function(event) {
    $('#menu-thumbnail-view').masonry({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };

</script>


       	<div id="content-wrapper">
		<div class="container">
        <ul id="menu-thumbnail-view">
        <?php 
		$de_data = get_option( 'Lezatos_options' );
		$menu_per_page = $de_data['DE_menu_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $menu_per_page,	'post_type' => 'menu','paged' => $paged));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="box">
              	 <a class="read_more_menu" href="<?php the_permalink(); ?>">
              	 <span class="menu-text-expand">
                      <?php echo content(20); ?>
                 </span> 
                 </a>

                <div class="pic_hover">
                	
                      <?php if(get_post_meta($post->ID, 'price', true)): ?>
                      <div class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
                      <?php endif; ?>
                      
                	<a class="image" href="<?php echo get_post_meta($post->ID, 'main_pic', true); ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
				  <span class="rollover"></span><?php echo get_the_post_thumbnail($id, array(150,150) );  ?></a>
                </div>
                <div class="menu-info-b">
                      <h4><?php the_title();?></h4>
                  </div>
                  
            <?php	edit_post_link(esc_html__('Edit this entry.', 'lezzatos'), '<p class="editLink">', '</p>'); ?>
           		  <div class="clear"></div>
              </li>
        <?php 		endwhile;	?>
        </ul>
        
        <?php if (function_exists("pagination")) {
    	echo '<div class="sixteen columns">';
		pagination();
		echo '</div>';
		} ?>
        <?php wp_reset_query(); ?> 
        
    	<div class="clear"></div>
		</div>
        </div>
        <!-- ********** close content *********** -->
<?php get_footer(); ?>