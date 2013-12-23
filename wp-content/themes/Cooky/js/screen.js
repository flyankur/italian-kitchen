
<!-- Tooltip -->
			$(document).ready(function(){
				$('.poshytip').poshytip({
					className: 'tip-twitter',
					showTimeout: 1,
					alignTo: 'target',
					alignX: 'center',
					alignY:'bottom',
					offsetY: 5,
					allowTipHover: true,
				});
				});

<!-- Responsive Menu -->
			$(document).ready(function(){		
				jQuery("#responsive-menu select").change(function() {
					window.location = jQuery(this).find("option:selected").val();
				});
				});
<!-- Hook up the FlexSlider -->
			$(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });

// Twitter
			$(document).ready(function(){
			$(function(){
				  $('#tweets').tweetable({username: 'anariel77', time: true, limit: 1, replies: true, position: 'append'});
			  });
			   });
				
// Activate the contactform
			  $(document).ready(function(){
			$(function(){
				$('#contact_form').submit(function(e){
					e.preventDefault();
					var form = $(this);
					var post_url = form.attr('action');
					var post_data = form.serialize();
					$('#loader', form).html('<img src="images/loader.gif" /> Please Wait...');
					$.ajax({
						type: 'POST',
						url: post_url, 
						data: post_data,
						success: function(msg) {
							$(form).fadeOut(500, function(){
								form.html(msg).fadeIn();
							});
						}
					});
				});
			});
			 });
// Activate the prettyPhoto
			   $(document).ready(function(){
				  $("a[class^='prettyPhoto']").prettyPhoto();
				});
				
// Activate the MainMenu

			  $(document).ready(function(){ 
				  $("ul.sf-menu").superfish(); 
			  });
//##########################################
	// Toggle box
	//##########################################
	  $(document).ready(function(){ 
	$('.toggle-trigger').click(function() {
		$(this).next().toggle('slow');
		$(this).toggleClass("active");
		return false;
	}).next().hide(); 
		});
	//##########################################
	// Accordion box
	//##########################################

	$('.accordion-container').hide(); 
	$('.accordion-trigger:first').addClass('active').next().show();
	$('.accordion-trigger').click(function(){
		if( $(this).next().is(':hidden') ) { 
			$('.accordion-trigger').removeClass('active').next().slideUp();
			$(this).toggleClass('active').next().slideDown();
		}
		return false;
	});
		


  
	

