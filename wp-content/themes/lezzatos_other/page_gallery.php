<?php
/**
* Template Name: Gallery
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

window.onresize = function(event) {
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
                $terms = get_terms( 'gallery_categories' ); 
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
            
        <div class="clear"></div>
        
        <ul id="gallery" class="pf_gallery gallery">
        <?php 
		$de_data = get_option( 'Lezatos_options' );
		$menu_per_page = $de_data['DE_gallery_per_page'];
		if(!$menu_per_page){
			$menu_per_page = -1;
		}
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> $menu_per_page,	'post_type' => 'gallery','paged' => $paged));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="box four columns<?php
				$terms = get_the_terms( $item->ID, 'gallery_categories' );
				if($terms){
				foreach ( $terms as $term ) { echo ' '.$term->slug. '' . ''; } 
				}
        		?>">
                <div class="pic_hover">
                	<a class="image" href="<?php $image_popup = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $image_popup[0]; ?>" rel="prettyPhoto[gallery]" title="<?php the_title();?>">
				  <span class="overlay"></span><?php echo get_the_post_thumbnail($id, "medium" ); ?></a>
                  <div class="info">
                  <h5><?php the_title(); ?></h5>
                  <?php the_content(); ?>
                </div>
                </div>
            <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?>
           		  <div class="clear"></div>
              </li>
        <?php 		endwhile;	?>
       	
        </ul>
        
    	<div class="clear"></div>
        
        <?php if (function_exists("pagination")) { ?>
    	<div class="sixteen columns">
        <?php pagination(); ?>
        </div>
		<?php } ?>
        
        
         <?php wp_reset_query(); ?> 
		</div>
        </div>
        <!-- ********** close content *********** -->
<?php get_footer(); ?>