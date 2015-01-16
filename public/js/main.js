$(document).ready(function() {

	var currentWindowHeight = window.innerHeight;

	var arrow = $(".scroll-top-button");

	arrow.css("display", "none");

	$(function() {
		var eTop = $('#bd').offset().top;

		var arrowOffset = arrow.offset().top;
		console.log("arrow offset " +
				arrowOffset) //print arrow starting position 

		//position of the ele w.r.t window
		$(window).scroll(function() {
			//when window is scrolled
			var scrollPosition = eTop - $(
				window).scrollTop();
			console.log(eTop - $(window).scrollTop());

			if (scrollPosition > -200) {
				arrow.fadeOut("slow");

			}
			if (scrollPosition <= -400) {
				var height = (window.innerHeight -
					100);

				arrow.fadeIn("slow");

				arrow.css({
					'position': 'fixed',
					'display': 'block',
					'top': height,
					'z-index': 2
				});

			}
		});
	});




	/**
	 * this function is enables the page to smoothly scroll to the top of the page.
	 */

	$('a[href*=#]:not([href=#])').click(
		function() {
			if (location.pathname.replace(
					/^\//, '') == this.pathname.replace(
					/^\//, '') || location.hostname ==
				this.hostname) {
				var target = $(this.hash);
				target = target.length ? target :
					$('[name=' + this.hash.slice(1) +
						']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top
					}, 500);
					return false;
				}
			}
		});
});