$("#region").change(function(event){
    $.get("/municipios/"+event.target.value+"",function(response,region){
    console.log(response);
    $("#municipio").empty();
    for(i=0; i<response.length; i++){
        $("#municipio").append("<option value='"+response[i].id+"'> "+response[i].municipio+"</option>");
    }
  });
});
