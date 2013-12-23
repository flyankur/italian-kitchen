<?php get_header(); ?>
						<div id="left-area" class="clearfix">
                        		<?php
									if (have_posts()): 
										while (have_posts()) : 
											the_post(); 
										
											$post_type = get_post_type( $post->ID );
											if($post_type == 'recipe')
											{
												get_template_part( 'inc/recipe-post' );											
											}
											else
											{
												get_template_part( 'inc/standard-post' );
											}
										
										endwhile;
									else : 
								?>
								
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Post Found !', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
                                
								<?php endif; ?>
								
								<?php 
									// Pagination
									theme_pagination( $wp_query->max_num_pages); 					
								?>                
						</div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
	
	<?php get_sidebar(); ?>


<?php get_footer(); ?>