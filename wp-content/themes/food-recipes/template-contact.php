<?php 
/*
* Template Name: Contact Us 
*/ 
get_header(); 
?>
						<div id="left-area" class="clearfix">
						
								<h1 class="title"><?php wp_title(''); ?></h1>
						        <?php 
										
										if ( have_posts() ) while ( have_posts() ) : the_post(); 
										
											the_content();
										
										endwhile;

                                        if ( function_exists( 'ot_get_option' ) ) {

                                            $map_check = ot_get_option('show_contact_map');
                                            if($map_check == 'show'){
								
								?>
                                                <br />
                                                <div class="single-img-box">
                                                        <div id="map_canvas">

                                                        </div>
                                                </div>
								
								<?php
                                            }
                                        }
                                    if ( function_exists( 'ot_get_option' ) ) { ?>
						        	    <h3><?php echo ot_get_option( 'contact_form_heading' ); ?></h3>
								<?php } ?>
								
						        <span class="w-pet-border"></span>
						        <form id="contact-form" action="<?php echo site_url(); ?>/wp-admin/admin-ajax.php" method="post" >
								        <p><input type="text" name="name" class="required" id="cname" title="<?php _e('* Enter a valid name.', 'FoodRecipe'); ?>" value="<?php _e('Name here', 'FoodRecipe');?>" /></p>
								        <p><input type="text" name="email" class="email required" title="<?php _e('* Enter valid email address.', 'FoodRecipe'); ?>" id="cemail" value="<?php _e('Email here', 'FoodRecipe');?>" /></p>
								        <p><textarea name="message" id="cmessage" class="required" title="<?php _e('* You must enter message.', 'FoodRecipe'); ?>" cols="30" rows="6"><?php _e('Message', 'FoodRecipe');?></textarea></p>
								        <p>
                                        		<input type="hidden" name="action" value="send_message" />
												<input type="hidden" name="target" value="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option('contact_email_address' ); } ?>" />
										        <input type="submit" name="contact-submit" id="contact-submit" value="<?php _e('Send Now', 'FoodRecipe');?>" class="readmore" />
										        <img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" id="contact-loader" alt="Loader" />
								        </p>
								        <p id="message-sent"></p>
                                        <div id="search-error-container">

                                        </div>
								        <p>
								        		<span class="w-pet-border"></span>
								        </p>
						        </form>
						        
						</div><!-- end of left-area -->

                        <div id="sidebar">
                                <?php if ( ! dynamic_sidebar( 'Contact Sidebar' )) : ?>                                        
                                <?php endif; ?>
                        </div><!-- end of sidebar -->
										


<?php get_footer(); ?>