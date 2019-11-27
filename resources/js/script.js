/*
	Main JS
*/

$(document).ready(function () {

	$(".owl-carousel").owlCarousel({
		nav: true,
		margin: 20,
		autoWidth: true,
		center: true,
		loop: true,
		navText: ['<span class="button left">Prethodna</span>', '<span class="button right">Sledeća</span>']
	});

	$(".header-button").click(function (e) {
		e.preventDefault();
		$(".navigation").toggleClass('active')
	});

	$('.menu-item-has-children').on('click', 'a', function (e) {
		e.preventDefault();
		console.log($(this).find('.sub-menu'));

		$(this).parent().find('.sub-menu').toggleClass('active');
	})

});

$(window).load(function () {


});

$(window).resize(function () {


});