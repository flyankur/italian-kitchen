// ===============================
// designesia 2013  //
// ===============================
jQuery(document).ready(function() {
	domready(function(){
		selectnav('nav', {
			label: 'Menu',
			nested: true,
			indent: '-'
		});
	});
});


jQuery(document).ready(function() {
	
	$('#menu-thumbnail-view li').hover(
    function() {
	 $(this).find('.menu-text-expand').fadeTo(150, 1);
	 $(this).find('.price').fadeTo(150, 0);
	},
	function() {
	 $(this).find('.menu-text-expand').fadeTo(150, 0);
	 $(this).find('.price').fadeTo(150, 1);
	})
	
	$(".menu-item").hover(
	function() {
	 $(this).find('img').animate({'margin-top':"-5px"},"fast");
	},
    function() {
	$(this).find('img').animate({'margin-top':"0px"},"fast");
  	})
	
	$(".menu-item").hover(
	function() {
	 $(this).find('img').animate({'margin-top':"-5px"},"fast");
	},
    function() {
	$(this).find('img').animate({'margin-top':"0px"},"fast");
  	})
	
	$("#btn-switch").fadeTo(150, .75);
	
	$("#btn-switch").hover(
	function() {
	 $(this).stop().fadeTo(150, 1);
	},
    function() {
	 $(this).stop().fadeTo(150, .75);
  	})

	$("#btn-switch").toggle(
	function() {
	 $('#canvas').stop().animate({"opacity": "0"}, "50");
	 $(this).addClass("on");
	},
    function() {
	 $('#canvas').stop().animate({"opacity": "1"}, "50");
	  $(this).removeClass("on");
  	})
	
	
	$("#content").fitVids();
	
	$("#pauseplay").toggle(
	function() {
	 $(this).addClass("pause");
	},
    function() {
	 $(this).removeClass("pause").addClass("play");
  	})
	
	$("#pauseplay").stop().fadeTo(150, .5);
	$("#pauseplay").hover(
	function() {
	 $(this).stop().fadeTo(150, 1);
	},
    function() {
	 $(this).stop().fadeTo(150, .5);
  	})
	

	

	$(".msg .btn").click(function(){
 	$(this).parent().fadeOut(300);
  	});
  
  $(".min").click(function()
  {
	$(this).parent().prev(".plus").slideToggle(200);
    $(this).parent().slideToggle(200);
	$(this).fadeOut(10);
  });
  
  
  $('.cat-count').hide();
  
  $('.cat-name').hover(
    function() {
        $(this).parent().parent().find('.cat-count').stop().fadeTo(150, 1);
    },
	
    function() {
        $(this).parent().parent().find('.cat-count').stop().fadeTo(150, 0);
    }	
	)
	
	jQuery('.overlay').fadeTo(1, 0);
	
	jQuery(".box .pic_hover").hover(
	function() {
	 jQuery(this).parent().find(".overlay").width(jQuery(this).find("img").css("width"));
	 jQuery(this).parent().find(".overlay").height(jQuery(this).find("img").css("height"));
	 jQuery(this).parent().find(".overlay").fadeTo(150, .8);
	 picheight = jQuery(this).find("img").css("height");
	 newheight = (picheight.substring(0, picheight.length - 2)/2)-32;
	 //alert(newheight);
	 jQuery(this).parent().find(".info-area").animate({'margin-top': newheight},'fast');

	},
    function() {
	 jQuery(this).parent().find(".info-area").animate({'margin-top': '10%'},'fast');
	 jQuery(this).parent().find(".overlay").fadeTo(150, 0);
  	})

  
});


// ===============================
// fading object //
// ===============================


jQuery(document).ready(function(){
	$("#wrapper").fadeIn(700);
	$(".hide_content .inner").css("-webkit-border-radius", "20px");
	$(".hide_content .inner").css("-moz-border-radius", "20px");
	$(".contact_form_holder").css("-moz-border-radius", "10px");
	$("#social-icons img").stop().animate({"opacity": ".25"}, "50");
	$("#social-icons img").hover(
	function() {
	$(this).stop().animate({"opacity": "1"}, "50");
	},
	function() {
	$(this).stop().animate({"opacity": ".25"}, "50");
	
});
 
});


jQuery(document).ready(function() {
	  	// ===============================
	// isotop filtering
	// ===============================
	var $container = jQuery('#gallery')
		jQuery('#filters a').click(function(){
			var $this = jQuery(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents();
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
			
		var selector = jQuery(this).attr('data-filter');
			$container.isotope({ 
			filter: selector,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
		   }
		  });
		  return false;
		});
		
		window.onresize = function(event) {
		jQuery('#gallery').isotope('reLayout');
  		};
	
  $(".clickarea").click(
 	 function(){
	 $(this).parent().find('.clickarea').css("z-index", "26");	 
	 $(this).parent().find('.title').stop().fadeTo(150, 0);
	 $(this).parent().find('.info').stop().fadeTo(300, 1);
	 $(this).parent().find('.corner').stop().fadeTo(300, 0);
	 $(this).parent().find('.textinfo').animate({'font-size': '12px','width': '100%','height': '100%'},'fast');
	 $(this).parent().find('.info h2').animate({'font-size': '24px'},'fast');
	 $(this).parent().find('.bginfo').stop().fadeTo(300, 1);
	 $(this).parent().find('.btnquit').stop().fadeTo(300, 1);
	 $(this).parent().find('.btn').stop().fadeTo(300, 1);
	});
	
	
	$(".btnquit").click(
 	 function(){
	 $(this).parent().find('.clickarea').css("z-index", "28");
	 $(this).parent().find('.title').stop().fadeTo(150, 1);
	 $(this).parent().find('.info').stop().fadeTo(300, 0);
	 $(this).parent().find('.corner').stop().fadeTo(300, 1);
	 $(this).parent().find('.textinfo').animate({'font-size': '0px','width': '0','height': '0'},'fast');
	 $(this).parent().find('.info h2').animate({'font-size': '0px'},'fast');
	 $(this).parent().find('.bginfo').stop().fadeTo(300, 0);
	 $(this).parent().find('.btnquit').fadeOut(20);
	 $(this).parent().find('.btn').stop().fadeTo(300, 0);
	 
	});
	
	$('.btnquit').hover(
    function() {
	 $(this).animate({'padding': '5px'},'fast');
	$(this).parent().find('.info').stop().fadeTo(300, .25);

	},
	function() {
	$(this).animate({'padding': '0px'},'fast');
	$(this).parent().find('.info').stop().fadeTo(300, 1);
	}
)	
	$('.clickarea').hover(
    function() {
	 $(this).parent().find('img').stop().animate({"opacity": ".25"}, "50");
	 $(this).parent().find('.title h1').animate({'font-size': '24px'},'fast');
	},
	function() {
	 $(this).parent().find('img').stop().animate({"opacity": "1"}, "50");
	 $(this).parent().find('.title h1').animate({'font-size': '16px'},'fast');
	}
)


  
});
