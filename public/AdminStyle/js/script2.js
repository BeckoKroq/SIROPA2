$(document).ready(function(){
	var tablaDatos = $("#datos");
	var route = "http://127.0.0.1:8000/municipio";

	$.get(route, function(res){
		$(res).each(function(key, value) {
			tablaDatos.append("<tr><td>"+value.municipio+"</td><td><button value="+ value.id+" OnClick='Mostrar(this);' class='btn btn-primary' data-target='#myModal'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>"); 
			
		});

	});

});

function Mostrar(btn){
	console.log(btn.value);
}