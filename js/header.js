/*
 *
 * Header JS
 *
 *
 */

 (function($) {

 	var onsaleBanner = $('.onsale-banner');

 	var topNav = $('#site-navigation');

 	var scrollArea = $(window);

 	var calculateSticky = function() {

 		if (scrollArea.innerWidth() > 767) {

	 		var scrollAreaTop = scrollArea.scrollTop();

	 		if (topNav.offset().top < scrollAreaTop) {
	 			topNav.addClass('stuck');
	 		} else {
	 			topNav.removeClass('stuck');
	 		}

	 	}

 	};

 	$(document).ready(function() {

 		setInterval(calculateSticky, 250);

 		if ($('.hero-slider').length) {

	 		$(window).on('resize', function(slick) {

	 			var heroHeight = $('.hero-content').innerHeight();

	 			$('.hero-slide').css('height', heroHeight + 5);

	 		});

	 		$('.hero-slider').on('init', function(slick) {

	 			var heroHeight = $('.hero-content').innerHeight();

	 			$('.hero-slide').css('height', heroHeight + 5);

	 		});


	 		$('.hero-slider').slick({
	 			arrows: false,
	 			autoplay: true
	 		});

	 	}

 	});

 })(jQuery);