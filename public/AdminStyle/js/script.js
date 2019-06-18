$('#registro').click(function(event) {
	/* Act on the event */
	var dato = $('#municipio').val();
	var route = "http://127.0.0.1:8000/municipio";
	var token = $('#token').val()
	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data: {municipio: dato},

		success:function(){
			$("#msj-success").fadeIn();
		}
	
	});
	
});