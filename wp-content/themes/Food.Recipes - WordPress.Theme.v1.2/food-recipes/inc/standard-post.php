								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
								
										<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'FoodRecipe'), get_the_title()); ?>"><?php the_title(); ?></a></h1>
										<p class="meta"><?php _e('By: ', 'FoodRecipe'); the_author_posts_link(); ?> <span>|</span> <span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> <?php _e('On: ', 'FoodRecipe'); the_time('F j, Y'); ?> <span>|</span> <?php _e('Category', 'FoodRecipe'); ?> : <span class="cats"><?php the_category(', '); ?></span></p>
										<?php 
											if(has_post_thumbnail()) 
											{
												?>
		                                        <div class="post-thumb single-img-box">
														<a rel="prettyPhoto" title="<?php the_title(); ?>" href="<?php $image_id = get_post_thumbnail_id();
																$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																echo $image_url[0];
														?>">
		                                                		<?php the_post_thumbnail('thumbnail-blog'); ?>
		                                                </a>
												</div>
		                                        <?php
											}
										?>
                                        <p>
                                        <?php
										echo word_trim(get_the_excerpt(), 50, '...');
										?>
                                        </p>
										<a href="<?php the_permalink(); ?>" class="readmore rightbtn"><?php _e('Read more', 'FoodRecipe'); ?></a>
								</div><!-- end of post div -->