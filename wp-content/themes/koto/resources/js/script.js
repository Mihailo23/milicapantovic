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
		navText: ['<span class="icon-left"></span>', '<span class="icon-right"></span>']
	});

	$(".header-button").click(function (e) {
		e.preventDefault();
		$(".navigation").toggleClass('active')
	});

	$('.menu-item-has-children > a').click(function (e) {
		e.preventDefault();
		$(this).parent().find('.sub-menu').toggleClass('active');
	});
	$('#search').click(function (e) {
		e.preventDefault();
		$('.search-form').toggleClass('active');
	})

});

$(window).load(function () {


});

$(window).resize(function () {


});