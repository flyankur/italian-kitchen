<?php get_header(); ?>
						<div id="left-area" class="clearfix">
                        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                
								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h1 class="single-post-title"><?php the_title(); ?></h1>
										<p class="meta"><?php _e('By', 'FoodRecipe'); ?> : <?php the_author_posts_link() ?> <span>|</span> <span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> On : <?php the_time('F j, Y'); ?> <span>|</span> <?php _e('Category', 'FoodRecipe'); ?> : <span class="cats"><?php the_category(', '); ?></span></p>
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
										the_content();
										
										?>
								</div><!-- end of post div -->
								<?php wp_link_pages(array('before' => '<div class="pages-navigation"><strong>'.__('Pages &nbsp;', 'FoodRecipe').'</strong> ', 'after' => '</div>', 'link_before' => '<span>',	'link_after' => '</span>', 'next_or_number' => 'number')); ?>
                                
								<?php endwhile; ?>
							
                            	<?php else : ?>
								
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Post Found', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
                                
								<?php endif; ?>
                                
                                <div class="comments">
                                		<?php comments_template('',true); ?>
                                </div><!-- end of comments div -->
                                
                                
						</div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
	
	<?php get_sidebar(); ?>


<?php get_footer(); ?>