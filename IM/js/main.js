jQuery(document).ready(function($){
	$('body.category .quote-post .text img').wrap('<div class="futured-image-holder"></div>');
	$('body.category .quote-post .text .futured-image-holder').each(function(){
		$(this).append('<span class="caption">' + $(this).find('img').attr('alt') + '</span>');
	});
})