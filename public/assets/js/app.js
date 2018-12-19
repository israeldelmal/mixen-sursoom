$('body > button').on('click', function(event) {
	event.preventDefault();
	$(this).toggleClass('active-btn');
	$('body > nav').toggleClass('active-nav');
});

$('.item-nav').on('click', function(event) {
	event.preventDefault();
	let Item = $(this).attr('href');

	if ($(window).width() > 1370) {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top - 125
		}, 1000);
	} else {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top
		}, 1000);
		$('body > nav').removeClass('active-nav');
		$('body > button').removeClass('active-btn');
	}
});

$(window).scroll(function(event) {
	let wHeight = $(window).scrollTop();
	
	if (wHeight > 0) {
		$('body > nav').addClass('nav-bg');
	} else {
		$('body > nav').removeClass('nav-bg');
	}
});