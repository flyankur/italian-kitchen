<?php
	global $de_data;
	$de_data = get_option( 'Lezatos_options' ); 
	$de_footer = $de_data['DE_footer_text'];
	$de_bgpage = $de_data['DE_page_background_image'];
	$de_bgpage = get_site_url().substr($de_bgpage,10);
?>
        </div>
		<div class="clear"></div>
		<?php if(!is_home()&&!is_page_template('video_background.php')&&!is_page_template('video_background_vimeo.php')){ ?>
            <div id="footer">
            	<div class="container">
                	<div class="six columns">
                <?php if ($de_footer) { ?>
                <?php echo do_shortcode(stripslashes($de_footer));   ?>
                <?php ;} else{ echo 'yourwebsite.com'; } ?>
                	</div>
                    
                    <div class="ten columns social-icon-footer">
                    	<?php 
			$de_rss = $de_data['DE_rss'];
			$de_twitter = $de_data['DE_twitter'];
			$de_facebook = $de_data['DE_facebook'];
			$de_gplus = $de_data['DE_gplus'];
			$de_vimeo = $de_data['DE_vimeo'];
			$de_youtube = $de_data['DE_youtube'];
			$de_linkedin = $de_data['DE_linkedin'];
			$de_flickr = $de_data['DE_flickr'];
			$de_pinterest = $de_data['DE_pinterest'];
			$de_deviantart = $de_data['DE_deviantart'];
			$de_dribbble = $de_data['DE_dribbble'];
			$de_digg = $de_data['DE_digg'];
			$de_instagram = $de_data['DE_instagram'];
			$de_lastfm = $de_data['DE_lastfm'];
			$de_myspace = $de_data['DE_myspace'];
			$de_reddit = $de_data['DE_reddit'];
			$de_stumbleupon = $de_data['DE_stumbleupon'];
			$de_tumblr = $de_data['DE_tumblr'];
			$de_tripadvisor = $de_data['DE_tripadvisor'];
		
		if ( $de_rss ) echo '<a href="'.$de_rss.'"><img src="'.get_template_directory_uri().'/images/social-icons/rss.png"/></a>';
		if ( $de_twitter ) echo '<a href="http://twitter.com/'.$de_twitter.'"><img src="'.get_template_directory_uri().'/images/social-icons/twitter.png"/></a>';
		if ( $de_facebook ) echo '<a href="http://facebook.com/'.$de_facebook.'"><img src="'.get_template_directory_uri().'/images/social-icons/facebook.png"/></a>';
		if ( $de_gplus ) echo '<a href="https://plus.google.com/+'.$de_gplus.'"><img src="'.get_template_directory_uri().'/images/social-icons/gplus.png"/></a>';
		if ( $de_vimeo ) echo '<a href="http://vimeo.com/'.$de_vimeo.'"><img src="'.get_template_directory_uri().'/images/social-icons/vimeo.png"/></a>';
		if ( $de_youtube ) echo '<a href="http://youtube.com/'.$de_youtube.'"><img src="'.get_template_directory_uri().'/images/social-icons/youtube.png"/></a>';
		if ( $de_flickr ) echo '<a href="http://www.flickr.com/photos/'.$de_flickr.'"><img src="'.get_template_directory_uri().'/images/social-icons/flickr.png"/></a>';
		if ( $de_pinterest ) echo '<a href="http://pinterest.com/'.$de_pinterest.'"><img src="'.get_template_directory_uri().'/images/social-icons/pinterest.png"/></a>';
		if ( $de_deviantart ) echo '<a href="http://'.$de_deviantart.'.deviantart.com/"><img src="'.get_template_directory_uri().'/images/social-icons/deviantart.png"/></a>';
		if ( $de_dribbble ) echo '<a href="http://dribbble.com/'.$de_dribbble.'"><img src="'.get_template_directory_uri().'/images/social-icons/dribbble.png"/></a>';
		if ( $de_digg ) echo '<a href="'.$de_digg.'"><img src="'.get_template_directory_uri().'/images/social-icons/digg.png"/></a>';
		if ( $de_instagram ) echo '<a href="http://instagram.com/'.$de_instagram.'"><img src="'.get_template_directory_uri().'/images/social-icons/instagram.png"/></a>';
		if ( $de_linkedin ) echo '<a href="'.$de_linkedin.'"><img src="'.get_template_directory_uri().'/images/social-icons/linkedin.png"/></a>';
		if ( $de_lastfm ) echo '<a href="http://last.fm/music/'.$de_lastfm.'"><img src="'.get_template_directory_uri().'/images/social-icons/lastfm.png"/></a>';
		if ( $de_myspace ) echo '<a href="http://myspace.com/'.$de_myspace.'"><img src="'.get_template_directory_uri().'/images/social-icons/myspace.png"/></a>';
		if ( $de_reddit ) echo '<a href="'.$de_reddit.'"><img src="'.get_template_directory_uri().'/images/social-icons/reddit.png"/></a>';
		if ( $de_stumbleupon ) echo '<a href="'.$de_stumbleupon.'"><img src="'.get_template_directory_uri().'/images/social-icons/stumbleupon.png"/></a>';
		if ( $de_tumblr ) echo '<a href="http://'.$de_tumblr.'.tumblr.com/"><img src="'.get_template_directory_uri().'/images/social-icons/tumblr.png"/></a>';
		if ( $de_tripadvisor ) echo '<a href="'.$de_tripadvisor.'"><img src="'.get_template_directory_uri().'/images/social-icons/tripadvisor.png"/></a>';

			?>
            <?php } ?>


<?php if(is_home()||$post_type=="project"): ?>
    		
<!--Slide captions displayed here-->
<div id="slidecaption"></div>

<div class="container">    
<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
			
			<a id="play-button"><span id="pauseplay" class="play"></span></a>
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>
    <?php endif; ?>
    
    
   
   <?php if(is_page_template('video_background_vimeo.php')){ ?>
    <div id="bg-vimeo" style=" position:absolute; z-index:1; width:100%; height:100%; background:#999;">
	<iframe src="http://player.vimeo.com/video/<?php echo $post->post_content; ?>?autoplay=1" webkitAllowFullScreen mozallowfullscreen allowFullScreen autoplay=1 frameborder="0" width="100%" height="100%"></iframe>
    </div>
    <?php } ?>
    
	<?php if($post_type!='project'&&!is_home()):?>
    
    <?php $bg_image = get_post_meta($post->ID, 'bg_image', true);	
			$bg_blog = $de_data ['DE_blog_background']; 
			$bg_blog = get_site_url().substr($bg_blog,10);
	?>
	<script type='text/javascript' src='<?php echo get_template_directory_uri()?>/js/jquery.backstretch.min.js'></script>
	<?php if($bg_image!=""){ ?>
    <div id="background-image">
		<script>
         jQuery.backstretch("<?php echo $bg_image?>");
		 jQuery('#bg-page').hide();
        </script>
	</div>
    
    <?php }else if($bg_blog!=""&&is_single()&&!is_singular('menu')){?>
    	 <div id="background-image">
		<script>
         jQuery.backstretch("<?php echo $bg_blog?>");
		 jQuery('#bg-page').hide();
        </script>
		</div>
        
    <?php }else if(!is_singular('menu')){ ?>
		 <div id="background-image">
		<script>
         jQuery.backstretch("<?php echo $de_bgpage?>");
		 jQuery('#bg-page').hide();
        </script>
		</div>
    <?php }endif; ?>
    
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $("document").ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 35) {
                    $('.header').addClass("f-nav");
					$('.logo').addClass("trans");
                } else {
                    $('.header').removeClass("f-nav");
					$('.logo').removeClass("trans");
                }
            });
        });
    </script>
	<?php wp_footer(); ?>
    <?php if ( is_page_template('video_background.php') ) : ?>
    <script type="text/javascript">
       $('document').ready(function() {
            var options = { videoId: '<?php echo $post->post_content; ?>', start: 3 };
            $('#wrapper').tubular(options);
            // ftc cool sepia hd
            // 49SKbS7Xwf4 beautiful barn sepia
        });
	</script>
    <?php endif; ?>

</body>
</html>


