<?php
	require_once("../Gestor/busquedasDB.php");
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
       <center><h1>Modificar Activos de Informacion</h1></center>
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
         <br>
       <div>
            <label class="col-sm">Seleccione un Activo</label>
               <select class="form-control" name="NombreActivo" id="inActivo" onchange="cargarValores()">
                  <option value="">-Selecciona un Activo-</option>
               </select>
       </div>
               
        <br>      
       <div class="row">
           
            <div class="col-sm-6">
      
                <label>Nombre del Activo</label>
                <input type="text" class="form-control" name="NomActivo" id="nActivo" required="" pattern="[A-Za-z ]+">
                <br>
                <label>Propietario del Activo</label>
                <input type="text" class="form-control" id="nPropietario" name="NomPropietario" required="" pattern="[A-Za-z ]+">
                <br>
                <label>Descripcion del Activo</label>
                <input type="text" class="form-control" id="ndescActivo" name="DescActivo" required="" pattern="[A-Za-z ]+">
                <br>
                <label>Soporte Funcional</label>
                <input type="text" class="form-control" id="nsopFuncional" name="SopFuncional" required="" pattern="[A-Za-z ]+">
                <br> 
                
            <label class="col-sm">Clasificacion del Activo</label> 
                <select class="form-control" name="Clasificacion" id ="nClasActivo">
                  <option value="">-Selecciona un Activo-</option>
                   <?php
                        $sql= $db -> query ("SELECT * FROM clasificacion_activo ;");
                        while($row = $db -> recorrer($sql)) {
                            $cActivo=$row["Nom_Clasificacion_Activo"];
                            echo "<option>$cActivo</option>";
                        }
                    ?>
                </select>
                <br />
                
            <label class="col-sm">Area</label>
                <select class="form-control" name="Area"  id = "nArea">
                    <option value="">-Selecciona un Activo-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM area ;");
                        while($row = $db -> recorrer($sql)) {
                            $tArea=$row["nom_Area"];
                            echo "<option>$tArea</option>";
                        }
                    ?>
                </select>
             <br>
                          
                             
             <label class="col-sm">Valor Confidencialidad</label>
                <select class="form-control" name="area" id ="nConfidencialidad">
                   <option value="">-Selecciona un Activo-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM confidencialidad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tConfi=$row["val_Confidencialidad"];
                            echo "<option>$tConfi</option>";
                        }
                    ?>
                </select>
             <br>
             
             <label class="col-sm">Valor Integridad</label>
                <select class="form-control" name="integridad" id= "nIntegridad">
                   <option value="">-Selecciona un Activo-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM integridad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tInteg=$row["val_Integridad"];
                            echo "<option>$tInteg</option>";
                        }
                    ?>
                </select>
             <br>
            
             
               <label class="col-sm">Valor Disponibilidad</label>
                <select class="form-control" name="disponabilidad" id= "nDisponabilidad">
                  <option value="">-Selecciona un Activo-</option>
                   <?php
                        $sql= $db -> query ("SELECT * FROM disponibilidad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tNdisp = $row["val_Disponibilidad"];
                            echo "<option>$tNdisp</option>";
                        }
                    ?>
                </select>
             <br>

            </div>
            
            <div class="col-sm-6">
                <label>Remitente/Destinatario/No Aplica</label>
                <input type="text" class="form-control" id="nRemitente" name="Remitente" required="" pattern="[A-Za-z ]+"> 
                <br>
                <label>Ubicacion</label>
                <input type="text" class="form-control" id="nUbicacion" name="Ubicacion" required="" pattern="[A-Za-z ]+"> 
                <br>
                <label>Custodio del Activo(Cargo-Nombre)</label>
                <input type="text" class="form-control" id="nCustodioActivo" name="CustodioActivo" required="" pattern="[A-Za-z ]+">
                <br> 
                <label>Soporte Tecnico</label>
                <input type="text" class="form-control" id="nSopTecnico" name="SopTecnico" required="" pattern="[A-Za-z ]+">
                <br> 
                
                               
             <label class="col-sm">Tipo de activo</label>
                 <select class="form-control" name="Tipo de activo" id=nTactivo>
                  <option value="">-Selecciona un Activo-</option>
                   <?php
                        $sql= $db -> query ("SELECT * FROM tipo_activo ;");
                        while($row = $db -> recorrer($sql)) {
                            $tTipo = $row["Nom_Tipo_Activo"];
                            echo "<option>$tTipo</option>";
                        }
                    ?>
                </select>
             <br/>
             
             <label class="col-sm">Medio de Almacenamiento</label>
                 <select class="form-control" name="TipoAlma" id="nTipoAlma">
                    <?php
                        $sql= $db -> query ("SELECT * FROM med_almacenamiento ;");
                        while($row = $db -> recorrer($sql)) {
                            $tMedA = $row["Nom_Med_Almacenamiento"];
                            echo "<option>$tMedA</option>";
                        }
                    ?>
                </select>
             <br/>
             
             
               <label class="col-sm">Valor Entrada/Salida</label>
                <select class="form-control" name="EntradaActivo" id="nEntradaActivo">
                    <option value="black">ENTRADA</option>
                    <option value="green">SALIDA</option>
                    <option value="red">ENTRADA/SALIDA</option>
                    <option value="red">NO APLICA</option>
                </select>
            </div>
        </div>      
       
               
       <div>
          <br>
       
       		   <input class="btn btn-default"type = "button" value = "Actualizar" onclick="calcular()">
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
	function cargarValores(){
		
		//$("#nClasActivo").html("<option value=''>- primero seleccione un activo -</option>");

		var activo ?$("#inActivo").val();
		
		alert(activo);

		$.ajax({

				data: {nomActivo: activo},
				url:   'cargarDatos.php',
				type:  'post',
				dataType: 'json',

				beforeSend: function(){
				},
				success: function(data){
					
					$("#nActivo").html(data.nActivo);
					/*$("#nPropietario").html(data.nPropietario);
					$("#ndescActivo").html(data.ndescActivo);
					$("#nsopFuncional").html(data.nsopFuncional);
					$("#nClasActivo").html(data.nClasActivo);
					$("#nArea").html(data.nArea);
					$("#nConfidencialidad").html(data.nConfidencialidad);
					$("#nIntegridad").html(data.nIntegridad);
					$("#nDisponabilidad").html(data.nDisponabilidad);
					$("#nRemitente").html(data.nRemitente);
					$("#nUbicacion").html(data.nUbicacion);
					$("#nCustodioActivo").html(data.nCustodioActivo);
					$("#nSopTecnico").html(data.nSopTecnico);
					$("#nTactivo").html(data.nTactivo);
					$("#nTipoAlma").html(data.nTipoAlma);
					$("#nEntradaActivo").html(data.nEntradaActivo);*/
										
					
					
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