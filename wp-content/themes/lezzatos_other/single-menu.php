<?php get_header(); ?>
	<?php $sb = get_post_meta($post->ID, 'my_select_1', true); ?>
    <?php $btn_visit = get_option('DE_btn_view '); ?>
   	<?php $btn_more_images = get_option('DE_btn_more_images');?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 		<div id="content-wrapper">
		<div class="container single-menu">
            
            <!-- ********** menu image *********** -->
            <div class="ten columns pic">
			<?php the_post_thumbnail('full'); ?>
            </div>
            
            <!-- ********** menu info *********** -->
            <div class="six columns">
            <div class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
			<?php
			$this_post = $post->ID;
			$terms = get_the_terms( $post->ID , 'menu_category' );
			foreach ( $terms as $term ) {
			$menu_cat = $term->name;
			}
			?>
            
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
            </div>
            
            <div class="clear"></div>
            
            <!-- ********** related menu *********** -->
            <h4 class="sixteen columns title-related"><?php echo __('You may also like:','Lezzatos'); ?></h4> 
           <ul id="menu-thumbnail-view">
        <?php 
		if(get_option('DE_count_gallery')!=""){
		$pic_count = get_option('DE_count_gallery');
		}else{
		$pic_count = 12;	
		};
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query = new WP_Query(array( 'posts_per_page'=> 6,	'post_type' => 'menu','paged' => $paged, 'menu_category' => $menu_cat,'post__not_in' => array($this_post)));
		while ($wp_query->have_posts()) : $wp_query->the_post();	?>
            
        	  <li class="box">
              	 <a class="read_more_menu" href="<?php the_permalink(); ?>">
              	 <span class="menu-text-expand">
                      <?php echo content(20); ?>
                 </span> 
                 </a>

                <div class="pic_hover">
                	
                      <div class="price"><?php echo get_post_meta($post->ID, 'price', true); ?></div>
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
         <?php wp_reset_query(); ?> 
        </ul>
            
            </div>
        </div>
        	<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/jquery.backstretch.min.js'></script>

        <!-- ********** custom bg *********** -->
        <div class="bg_pattern"></div>
        <div id="background-image">
		<script>
         jQuery.backstretch("<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>");
		 jQuery('#bg-page').hide();
        </script>
		</div>
	<?php endwhile; endif;?>

<?php get_footer(); ?>