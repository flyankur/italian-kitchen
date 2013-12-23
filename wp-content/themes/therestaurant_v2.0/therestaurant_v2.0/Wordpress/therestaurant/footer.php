<?php $theme_options = get_option('therestaurant'); ?>
            <div id="footer">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) :
                endif; ?>
                <?php if ($theme_options["cp_contact"] == "1") { ?>
                    <div id="getintouch" class="sidepanel">
                        <h3><?php echo __($theme_options["cp_contact_title"]); ?></h3>
                        <div id="social-buttons">
                            <a href="<?php bloginfo('rss2_url'); ?>" target="_BLANK"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS button" /></a>
                            <?php if ($theme_options['cp_contact_twitter']) { ?><a href="http://www.mafiashare.net'cp_contact_twitter']); ?>" target="_BLANK"><img src="<?php bloginfo('template_directory'); ?>/images/twitter.png" alt="Twitter button" /></a><?php } ?>
                            <?php if ($theme_options['cp_contact_facebook']) { ?><a href="<?php echo __($theme_options['cp_contact_facebook']); ?>" target="_BLANK"><img src="<?php bloginfo('template_directory'); ?>/images/facebook.png" alt="Facebook button" /></a><?php } ?>
                            <?php if ($theme_options['cp_contact_flickr']) { ?><a href="<?php echo __($theme_options['cp_contact_flickr']); ?>" target="_BLANK"><img src="<?php bloginfo('template_directory'); ?>/images/flickr.png" alt="Flickr button" /></a><?php } ?>
                            <?php if ($theme_options['cp_contact_linkedin']) { ?><a href="<?php echo __($theme_options['cp_contact_linkedin']); ?>" target="_BLANK"><img src="<?php bloginfo('template_directory'); ?>/images/linkedin.png" alt="LinkedIn button" /></a><?php } ?>
                        </div>
                        <?php if ($theme_options["cp_contact_phone"]) { ?>
                            <div id="phone">
                                <div class="icon"></div>
                                <div class="text">
                                    <p class="title">phone</p>
                                    <p><?php echo __($theme_options["cp_contact_phone"]) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($theme_options["cp_contact_email"]) { ?>
                            <div id="email">
                                <div class="icon"></div>
                                <div class="text">
                                    <p class="title">email</p>
                                    <p><?php echo __($theme_options["cp_contact_email"]) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div><!-- #getintouch -->
                <?php } ?>
            </div><!-- #footer -->
            <ul id="footer-links">
                <li>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - Made by <a href="http://www.mafiashare.net" target="_BLANK">Red Factory</a></li>
            </ul>
		</div><!-- .wrapper -->
    </div><!-- #container -->
</div><!-- #wrapper -->
<?php wp_footer() ?>
<script type="text/javascript"> Cufon.now(); </script>
<!-- Shared on http://www.MafiaShare.net --></body>

<!-- include google analytics -->
<?php if ($theme_options['cp_trackingcode']) { ?>
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("<?php echo $theme_options['cp_trackingcode']; ?>");
		pageTracker._trackPageview();
	} catch(err) {}
</script>
<?php } ?>

<!-- some jquery stuff -->
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function($){
	//var starttime = new Date().getTime();
	
	//image fader
	<?php if ($theme_options['cp_imgloader']) { ?>
	$('img.load').each(function() {
		var el = $(this);
		var src = el.attr('src');
		var alt = el.attr('alt');
		el.wrap('<div style="position:relative;height:100%;width:100%;overflow:hidden;background:#fff url(<?php bloginfo('template_directory'); ?>/images/loader.gif) 50% 50% no-repeat;" />');
		
		var img = new Image();
		$(img).load(function () {
			$(this).hide();
			el.parent().html(this);
			el.remove();
			$(this).fadeIn(1000);
		}).attr({
		  src: src,
		  alt: alt
		}).css('height', 'auto').css('width', '100%');
	});
	<?php } ?>
	
	//nivo slider settings
	var header = $('#header');
	var slider = $('#slider');

	var nivocheck = false;
	function startnivo() {
		if (nivocheck == false) {
			slider.nivoSlider({
				effect:'<?php echo $theme_options['cp_slider_effect']; ?>',
				slices: 12,
				animSpeed: 1000,
				pauseTime: <?php echo ($theme_options['cp_slider_time'] * 1000); ?>,
				directionNav:true,
				directionNavHide:true,
				controlNav:true,
				pauseOnHover:true,
				manualAdvance:false,
				captionOpacity: 0.7,
				beforeChange: function(){},
				afterChange: function(){}
			});
			nivocheck = true;
		}
	}
	
	//slider hide & show
	var sliderarrow = $('#slider_arrow');
	<?php if ((is_front_page() && $theme_options['cp_slider_show'] == 'frontpage') || $theme_options['cp_slider_show'] == 'all') { ?>
	startnivo();
	sliderarrow.removeClass("arrow_down").addClass("arrow_up");
	<?php } ?>
	sliderarrow.click(function(){
		if ($(this).hasClass('arrow_up')) {
			slider.fadeOut(1000);
			header.animate({ 
				height: '80'
			}, 1000, function(){
				sliderarrow.removeClass("arrow_up").addClass("arrow_down");
			});
		} else {
			startnivo();
			slider.fadeIn(1000);
			header.animate({ 
				height: '400'
			}, 1000, function(){
				sliderarrow.removeClass("arrow_down").addClass("arrow_up");
			});
		}
	});
	sliderarrow.hover(
		function () {
			$(this).animate({
				top: "-12px"
			}, 100 );
	  	},
	  	function () {
			$(this).animate({
				top: "-10px"
			}, 100 );
	  	}
	);
	
	//Mark menu items with submenus
	$('#mainmenu ul.menu li ul.sub-menu').parent().addClass("has-sub-menu").append('<div class="dropdown_arrow"></div>');

	//font replacement & text shadows
	$('h1,h2,h3,ul.menu li a,#slider .nivo-caption p,.post-title, #nicepagination ul li').addClass("junction");
	$('.sidepanel .post-title').removeClass("junction");
	Cufon.replace('#tagline p',{ fontFamily: 'OFL Sorts Mill Goudy' });
	
	Cufon.replace('#sidebar .junction, #content .post .junction, #card-container .junction, #frontwidgets h3, #gallery .gal_item .junction, #nicepagination .junction',{ fontFamily: 'Junction', textShadow: '#fff 0px 1px' });
	Cufon.replace('#footer .junction',{ fontFamily: 'Junction', textShadow: '#000 0px -1px' });
	Cufon.replace('#content .title-container .junction, #mainmenu ul.menu li:not(.current_page_item, .current-menu-parent) a.junction',{ fontFamily: 'Junction', textShadow: '#444 0px -1px' });
	Cufon.replace('#mainmenu ul.menu li.current-menu-item a.junction, #mainmenu ul.menu li.current-menu-parent a.junction',{ fontFamily: 'Junction', textShadow: '#fff 0px -1px' });
	
	//fixing menu hovers as cufon can't seem to handle different div-hover colors
	$('#mainmenu ul.menu > li:not(.current-menu-item, .current-menu-parent)').hover(
		function () {
			Cufon.replace($('a.junction',$(this)),{ fontFamily: 'Junction', color: '#<?php echo $theme_options['cp_color']; ?>', textShadow: '#fff 0px -1px' });
	  	},
	  	function () {
			Cufon.replace($('a.junction',$(this)),{ fontFamily: 'Junction', color: '#fff', textShadow: '#444 0px -1px' });
	  	}
	);

	//button hover effect
	var content = $('#content')
	$(".readmore, input[type='submit']").hover(
		function () {
			$(this).animate({
				opacity: 0.8
			}, 100 );
	  	},
	  	function () {
			$(this).animate({
				opacity: 1
			}, 200 );
	  	}
	);
	
	$('#fronttext-devider1,#fronttext-devider2').css('height',content.height()-40);
	
	//menu card
	window.cardcontainer = $('#card-container');
	window.cardnext = $('#card-next');
	window.cardprev = $('#card-prev');
	window.activepage = cardcontainer.attr('activepage');
	cardcontainer.animate({
		height: $('#cardpageid-' + window.activepage).height()
	}, 500 );
	if (window.activepage == 1) {
		cardprev.fadeOut(0);
	}
	var marginLeft = ((window.activepage-1)*956)*-1;
	$('#card-slider').css("left",marginLeft);
	window.totalPages = $('.card-page').size();
	if (window.activepage == window.totalPages){
		window.cardnext.fadeOut(0);
	}
	window.blockAnimation = false;
	$('#card-next, #card-prev').click(function(){
		direction = $(this).attr('id')
		if ( direction == 'card-next' ){
			cardNavigation(false)
		} else {
			cardNavigation(true)
		}
		return false
	});
	cardprev.hover(
		function () {
			$(this).animate({
				left: "-10px"
			}, 100 );
	  	},
	  	function () {
			$(this).animate({
				left: "-8px"
			}, 100 );
	  	}
	);
	cardnext.hover(
		function () {
			$(this).animate({
				right: "-10px"
			}, 100 );
	  	},
	  	function () {
			$(this).animate({
				right: "-8px"
			}, 100 );
	  	}
	);
	
	//var elapsed = new Date().getTime() - starttime;
	//alert('Time elapsed: ' + elapsed + ' milliseconds');
});

function cardNavigation(prev){
	marginLeft = ((window.activepage-1)*956)*-1;
	if (window.blockAnimation == false) {
		window.blockAnimation = true;
		if ( prev == true ){
			window.activepage--;
		} else {
			window.activepage++;
		}
		if (window.activepage == window.totalPages){
			window.cardnext.fadeOut(500);
		}
		if (window.activepage == (window.totalPages-1)){
			window.cardnext.fadeIn(500);
		}
		if (window.activepage == 1){
			window.cardprev.fadeOut(500);
		}
		if (window.activepage == 2){
			window.cardprev.fadeIn(500);
		}
		
		left = ( prev == true ) ? (marginLeft + 956) : (marginLeft - 956)
		$('#card-slider').animate({
			left: left
		}, 1000, function(){
			window.blockAnimation = false;
		});
		
		window.cardcontainer.attr('activepage', window.activepage).animate({
			height: $('#cardpageid-' + window.activepage).height()
		}, 1000 );
	}
}
/* ]]> */
</script>
</html>