<?php get_header(); ?>
						<div id="left-area" class="clearfix">
                        		
							<?php $curauth = $wp_query->get_queried_object(); ?>
							
							<div class="chef-profile">
								
								<h1><?php _e('Chef', 'FoodRecipe');?> <span><?php echo $curauth->display_name; ?></span></h1>
								
								<?php
								// Chef Photo
								$photo_link = get_the_author_meta( 'photo',$curauth->ID );
								if(!empty($photo_link))	
								{				
									?>									
									<img class="auth-photo" src="<?php echo $photo_link; ?>" alt="<?php echo $curauth->display_name; ?>" />
									<?php
								}
								
								
								if(!empty($curauth->user_description))	
								{
									?>															
									<div class="auth-intro">
										<h3><?php _e('Short Bio', 'FoodRecipe');?></h3>
										<p><?php echo $curauth->user_description; ?></p>
									</div>	                                							
									<?php
								}
								
								$twitter_author_link = get_the_author_meta( 'twitter',$curauth->ID );
								$facebook_author_link = get_the_author_meta( 'facebook',$curauth->ID );
								$google_author_link = get_the_author_meta( 'google',$curauth->ID );
								
								if(!empty($twitter_author_link))	
								{				
									?>									
									<div class="auth-meta">
										<h5 class="auth-title"><?php _e('Twitter','FoodRecipe'); ?></h5>
										<span class="auth-value"><a class="twitter" href="<?php echo $twitter_author_link; ?>"><?php echo str_replace('http://','',str_replace('https://','',$twitter_author_link)); ?></a></span>
									</div>
									<?php
								}
								
								if(!empty($facebook_author_link))	
								{		
									?>									
									<div class="auth-meta">
										<h5 class="auth-title"><?php _e('Facebook','FoodRecipe'); ?></h5>
										<span class="auth-value"><a class="facebook" href="<?php echo $facebook_author_link; ?>"><?php echo str_replace('http://','',str_replace('https://','',$facebook_author_link)); ?></a></span>
									</div>
									<?php
								}
								
								if(!empty($google_author_link))	
								{				
									?>
									<div class="auth-meta">
										<h5 class="auth-title"><?php _e('Google','FoodRecipe'); ?></h5>
										<span class="auth-value"><a class="google" rel="me" href="<?php echo $google_author_link; ?>"><?php echo str_replace('http://','',str_replace('https://','',$google_author_link)); ?></a></span>
									</div>
									<?php
								}	
								
								$desc = get_the_author_meta( 'desc',$curauth->ID ); 
								
								if(!empty($desc))	
								{				
									?>
									<span class="w-pet-border"></span>
									<div class="auth-desc">
											<h2><?php _e('Detail Bio', 'FoodRecipe');?></h2>
											<?php echo $desc; ?>
									</div>
									<?php
								}
								?>
							</div>	
							
							<span class="w-pet-border"></span>
							
							<h1><?php _e('All Recipes and Posts by', 'FoodRecipe') ?> <span><?php echo $curauth->display_name; ?></span></h1>
							
							<?php
                            //$author_name = $wp_query->get('author_name');
                            //$postcount = $wp_query->post_count;
                            // print_r($wp_query);
							// to add recipe post type in default query and update posts_per_page accordingly to avoid 404 error 
							//global $wp_query;
							//$old_max_num_page = intval($wp_query->max_num_pages);
                            //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            //$auquery = new WP_Query(array( 'author_name' => $author_name, 'post_type' => array( 'post', 'recipe'), 'posts_per_page' => $postcount, 'paged' => $paged ) );
                            //$args = array_merge( $wp_query->query, array( 'post_type' => array( 'post', 'recipe'),'paged' => $paged ) );
							//query_posts( $args );
							/*$new_found_posts = intval($wp_query->found_posts);
							if($old_max_num_page > 0)
							{
								$posts_per_page  = intval(ceil($new_found_posts / $old_max_num_page));
							}
							else
							{
								$posts_per_page  = $new_found_posts ;	
							}									
							$args = array_merge( $wp_query->query, array( 'posts_per_page' => $posts_per_page ) );										
							query_posts( $args );
							*/
							?>
							
							<span class="w-pet-border"></span>
                        		
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
									<h2 class="post-title"><?php _e('No Recipe or Post Data Found', 'FoodRecipe') ?></h2>
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
