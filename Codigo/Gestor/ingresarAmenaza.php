<!--EN ESTA CLASE SE AGREGAN LAS AMENZAS QUE HAY SOBRE EL IMPACTO Y EL CALCULO DE DEGRADACION SOBRE EL IMPACTO-->

<?php
	require_once("busquedasDB.php");
	require_once ('../class.Conexion.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">    
    <title>Ingreso Amenazas</title>
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
</head>

<body>
  <form action="" method="post">
   <div class="container-fluid well ">
       <img src="../../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
   
    <div class="container well">
        <center><h1>Ingreso de Amenzas</h1></center>
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
               <br>
           </div>
         
           <div>
                <label class="col-sm">Seleccione un Activo</label>
                   <select class="form-control" name="NombreActivo" id="nActivo" onchange="ValDimensiones();ValDegradacion()">
                  <option value="">-Selecciona un Activo-</option>
               </select>
               <br>
           </div>
                                
                <label class="col-sm">Tipo de Amenazas</label> 
                <div>
                    <select class="form-control" id="tipoAmenaza"  name="NombreAmenaza" onchange="buscarAmenazas()">
                       <option>-Selecciona un Tipo de Amenaza-</option>
                        <?php
				   		$tipAmenaza= buscartAmenaza();
				   		$db = new conexion();
				   		while($row = $db-> recorrer($tipAmenaza)){
                           $Amenaza=$row["Nom_Tipo_Amenaza"];
                           echo "<option>$Amenaza</option>";
                       }
                    ?>
                    </select>
                    <br>
                 </div>
                
                <label class="col-sm">Amenazas</label>
                <div>
                    <select class="form-control" id="Amenazas">
                    <option value="">-Selecciona una Amenaza-</option>
                    </select>
                    <br>
                </div>
                
                <label class="col-sm">Vulnerabilidades</label>
                <div>
                   <input type="text" class="form-control" id="Vulnerabilidad" required="">
                   <br>
                </div>
                
                 <label class="col-sm">Riesgos</label>
                <div>
                   <input type="text" class="form-control" id="Riesgo" required="">
                   <br>
                </div>
                
                <label class="col-sm">Degradacion</label>
                <div>
                    <select class="form-control" required="" id="Deg">
                       <option value="">-Seleccione una degradacion-</option>
                       <option value="">0%-24%</option>
                       <option value="">25%-49%</option>
                       <option value="">50%-74%</option>
                       <option value="">75%-89%</option>
                       <option value="">90%-100%</option>
                    </select>
                    <br>
                </div>
                
                <label class="col-sm">Probabilidad de Ocurrencia</label>
                <div>
                    <select class="form-control" required="" id="Prob">
                       <option value="">-Seleccione una degradacion-</option>
                       <option value="">MUY FRECUENTE</option>
                       <option value="">PROBABLE</option>
                       <option value="">PUEDE OCURRIRE</option>
                       <option value="">EVENTUALMENTE</option>
                       <option value="">RARA VEZ</option>
                    </select>
                </div>

        <div>
           <br>
            <input type= "hidden" name="insetAct" value="1"/>
                <button type="submit" class="btn btn-success" onclick= "guardar()">Guardar</button>
                <button type="resetAll" class="btn btn-info">Limpiar</button>
                <button type="submit" class="btn btn-default" onclick="goBack()" >Cancelar</button>
        </div> 

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
		$("#nActivo").html("<option value=''>- primero seleccione un activo -</option>");
		var area = $("#inArea").val();
		if(area == ""){
				$("#nActivo").html("<option value=''>- primero seleccione un Area -</option>");
		}
		else {
			$.ajax({
				data: {nomArea: area},
				url:   'buscarActivo.php',
				type:  'post',
				beforeSend: function(){
					$("#nActivo").html("<option value=''>- primero seleccione un Activo -</option>");
				},
				success: function(data){
					//$("#inActivo").html("<option value=''>- primero seleccione un Area -</option>");
					//lo que se si el destino devuelve algo
					$("#nActivo").html(data);
				},
				error:    function(xhr,err){ 
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
		}
		
	}
	
</script>
<script>
	$(document).ready(function(){
		$("#tipoAmenaza").on("change", buscarAmenazas);
	});
	
	
	function buscarAmenazas(){
		
		$("#Amenazas").html("<option value=''>-Seleccione una Amenaza-</option>");

		var tAmenaza = $("#tipoAmenaza").val();

		if(tAmenaza == ""){
				$("#Amenazas").html("<option value=''>-Seleccione un Tipo de Amenaza-</option>");
		}
		else {
			$.ajax({

				data: {nomAmenazas: tAmenaza},
				url:   'buscarAmenaza.php',
				type:  'post',

				beforeSend: function(){
					$("#Amenazas").html("<option value=''>- primero seleccione un Tipo de Amenaza -</option>");
				},
				success: function(data){
					$("#Amenazas").html("<option value=''>- primero seleccione un Tipo de Amenaza -</option>");
					//lo que se si el destino devuelve algo
					$("#Amenazas").html(data);
				},
				error:    function(xhr,err){ 
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
		}
	}
	
</script>

 <script>
	function guardar(){
		
        
		var activo = $("#nActivo").val();
		var amenaza = $("#Amenazas").val();
		var vulnerabilidad = $("#Vulnerabilidad").val();
		var riesgos = $("#Riesgo").val();
		var degradacion = $("#Deg").val();Prob
		var probabi = $("#Prob").val();
		
		alert(activo);
		$.ajax({

				data: {nomactivo: activo, vAmenaza: amenaza, vulne: vulnerabilidad, ries: riesgos, degra: degradacion, proba: probabi},
				url:   'GuardarAmenazas.php',
				type:  'post',
				dataType: 'json',
				beforeSend: function(){
				},
				success: function(data){
					var resuesta = data.val();
					alert(resuesta);
				},
				error:    function(xhr,err){ 
					alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
				}
			});
	
		
	}
 </script>

</html>