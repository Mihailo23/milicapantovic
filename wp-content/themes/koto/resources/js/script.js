/*
	Main JS
*/
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
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

	$('.cookie-button').click(function(e) {
		e.preventDefault()
		setCookie('compliance', true, 365)
		$('.cookies').removeClass('active')
	})

	if(!getCookie('compliance')) {
		$('.cookies').addClass('active')
	}

});

$(window).load(function () {

});

$(window).resize(function () {


});