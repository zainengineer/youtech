jQuery(document).ready(function($){
	//Adjust Header
	function adjust_header() {
		var  hwHeight = $(".site-header").outerHeight( false );
		if  ( $('#featured-home').length > 0 && hwHeight > 0 ) {
			var cssStr = '-' + hwHeight + 'px'
			$(".site-header").css("margin-bottom",cssStr);
		}
	}

	$(window).resize(function() {
		adjust_header();
	});
	adjust_header();
	// Back-to-top Script
	$(".back-to-top").hide();
	// fade in back-to-top 
	$(window).scroll(function () {
		if ($(this).scrollTop() > 500) {
			$('.back-to-top').fadeIn();
		} else {
			$('.back-to-top').fadeOut();
		}
	});
	// scroll body to 0px on click
	$('.back-to-top a').click(function () {
		$('body,html,header').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	//
	$('#featured-home').carousel()
		
});

(function($) {
  $(function(){	

	var $col = $('#portfolio-column').val();
	
	if ($col > 0) {
		
	var $container = $('.portfolio');
    $container.imagesLoaded(function(){
		$container.masonry({
    		itemSelector : '.item',
	  		isAnimated: true,
  			columnWidth: function( containerWidth ) {
				return containerWidth / $col;
  			},
  		});
    });
		
	$container.infinitescroll({
      navSelector  : '#nav-below',
      nextSelector : '#nav-below a.next.page-numbers',
      itemSelector : '.item',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: '<em>All items are loaded.</em>',
		  msgText: '<em>Loading...</em>'
        		}
     },
     // trigger Masonry as a callback
	function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          $container.masonry( 'appended', $newElems, true ); 
        });
    });		
		
	}		

  });	
})(jQuery);
