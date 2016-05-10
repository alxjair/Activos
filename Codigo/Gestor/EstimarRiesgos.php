<?php
	require_once("busquedasDB.php");
	require_once ('../class.Conexion.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

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
                <select class="form-control" name="NombreArea" id="inArea" onchange="buscarActivo()">
                   <option value="">-Selecciona un Area-</option>
                    <?php
						$areas= buscarArea();
						$db = new conexion();
						while($row = $db-> recorrer($areas)){
                            $tArea=$row["nom_Area"];
                            echo "<option>$tArea</option>";
                        }
                     ?>	
                </select>
                <br />
            <br>  
            <label class="col-sm">Seleccione un Activo</label>
                <select class="form-control" name="NombreActivo" id="inActivo" onchange="ValDimendiones()">
                   <option value="">-Selecciona un Activo-</option>
                </select>
            <br />
            
               <br>  
             <br>
                <label>Valor Confidencialidad</label>
                <output type="text" class="form-control" name="ValorConf" id="ValConf" 
                
               <?php
                        $sql= $db -> query (" SELECT Confidencialidad_idConfidencialidad FROM activo  WHERE Nom_Activo ='$(#inActivo)'") ;");
                        while($row = $db -> recorrer($sql)) {
                            $cActivo=$row["Nom_Clasificacion_Activo"];
                            echo "<option>$cActivo</option>";
                        }
                    ?>
                
                >
             <br>
             
             <br>
                <label>Valor Integridad</label>
                <output type="text" class="form-control" name="ValorIntegridad" id="ValInteg" >
             <br>
             <br>
                <label>Valor Disponibilidad</label>
                <output type="text" class="form-control" name="ValorDisponi" id="ValDispo" >   
             <br>
            
            <br>
              
                <input type= "hidden" name="insetAct" value="1"/>
                <button type="submit" class="btn btn-success" onclick="alert('Se Ha Agregado el Activo!')">Guardar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="submit" class="btn btn-default" onclick="goBack()" >Cancelar</button>
        
    </div>
    
  <script>
      function goBack() {
           window.history.back();
       }
    </script> 
     

<script>
	$(document).ready(function(){
		$("#inArea").on("change", buscarArea);
	});
	
	
	function buscarActivo()
	{
	//alert("cambio");
		
	$("#inActivo").html("<option value=''>- primero seleccione un activo -</option>");
 
    var area = $("#inArea").val();
 
    if(area == ""){
            $("#inActivo").html("<option value=''>- primero seleccione un Area -</option>");
    }
    else {
        $.ajax({
            
            data: {nomArea: area},
            url:   'buscarActivo.php',
            type:  'post',
			
            beforeSend: function(){
                //Lo que se hace antes de enviar el formulario
            },
            success: function(data){
                //lo que se si el destino devuelve algo
                $("#inActivo").html(data);
            },
            error:    function(xhr,err){ 
                alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
            }
        });
    }
		
	}
	
</script>
    
<script>
function ValDimendiones(){
	
		var area = $("#inActivo").val();
		
		alert(area);
}
</script>
     
</form> 
</body>
</html>