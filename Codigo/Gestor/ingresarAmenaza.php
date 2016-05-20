<?php
	require_once("busquedasDB.php");
	require_once ('../class.Conexion.php');
?>

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
                
                <label class="col-sm">Activo</label> 
                <div>
                    <select class="form-control" name="NombreArea" id="inArea"     onchange="buscarActivo()">
                        <option value="">-Selecciona un Activo-</option>
                        <?php
				   		$activo= buscarActivo();
				   		$db = new conexion();
				   		while($row = $db-> recorrer($activo)){
                           $tArea=$row["Nom_Activo"];
                           echo "<option>$tArea</option>";
                       }
                    ?>
               
                    </select>
                 </div>
                 
                <label class="col-sm">Tipo de Amenazas</label> 
                <div>
                    <select class="form-control" name="NombreArea" id="tAmenaza">
                       <option ></option>
               
                    </select>
                 </div>
                
                <label class="col-sm">Amenazas</label> 
                <div>
                    <select class="form-control" id="Amenaza">
                      <option ></option>
                    </select>
                </div>
                
                <label class="col-sm">Vulnerabilidades</label>
                <div>
                   <input type="text" class="form-control" id="formGroup">
                </div>
                
                 <label class="col-sm">Riesgos</label>
                <div>
                   <input type="text" class="form-control" id="formGroup">
                </div>
                
                <label class="col-sm">Impacto</label>
                <div> 
                    <select class="form-control" required="">
                       <option value="">-Seleccione un Impacto-</option>
                       <option value="">0%-24%</option>
                       <option value="">25%-49%</option>
                       <option value="">50%-74%</option>
                       <option value="">75%-89%</option>
                       <option value="">90%-100%</option>
                    </select>
                </div>

        <div>
           <br>
            <input type= "hidden" name="insetAct" value="1"/>
                <button type="submit" class="btn btn-success" onclick="alert('Se Ha Agregado el Activo!')">Guardar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
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

</html>