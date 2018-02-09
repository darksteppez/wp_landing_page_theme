/*
 *
 * Success Page JS
 *
 */

 (function($) {

 	var d = new Date();

	d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));

	var expires = "expires=" + d.toUTCString();

	document.cookie = "showNewsletterSignup=false;" + expires + ";path=/";

 })(jQuery);