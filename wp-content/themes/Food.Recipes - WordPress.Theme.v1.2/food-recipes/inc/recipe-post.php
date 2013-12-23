								<div <?php post_class('recipe-listing-item clearfix'); ?> id="post-<?php the_ID(); ?>">
																		
										<?php 
												if(has_post_thumbnail()) 
												{
													?>
			                                        <div class="post-thumb single-img-box">
															<a rel="prettyPhoto" title="<?php the_title(); ?>" href="<?php $image_id = get_post_thumbnail_id();
																	$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																	echo $image_url[0];
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
													<span class="tags"><?php the_tags(__('Tags: ', 'FoodRecipe'),', ',''); ?> </span>
												</div>
												
												<div class="rating">
														<?php the_recipe_rating($post->ID); ?>
														<span><?php _e('Average Rating:', 'FoodRecipe'); ?> <span>(<?php echo get_avg_rating($post->ID); ?> / 5)</span></span>
												</div>
												
												<p><?php echo word_trim(get_the_excerpt(),20,' ...'); ?></p>
												
												<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
										</div>
								</div><!-- end of post div -->