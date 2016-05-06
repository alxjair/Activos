
function buscarMunicipios(){
    $("#localidad").html("<option value=''>- primero seleccione un municipio -</option>");
 
    $estado = $("#estado").val();
 
    if($estado == ""){
            $("#municipio").html("<option value=''>- primero seleccione un estado -</option>");
    }
    else {
        $.ajax({
            dataType: "json",
            data: {"estado": $estado},
            url:   'buscar.php',
            type:  'post',
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
                },
            success: function(respuesta){
                //lo que se si el destino devuelve algo
                $("#municipio").html(respuesta.html);
            },
            error:    function(xhr,err){ 
                alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
            }
        });
    }
}