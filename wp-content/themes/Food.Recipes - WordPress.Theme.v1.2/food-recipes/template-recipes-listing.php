<?php 
/*
* Template Name: Recipes Listing Template 
*/ 
get_header(); ?>
						<div id="left-area" class="clearfix">
								<h1><?php the_title(); ?></span></h1>
                                <span class="w-pet-border"></span><br />
                        		<?php
                                     if ( function_exists( 'ot_get_option' ) ) {
                                         $recipes_per_page = ot_get_option('recipes_per_page_listing');
                                         if(empty($recipes_per_page)) { $recipes_per_page = 6; }
                                     }
									$recipe_args = array( 'post_type'=>'recipe', 'posts_per_page' => $recipes_per_page, 'paged' => $paged );
									
									$recipe_query = new WP_Query( $recipe_args );
									
									if ( $recipe_query->have_posts() ) :
											while ( $recipe_query->have_posts() ) : 
											$recipe_query->the_post(); 	
								?>
                                
								<div <?php post_class('recipe-listing-item clearfix'); ?> id="post-<?php the_ID(); ?>">
																		
										<?php 
												if(has_post_thumbnail($post->ID)) 
												{
													?>
			                                        <div class="post-thumb single-img-box">
															<a rel="prettyPhoto" title="<?php the_title(); ?>" href="<?php 
																	$image_id = get_post_thumbnail_id();
																	if($image_id)
																	{
																		$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																		echo $image_url[0];
																	}
															?>">
			                                                		<?php the_post_thumbnail('recipe-listing'); ?>
			                                                </a>
													</div>
		                                        	<?php
												}										
										?>
										<div class="recipe-info">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												
												<div class="recipe-tags">
													<span class="type"><?php echo get_the_term_list( $post->ID, 'recipe_type', __(' Recipe Type: ', 'FoodRecipe'), ', ', ''); ?></span>
													<span class="cuisine"><?php echo get_the_term_list( $post->ID, 'cuisine', __(' Cuisine: ', 'FoodRecipe'), ', ', ''); ?></span>
												</div>
												
												<div class="rating">
														<?php the_recipe_rating($post->ID); ?>
														<span><?php _e('Average Rating:', 'FoodRecipe'); ?> <span>(<?php echo get_avg_rating($post->ID); ?> / 5)</span></span>
												</div>
												
												<p><?php echo word_trim(get_the_excerpt(),15,' ...'); ?></p>
												
												<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
										</div>
								</div><!-- end of post div -->
								
								<?php endwhile; ?>
							
                            	<?php else : ?>
								
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Recipes Found', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
                                
								<?php endif; ?>
								
										<?php
											// Pagination
											theme_pagination( $recipe_query->max_num_pages); 					
										?>            
						</div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
						
                        <div id="sidebar">
								<?php if ( ! dynamic_sidebar( 'Recipe Sidebar' )) : ?>
			                            
						        <?php endif; ?>
                        </div>


<?php get_footer(); ?>