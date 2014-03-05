<?php
/**
* Template Name: Menu grid filterable
*
*/
?> 
<?php get_header(); ?>
<script type="text/javascript">
window.onload = function(event) { 
    jQuery('#gallery').isotope({
      itemSelector: '.box',
      // set columnWidth a fraction of the container width
    });
  };	
</script>


       	<div id="content-wrapper">
		<div class="container">
        
        <div id="filters" class="sixteen columns">
            	<ul>
                <li><a href="" data-filter="*" class="selected">All</a></li>
				<?php
                $terms = get_terms( 'menu_category' ); 
                $count_terms = count( $terms );
                ?>	
                <?php if ( $count_terms > 0 ) { ?>
                    <?php foreach ( $terms as $term ) { ?>
                        <li>
                            <a href="" data-filter=".<?php echo $term->slug; ?>">
                                <span class="cat-name"><?php echo $term->name; ?></span>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
                </ul>            
            </div>
        
        <div class="sixteen columns">
        <ul id="gallery" class="menu-grid-view">
        <?php 
		$de_data = get_option( 'Lezatos_options' );
		$menu_per_page = $de_data['DE_menu_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $menu_per_page, 'post_type' => 'menu','paged' => $paged));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="box <?php
				$terms = get_the_terms( $item->ID, 'menu_category' );
				if($terms){
				foreach ( $terms as $term ) { echo ' '.$term->slug. '' . ''; } 
				}
        		?>">
              	

                <div class="pic_hover">
                	
                      
                	<a class="image" href="<?php the_permalink() ?>">
				  <span class="overlay"></span><?php echo get_the_post_thumbnail($id, 'medium' );  ?></a>
                </div>
                  <div class="menu-info-b">
                      <h4><?php the_title();?></h4>
                      <?php if(get_post_meta($post->ID, 'price', true)): ?>
                      <div class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
                      <?php endif; ?>
                  </div>
                  
            <?php	edit_post_link(esc_html__('Edit this entry.', 'lezzatos'), '<p class="editLink">', '</p>'); ?>
           		  <div class="clear"></div>
              </li>
        <?php 		endwhile;	?>
        </ul>
        </div>
        
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