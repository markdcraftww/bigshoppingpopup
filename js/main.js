$(function(){
	$('.invite').hover(function(){
		$(this).attr('src', '/wp-content/uploads/2014/05/request-invite-hover.png');
	}, function(){
		$(this).attr('src', '/wp-content/uploads/2014/05/request-invite-normal.png');
	});
	$('.menu-mobile').on('click', function(e){
		e.preventDefault();
		$('.menu').toggle('slow');
	});
	var $container = $('#container');
	$container.imagesLoaded(function() {
		$container.isotope({
			itemSelector: '.col-3'
		})
	});
});