						<!-- SLIDER STARTS HERE -->
                        <div id="slider">
								<div class="thumb-slider-wrap">
										<div class="thumb-slider">
												<?php
												if ( function_exists( 'ot_get_option' ) )
												{												  	
													$slides = ot_get_option( 'thumb_slider_images', array() );
													
													if ( ! empty( $slides ) ) {
															
															foreach( $slides as $slide ) {
																echo '<img src="'.$slide['image'].'" alt="'.$slide['title'].'" />';
															}
													}
												}
							                    ?>
										</div>
								</div>
                                
								<?php
	                                if ( ! empty( $slides ) ) { 
										?>
										<ul class="sliderThumbs">
										</ul> 
										<?php
	                                 }
                                 ?>
						</div><!-- end of Slider div -->
            			<!-- SLIDER AREA ENDS HERE -->