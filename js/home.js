/*
 *
 * Homepage JS
 *
 */

 (function($) {

 	var newsletter = $('.newsletter-wrapper');

 	var newsletterSticky = $('.newsletter-sticky');

 	var scrollArea = $(window);

 	var calculateSticky = function() {

 		var newsletterTop = newsletter.offset().top + newsletter.height(),
 			scrollAreaTop = scrollArea.scrollTop(),
 			newsletterAreaHeight = newsletter.height();

 		if (scrollAreaTop > newsletterTop) {
 			newsletterSticky.addClass('newsletter-sticky--stuck');
 			// avoid abrupt jump
 			newsletter.css('height', newsletterAreaHeight);
 		} else {
 			newsletterSticky.removeClass('newsletter-sticky--stuck');
 			newsletter.css('height', 'auto');
 		}

 	};

 	$(document).ready(function() {

 		var showNewsletter = true;

 		var cookie = document.cookie.split(';');

 		for (var i = 0; i < cookie.length; i++) {

 			var c = cookie[i];

 			while (c.charAt(0) == ' ') {
 				c = c.substring(1);
 			}

 			if (c.indexOf('showNewsletterSignup') == 0) {

 				showNewsletter = false;

 			}

 		}

 		//setInterval(calculateSticky, 250);
 		setTimeout(function() {

 			if (showNewsletter) {

 				$('#footerNewsletterModal').modal('show');

 			}

 		}, 5000);

 		$('#footerNewsletterModal').on('hide.bs.modal', function() {

 			var d = new Date();

 			d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));

 			var expires = "expires=" + d.toUTCString();

 			document.cookie = "showNewsletterSignup=false;" + expires + ";path=/";

 		});

 	});

 })(jQuery);