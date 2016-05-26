<!--EN ESTA CLASE ES UNA DE LASP RINCIPALES YA QUE SE ESTIMAN LOS IMPACTOS DE LOS RIEGOS QUE SE INGRESAN AL SISTEMA, PARA HACER EL CALCULO TOTAL Y ASI GUARDAR LOS DATOS EN LA BASE DE DATOS PARA HACER USO DE ESTOS MAS ADELANTE-->

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
  <form method="post" id = "formRiesgos" name = "formuRies"> 
   <div class="container-fluid well ">
       <img src="../../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
   
 <div class="container well">
       <center><h1>Calculo de Riesgos Activos de Informacion</h1></center>
       <form class="form-horizontal">
       <div>
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
       </div>
         
       <div>
            <label class="col-sm">Seleccione un Activo</label>
               <select class="form-control" name="NombreActivo" id="inActivo" onchange="ValDimensiones();ValDegradacion()">
                  <option value="">-Selecciona un Activo-</option>
               </select>
       </div>
              
       <div>
           <label>Valor Confidencialidad</label>
           <output type="text" class="form-control" name="ValorConf" id="ValConf"/>
       </div>
            
       <div>
           <label>Valor Integridad</label>
               <output type="text" class="form-control" name="ValorIntegridad" id="ValInteg"/>
       </div> 
       
       <div>
               <label>Valor Disponibilidad</label>
               <output type="text" class="form-control" name="ValorDisponi" id="ValDispo"/>  
       </div>
       
       <div>
               <label>Valor Degradacion</label>
               <output type="text" class="form-control" name="Degradacion" id="ValDeg"/>  
       </div>
             
       <div>
               <label>Impacto Confidencialidad</label>
               <output type="text" class="form-control" name="ImpactoConf" id="impaConf"/>  
       </div>
       
       <div>
               <label>Impacto Integridad</label>
               <output type="text" class="form-control" name="ImpactoInt" id="impaInt"/>  
       </div>   
              
       <div>
               <label>Impacto Disponibilidad</label>
               <output type="text" class="form-control" name="ImpactoDisp" id="impaDisp"/>  
       </div>
            
       <div>
               <label>Impacto Total</label>
               <output type="text" class="form-control" name="ImpactoTotal" id="impaTot"/>  
       </div>
             
       <div>
               <label>Riesgo Inherente</label>
               <output type="text" class="form-control" name="riesgoInherente" id="riesgIn"/>  
       </div> 
       
               
       <div>
          <br>
       
       		   <input class="btn btn-default"type = "button" value = "Calcular" onclick="calcular()">
	           <button class="btn btn-success" onclick= "guardar()">Guardar</button>
               <button type="resetall" class="btn btn-info">Limpiar</button>
               <button type="submit" class="btn btn-default" onclick="goBack()" >Cancelar</button>
       </div> 
       </form>
   </div>
</form>
</body> 
 
  <script>
      function goBack() {
           window.history.back();
       }
  </script> 

<script>
	$(document).ready(function(){
		$("#inArea").on("change", buscarActivo);
	});
	
	
	function buscarActivo()
	{
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
					$("#inActivo").html("<option value=''>- primero seleccione un Activo -</option>");
				},
				success: function(data){
					//$("#inActivo").html("<option value=''>- primero seleccione un Area -</option>");
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
	
	function ValDimensiones(){
		var activo = $("#inActivo").val();
		
		if(activo == ""){
				alert("Seleccione un Activo para continuar");
		}
		else {
			$.ajax({
				data: {nomActivo: activo},
				url:   'buscarValDimensiones.php',
				type:  'post',
				dataType: 'json',
				beforeSend: function(){
				},
				success: function(data){
					//lo que se si el destino devuelve algo	
					$("#ValDispo").html(data.valDisp);
					$("#ValInteg").html(data.valInt);
					$("#ValConf").html(data.valConf);
				},
				error:    function(xhr,err){ 
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
		}
	}
 </script>
 
 
 <script>
<<<<<<< HEAD
function ValDegradacion(){
=======

function ValDegradacion(){

>>>>>>> origin/master
		var activo = $("#inActivo").val();
		
		if(activo == ""){
				alert("Seleccione un Activo para continuar");
		}
		else {
			$.ajax({
				data: {nomActivo: activo},
				url:   'buscarValdeg.php',
				type:  'post',
				//dataType: 'json',
				beforeSend: function(){
				},
				success: function(resultado){
					//lo que se si el destino devuelve algo
					
					$("#ValDeg").html(resultado);
				},
				error:    function(xhr,err){ 
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
		}
	}
 </script>
 

  <script>
	function calcular(){
	
		var area = $("#inArea").val();
		var activo = $("#inActivo").val();
		var valCo = $("#ValConf").val();
		var valInte = $("#ValInteg").val();
		var valDis = $("#ValDispo").val();
		var valDeg = $("#ValDeg").val();	
		$.ajax({
				data: {area: area, nomactivo: activo, confi: valCo, integri: valInte, disp: valDis, degrada: valDeg},
				url:   'CalcularRiesgos.php',
				type:  'post',
				dataType: 'json',
				beforeSend: function(){
				},
				success: function(data){
					$("#impaConf").html(data.impactoConf);
					$("#impaInt").html(data.impactoInt);
					$("#impaDisp").html(data.impactoDisp);
					$("#impaTot").html(data.impacTotal);
					$("#riesgIn").html(data.riesInherente);
				},
				error:    function(xhr,err){ 
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
	}
 </script>
 
   <script>
		   
	function guardar(){
		
		
		var activo = $("#inActivo").val();
		var valCo = $("#impaConf").val();
		var valInte = $("#impaInt").val();
		var valDis = $("#impaDisp").val();
		var impTotal = $("#impaTot").val();
		var riesInhe = $("#riesgIn").val();
		
		alert(impTotal.length);
		
		if (){
			alert("No pueden haber valores en blanco");
		}
		else{
		$.ajax({
				data: {nomactivo: activo, confi: valCo, integri: valInte, disp: valDis, iTotal: impTotal, rInhe: riesInhe },
				url:   'GuardarCalculos.php',
				type:  'post',
				
				beforeSend: function(){			
				},
				success: function(data){
					var resuesta = data.val();
					alert(data);
				},
				error:    function(xhr,err){
					//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
		}
	}
 </script>


</html>