// Custom Js

!function ($) {

  $(function(){

    var $window = $(window);  

    // side bar
    setTimeout(function () {
      $('.bs-docs-sidenav').affix({
        offset: {
          top: function () { return $window.width() <= 980 ? 290 : 210 }
        , bottom: 270
        }
      })
    }, 100)

    // make code pretty
    window.prettyPrint && prettyPrint();
	/*
	 $('ul.nav > li').click(function()
		$(this).sibling('li').children('ul').stop(true,true).slideUp(0);
		$(this).children('ul').stop(true,true).slideDown(0);
	});*/
	
	$('ul.nav > li > a').on('click',function(){
		$('ul.nav > li').children('ul').stop(true,true).slideUp(100);
		$(this).siblings('ul').stop(true,true).slideDown(0);
	});
	
	$('ul.nav > li ul > li > a').on('click',function(){
		$('ul.nav li > ul > li').children('ul').stop(true,true).slideUp(100);
		$(this).siblings('ul').stop(true,true).slideDown(0);
	});


  });

}(window.jQuery);

