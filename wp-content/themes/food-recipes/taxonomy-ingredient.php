<?php get_header(); ?>
						<div id="left-area" class="clearfix">					
									
								<h1>
								<?php 
									$current_term = get_term_by( 'slug', get_query_var('term') ,'ingredient' );								
									echo __('Recipes With Ingredient:','FoodRecipe').' <span>'.$current_term->name.'</span>'; 
								?>
								</h1>
								
								<span class="w-pet-border"></span>
								<?php 								
									if (have_posts()): 
										while (have_posts()) : 
											the_post(); 
											
												get_template_part( 'inc/recipe-post' );											
																						
										endwhile;  
									else : 
								?>
								
								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Recipe Found !', 'FoodRecipe') ?></h2>
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
