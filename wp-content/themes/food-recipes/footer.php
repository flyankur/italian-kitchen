  				</div><!-- end of content div -->
                <div class="bot-ads-area">
                		<?php if ( ! dynamic_sidebar( 'Bottom Advertisement Area' )) : endif; ?>
                </div>
        		<!-- CONTENT ENDS HERE -->
                                
		</div><!-- end of container div -->
		<div class="w-pet-border"></div>
<!-- ============= CONTAINER AREA ENDS HERE ============== -->


<!-- ============= BOTTOM AREA STARTS HERE ============== -->
	    <div id="bottom-wrap">
		    	<ul id="bottom" class="clearfix">
			        	<li>
								<?php if ( ! dynamic_sidebar( 'Footer Column 1' )) : ?>
			            		<?php endif; ?>
						</li>
						<li>
                        		<?php if ( ! dynamic_sidebar( 'Footer Column 2' )) : ?>
			            		<?php endif; ?>
                        </li>
                        <li>
                        		<?php if ( ! dynamic_sidebar( 'Footer Column 3' )) : ?>
			            		<?php endif; ?>
                        </li>
						
						
			            
				</ul><!-- end of bottom div -->
	    </div><!-- end of bottom-wrap div -->
<!-- ============= BOTTOM AREA ENDS HERE ============== -->


<!-- ============= FOOTER STARTS HERE ============== -->	
        
        <div id="footer-wrap">
				<div id="footer">       
					<?php if ( function_exists( 'ot_get_option' ) ) { ?>         		
						<p class="copyright"><?php echo ot_get_option( 'copyright_statement' ); ?></p>
						<p class="dnd"><?php echo ot_get_option( 'footer_dev_statement' ); ?></p>   
					<?php } ?>                     
				</div><!-- end of footer div -->
		</div><!-- end of footer-wrapper div -->
        
<!-- ============= FOOTER STARTS HERE ============== -->
    
	<?php
		// for google map 0-0-0-0-0-0
		
		if(is_page_template('template-contact.php')){
			get_template_part('inc/gmap');
		}
		//0-0-0-0-0-0-0-0-0-0-0-0-0-0
		
		
		wp_footer(); 

		
		if ( is_singular('recipe') )
		{
				
			?>        
			<script type="text/javascript">
			(function() {
				window.PinIt = window.PinIt || { loaded:false };
				if (window.PinIt.loaded) return;
				window.PinIt.loaded = true;
				function async_load(){
					var s = document.createElement("script");
					s.type = "text/javascript";
					s.async = true;
					s.src = "http://assets.pinterest.com/js/pinit.js";
					var x = document.getElementsByTagName("script")[0];
					x.parentNode.insertBefore(s, x);
				}
				if (window.attachEvent)
					window.attachEvent("onload", async_load);
				else
					window.addEventListener("load", async_load, false);
			})();
			</script>
		<?php
		}
		?>

        <script type="text/javascript">

            //=============================

            //this function attached focus and blur events with input elements
            var addFocusAndBlur = function($input, $val){

                $input.focus(function(){
                    if (this.value == $val) {this.value = '';}
                });

                $input.blur(function(){
                    if (this.value == '') {this.value = $val;}
                });
            }
            // example code to attach the events
            addFocusAndBlur(jQuery('#s'),'<?php _e('Search for', 'FoodRecipe'); ?>');
            addFocusAndBlur(jQuery('#cname'),'<?php _e('Name here', 'FoodRecipe'); ?>');
            addFocusAndBlur(jQuery('#cemail'),'<?php _e('Email here', 'FoodRecipe'); ?>');
            addFocusAndBlur(jQuery('#cmessage'),'<?php _e('Message', 'FoodRecipe'); ?>');
            addFocusAndBlur(jQuery('#message'), '<?php _e('Type your comments here', 'FoodRecipe'); ?>');
        </script>



</body>
</html>