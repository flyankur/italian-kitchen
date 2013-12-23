						<!-- SLIDER STARTS HERE -->
						<div id="slider" class="accordionSlider">
								<div id="slider_frame" class="accor-slider">
										<ul id="accordion-slider" class="sm">
                                          		<?php												
												if ( function_exists( 'ot_get_option' ) )
												{
													$slides = ot_get_option( 'accor_slider_images', array()  );
												
													if ( ! empty( $slides ) ) {
														
															foreach( $slides as $slide ) {
																echo '<li><a href="'.$slide['link'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].'" /></a></li>';
															}
													}
												}
							                    ?>
										</ul>
								</div>
						</div><!-- end of Slider div -->
						<!-- SLIDER AREA ENDS HERE -->