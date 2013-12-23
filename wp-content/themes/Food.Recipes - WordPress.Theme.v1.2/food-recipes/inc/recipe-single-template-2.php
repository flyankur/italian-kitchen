						<div id="left-area" class="clearfix full-wide hrecipe" itemscope itemtype="http://schema.org/Recipe">
                        		
                                <!-- Starting Default Loop -->
								<?php if (have_posts()) while (have_posts()) : the_post(); ?>
		                                
                                        <h1 class="title fn" itemprop="name" ><?php the_title(); ?></h1>
										<!-- for Schema.org microdata -->									
										<meta itemprop="datePublished" content="<?php the_time('Y-m-d'); ?>" /> 
										<span class="published"><?php the_time('Y-m-d'); ?></span>
										<meta itemprop="image" content="<?php 
																		$image_id = get_post_thumbnail_id();
																		$image_url = wp_get_attachment_image_src($image_id,'recipe-listing', true);
																		echo $image_url[0];
																		?>" />
										
										
										<!-- Recipe Categorization Information -->
										<ul class="recipe-cat-info clearfix">
											<li>
												<?php echo get_the_term_list( $post->ID, 'cuisine', __('Cuisine: ', 'FoodRecipe'), ', ', ''); ?>
											</li>
											<li>
												<?php echo get_the_term_list( $post->ID, 'course', __(' Course: ', 'FoodRecipe'), ', ', ''); ?>
											</li>
											<li>
												<?php echo get_the_term_list( $post->ID, 'skill_level', __('Skill Level: ', 'FoodRecipe'), ', ', ''); ?>
											</li>
										</ul>
										
                                        
										<?php 												
																				
										$recipe_images = get_post_meta($post->ID, 'RECIPE_META_more_images_recipe');
										$images_count = count($recipe_images);
										if($images_count > 0) 
										{
											?>			                                        
											<div class="single-imgs">
													
													<div class="single-img-box">
															<div class="recipe-single-img">
																	<a href="<?php $firstimgpath = wp_get_attachment_image_src( $recipe_images[0], 'full-size', false ); echo $firstimgpath[0]; ?>" data-rel="prettyphoto"><?php echo wp_get_attachment_image($recipe_images[0], 'thumbnail-blog', false, array( 'class' => 'photo' )); ?></a>
															</div>
													</div>
													
													<div id="horiz_container_outer" class="small-img-cont">
															<ul id="horiz_container" class="small-imgs">
																	<?php																		
																	foreach($recipe_images as $image)
																	{
																			?>
																			<li>
                                                                            	<?php
                                                                                	$image_attributes = wp_get_attachment_image_src( $image, 'thumbnail-blog');
																					$image_fullsize = wp_get_attachment_image_src( $image, 'full-size');
																				?>
																				<a data-rel="<?php echo $image_attributes[0]; ?>" data-ppurl="<?php echo $image_fullsize[0]; ?>">
																					<?php echo wp_get_attachment_image($image, 'single-carousel-thumb'); ?>
																				</a>
																			</li>
																			<?php
																	}																						
																	?>
															</ul>
															<div class="carnav">
																	<span class="left"></span>
																	<span class="right"></span>
															</div>
													</div>
											</div>
											
											<?php 
										} 
										elseif(has_post_thumbnail()) 
										{
												?>
												<div class="single-imgs">
													<div class="single-img-box">
															<a  rel="prettyPhoto" title="<?php the_title(); ?>" 
																href="<?php 
																		$image_id = get_post_thumbnail_id();
																		$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																		echo $image_url[0];
																		?>">					                                                	
																<?php the_post_thumbnail('thumbnail-blog', array( 'class'	=> 'photo' )); ?>
															</a>
													</div>
													<div id="horiz_container_outer" class="small-img-cont">
															<p class="info-msg msg-error"><span><?php _e('No more images found for this recipe!', 'FoodRecipe'); ?></span></p>
													</div>
												</div>
												<?php
										}
										 																		
										?>
										
										<!-- Recipe Information -->
										<ul class="recipe-info clearfix">
											  <?php
									
												$yield = get_post_meta($post->ID, 'RECIPE_META_yield', true); 	
												$servings = get_post_meta($post->ID, 'RECIPE_META_servings', true);									
												
												$prep_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_prep_time', true)); 
												$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
												$ready_in = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_ready_in', true));	
												
												if(!empty($yield))
												{
														?>
														<li class="yield">
															<strong class="name"><?php _e('Yield :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $yield; ?></span>
														</li>
														<?php
												}
												
												if(!empty($servings))
												{
														?>
														<li class="servings">
															<strong class="name"><?php _e('Servings :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $servings; ?></span>
														</li>
														<?php
												}
												
												if(!empty($prep_time))
												{
														?>
														<li class="prep-time">
															<strong class="name"><?php _e('Prep Time :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $prep_time; ?></span>
														</li>
														<?php
												}
												
												if(!empty($cook_time))
												{
														?>
														<li class="cook-time">
															<strong class="name"><?php _e('Cook Time :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $cook_time; ?></span>
														</li>
														<?php
												}
												
												if(!empty($ready_in))
												{
														?>
														<li class="ready-in">
															<strong class="name"><?php _e('Ready In :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $ready_in; ?></span>
														</li>
														<?php
												}
												
												?>
										</ul>
										
										<span class="w-pet-border"></span>
										
										<div class="info-left instructions" itemprop="about">

												<?php the_content(); ?>

												<div class="recipe-tags clearfix">
														<span class="type"><?php echo get_the_term_list( $post->ID, 'recipe_type', __(' Recipe Type: ', 'FoodRecipe'), ', ', ''); ?></span>
														<span class="tags"><?php the_tags(__('Tags: ', 'FoodRecipe'),', ',''); ?> </span>
														<span class="ingredient"><?php echo get_the_term_list( $post->ID, 'ingredient', __(' Ingredients: ', 'FoodRecipe'), ', ', ''); ?></span>
														<!-- Share Icons -->
                                                        <?php
                                                        $social_check = ot_get_option('recipe_show_social_icons');
                                                        if($social_check == 'show_social')
                                                            get_template_part('inc/share');
                                                        ?>
												</div>
																									
												<span class="w-pet-border"></span>

                                        <?php
                                                if (!get_comments_number()==0) {
                                                    ?>
                                                    <h3 class="blue"><?php _e('Recipe Comments ', 'FoodRecipe');?></h3>
                                                    <?php
                                                }
                                        ?>

                                            <div class="comments">
				                                		<?php comments_template('',true); ?>
				                                </div><!-- end of comments div -->
										
										</div><!-- end of info-left div -->

                                        <div class="info-right">

                                            <!-- Cook Info -->
                                            <?php get_template_part('inc/cook-info'); ?>

                                            <!-- Rating Icons -->
                                            <?php get_template_part('inc/rating'); ?>

                                            <!-- Including More Recipres part -->
                                            <?php get_template_part('inc/more-recipes-loop'); ?>

                                            <!-- Including Nutritional Info part -->
                                            <?php get_template_part('inc/nutritional-info'); ?>

                                            <?php if ( ! dynamic_sidebar( 'Recipe Right Area Ads' )) : endif; ?>

                                        </div><!-- end of info-right div -->

                                        
										<span class="w-pet-border"></span>
										
								<?php endwhile; ?>
						</div><!-- end of left-area -->