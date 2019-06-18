$(document).ready(function(){
	//alert('a la verga me vale verga puto');
	$('ul.tabs li a:first').addClass('active');
	$('.secciones article').hide();
	$('.secciones article:first').show();

	$('ul.tabs li a').click(function() {
		/* Act on the event */
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.secciones article').hide();

		var activeTab =$(this).attr('href');
		$(activeTab).show();
		return false;
	});
	
});