<?php
	require ('../class.Conexion.php');
	$db = new Conexion();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">    
    <title>Formularios Activos</title>
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
</head>

<body>
  <form action="" method="post"> 
   <div class="container-fluid well ">
       <img src="../../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
   
    <div class="container well">
        <center><h1>Calculo de Riesgos Activos de Informacion</h1></center>
        <form class="form-horizontal">
        
        <div class="row">
            <label class="col-sm">Seleccione el area del activo</label> 
                <select class="form-control" name="NombreArea" id="inArea">
                    <option value="">-Selecciona un Area-</option>
                     <?php
                        $sql= $db -> query ("SELECT nom_Area FROM Area ;");
                        while($row = $db -> recorrer($sql)) {
                        $cActivo=$row["nom_Area"];
                          echo "<option>$cActivo</option>";
                        }
                         ?>	
                </select>
                <br />
            <br>  
            <label class="col-sm">Activo</label>
                <select class="form-control" name="Area" id="inActivo">
                   <option value="">-Selecciona un Activo-</option>
                 //   <?php
                 //       $sql= $db -> query ("SELECT Id_Activo FROM activo WHERE Nom_Activo = '$cActivo' ;");
                 //       while($row = $db -> recorrer($sql)) {
                 //           $tArea=$row["Id_Activo"];
                 //           echo "<option>$tArea</option>";
                 //       }
                 //   ?>
                </select>
            <br />
            <br>
                
            
        </div>      
                <input type= "hidden" name="insetAct" value="1"/>
                <button type="submit" class="btn btn-success" onclick="alert('Se Ha Agregado el Activo!')">Guardar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="submit" class="btn btn-default" onclick="goBack()" >Cancelar</button>
        </form> 
    </div>
    
  <script>
      function goBack() {
           window.history.back();
       }
    </script>  
      
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$("#inArea").on("change", buscarArea);
	});
	
	function buscarArea()
	{
	//alert("cambio");
		
	$("#inActivo").html("<option value=''>- primero seleccione un activo -</option>");
 
    $area = $("#inArea").val();
 
    if($area == ""){
            $("#inActivo").html("<option value=''>- primero seleccione un Area -</option>");
    }
    else {
        $.ajax({
            dataType: "json",
            data: {"area": $area},
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
	
	
</script>
</html>