  						<!-- SLIDER STARTS HERE -->
						<div id="slider" class="slider2">
								<div class="most-rated">
										<div class="item">
                                        		<?php
													
													$most_rated_args = array(
                                                                'post_type' => 'recipe',
																'posts_per_page' => 1,
																'orderby' => 'meta_value_num',
																'meta_key' => 'rating_counter',
																'order' => 'DESC'
                                                                );
			                                        $most_rated_query = new WP_Query($most_rated_args);
	                                        		if ( $most_rated_query->have_posts() ) 
													while ( $most_rated_query->have_posts() ) : 
													$most_rated_query->the_post();
                                                ?>
												<a href="<?php the_permalink(); ?>" class="img-box"><?php the_post_thumbnail('most-rated-thumb'); ?></a>
												<h5><a href="<?php the_permalink(); ?>"><?php echo word_trim(get_the_title(),5,'...'); ?></a></h5>
												<p><?php echo word_trim(get_the_excerpt(),5,'...'); ?></p>
												<p class="rate">
														<?php the_recipe_rating($post->ID); ?>
												</p>
                                                <?php
													endwhile;
												?>
										</div>
								</div>
								<h2 class="slider-head"></h2>
								<p class="slogan">
                                		<?php 
										if ( function_exists( 'ot_get_option' ) )
										{
											$slider_statement = ot_get_option('l_slider_statement');
											if(!empty($slider_statement))
											{
												echo $slider_statement;
											}
											else
											{
												echo "&nbsp;";
											}
										}										
										?>
                                </p>
								<div class="slides right-slider">
										<ul>
                                        	<?php
												$li_recipe_ids = array();
												
												if ( function_exists( 'ot_get_option' ) )
												{
													  $slides = ot_get_option( 'right_info_slider', array() );
													  
													  if ( ! empty( $slides ) ) {
														  
															  foreach( $slides as $slide ) 
																{	
																	$li_recipe_ids[] = $slide['id'];														
																}
																
																$li_slider_args = array( 'post_type'=> array('post','recipe') , 'posts_per_page' => -1, 'post__in' => $li_recipe_ids );
																$li_slider_query = new WP_Query( $li_slider_args );
																if ( $li_slider_query->have_posts() ) 
																while ( $li_slider_query->have_posts() ) : 
																	$li_slider_query->the_post();
																	?>
																		<li>
																				<a href="<?php the_permalink(); ?>" class="img-box"><?php the_post_thumbnail('li-slider-thumb'); ?></a>
																				<div class="slide-info">
																						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
																						
																						<div class="rating">
																								<?php the_recipe_rating($post->ID); ?>
																								<span><?php _e('Average Rating:', 'FoodRecipe'); ?> <span>(<?php echo get_avg_rating($post->ID); ?> / 5)</span></span>
																						</div>
																						
																						<p><?php echo word_trim(get_the_excerpt(),28,' ...'); ?></p>
																						
																						<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
																				</div>
																		</li>
																	<?php
																	endwhile;
													  
													  }
												}
																		
												?>
										</ul>
										<p class="sliderNav"><span></span></p>
								</div><!-- end of slides -->
						</div><!-- end of Slider div -->
						<!-- SLIDER AREA ENDS HERE -->