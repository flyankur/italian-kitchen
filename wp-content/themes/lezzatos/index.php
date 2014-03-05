<?php get_header(); ?>
		<?php if(!is_home()): ?>

 		<div id="content-wrapper">
        <div class="container">
		 <?php if($sb=="None"){
			 echo '<div class="sixteen columns">';
			 }else{
			 echo '<div class="twelve columns">';	 
			 }?> 	 
            <ul id="bloglist">
            <?php 
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
			
		    if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <li>
                                	<?php the_post_thumbnail('full'); ?>
                                    <div class="date">
                                      <h4><?php echo get_the_time('d') ?></h4>
                                      <span><?php $month = substr( get_the_time('F'), 0, 3 ); echo $month; ?></span> 
                                    </div>
                                    <div class="text">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      
                      <div class="blog-content">
                      
                      <?php $file = get_post_meta($post->ID, 'main_pic', true); ?>
                      <?php if($file!=''){ ?>
                      <img class="blogpic" src="<?php echo $file ?>" />
                      <?php } ?>
                      <?php $vid = get_post_meta($post->ID, 'extra_url', true); ?>
                      <?php if($vid!=''){ ?>
                      <iframe src="<?php echo $vid ?>" frameborder="0" width="580" height="435" allowfullscreen></iframe>
                      <?php } ?>
                      <?php echo content(45);?>
                      <div class="blog-info">
                  	<span class="by"><?php echo __('By','Lezzatos'); ?> <?php the_author(); ?></a></span><span class="separator">|</span><span class="cat"><a href="style/#link"><?php the_category(', ') ?></a></span><span class="separator">|</span><span class="comment-count"><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></span><span class="readmore-span"><a href="<?php the_permalink(); ?>" class="readmore-align-right"><?php echo __('Read More','Lezzatos'); ?></a></span>
                    <div class="clear"></div>
                </div>
                      </div>
                        <?php	edit_post_link(esc_html__('Edit this entry.', 'photogra'), '<p class="editLink">', '</p>'); ?><br />
                        </div>
                    </li>
            <?php 		endwhile;endif; 	?>
            <?php if (function_exists("pagination")) {
            pagination(); } ?>
             <?php wp_reset_query(); ?> 
            </ul>
            </div>
            <?php 
				$de_data = get_option( 'Lezatos_options' ); 
				$sb_blog =  $de_data ['DE_blog_sidebar'];
			 if($sb_blog!="None"){
			 echo '<div class="four columns">';	
				dynamic_sidebar( $sb_blog );
			 echo '</div>' ;
			 }?> 
        
    	<div class="clear"></div>
		</div>
        </div>
       <?php endif; ?>

        <!-- ********** close content *********** -->
<?php get_footer(); ?>
