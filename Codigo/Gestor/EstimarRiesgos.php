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
  <form action="IngresarActivos.php?modo=insertActivo" method="post"> 
   <div class="container-fluid well ">
       <img src="../../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
   
    <div class="container well">
        <center><h1>Registro de Activos de Informacion</h1></center>
        <form class="form-horizontal">
        
        <div class="row">
            <div class="col-sm-6">
                <label>Codigo</label>
                <input type="text" class="form-control" id="formGroup" name= "CodActivo">
                <br>
                <label>Nombre del Activo</label>
                <input type="text" class="form-control" id="formGroup" name="NomActivo">
                <br>
                <label>Propietario del Activo</label>
                <input type="text" class="form-control" id="formGroup" name="NomPropietario">
                <br>
                <label>Descripcion del Activo</label>
                <input type="text" class="form-control" id="formGroup" name="DescActivo">
                <br>
                <label>Soporte Funcional</label>
                <input type="text" class="form-control" id="formGroup" name="SopFuncional">
                <br> 
                
            <label class="col-sm">Clasificacion del Activo</label> 
                <select class="form-control" name="Clasificacion" >
                     <?php
                        $sql= $db -> query ("SELECT * FROM clasificacion_activo ;");
                        while($row = $db -> recorrer($sql)) {
                            $cActivo=$row["Nom_Clasificacion_Activo"];
                            echo "<option>$cActivo</option>";
                        }
                    ?>         
                </select>
                <br />
            <br>  
            <label class="col-sm">Area</label>
                <select class="form-control" name="Area" >
                    <?php
                        $sql= $db -> query ("SELECT * FROM area ;");
                        while($row = $db -> recorrer($sql)) {
                            $tArea=$row["nom_Area"];
                            echo "<option>$tArea</option>";
                        }
                    ?>
                </select>
            <br />
            <br>
                
             <label class="col-sm">Valor Confidencialidad</label>
                <select class="form-control" name="ValConfidencialidad" >
                    <?php
                        $sql= $db -> query ("SELECT * FROM confidencialidad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tConfi=$row["Nom_Confidencialidad"];
                            echo "<option>$tConfi</option>";
                        }
                    ?>
                </select>
             <br>
             
             <label class="col-sm">Valor Integridad</label>
                <select class="form-control" name="ValIntegridad" >
                    <?php
                        $sql= $db -> query ("SELECT * FROM integridad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tInteg=$row["Nom_Integridad"];
                            echo "<option>$tInteg</option>";
                        }
                    ?>
                </select>
             <br>
             
             <label class="col-sm">Valor Entrada/Salida</label>
                <select class="form-control" name="EntradaActivo" >
                    <option >ENTRADA</option>
                    <option >SALIDA</option>
                    <option >ENTRADA/SALIDA</option>
                    <option >NO APLICA</option>
                </select>
             <br>
            </div>
            
            <div class="col-sm-6">
                <label>Remitente/Destinatario/No Aplica</label>
                <input type="text" class="form-control" id="formGroup" name="Remitente"> 
                <br>
                <label>Ubicacion</label>
                <input type="text" class="form-control" id="formGroup" name="Ubicacion" > 
                <br>
                <label>Custodio del Activo(Cargo-Nombre)</label>
                <input type="text" class="form-control" id="formGroup" name="CustodioActivo">
                <br> 
                <label>Soporte Tecnico</label>
                <input type="text" class="form-control" id="formGroup" name="SopTecnico">
                               
             <label class="col-sm">Tipo de activo</label>
                 <select class="form-control" name="TipoActivo" >
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
                 <select class="form-control" name="MedioAlmacenamiento" >
                    <?php
                        $sql= $db -> query ("SELECT * FROM med_almacenamiento ;");
                        while($row = $db -> recorrer($sql)) {
                            $tMedA = $row["Nom_Med_Almacenamiento"];
                            echo "<option>$tMedA</option>";
                        }
                    ?>
                </select>
             <br/>
             
            <label class="col-sm">Valor Disponibilidad</label>
                <select class="form-control" name="ValDisponibilidad" >
                    <?php
                        $sql= $db -> query ("SELECT * FROM disponibilidad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tNdisp = $row["Nom_Disponibilidad"];
                            echo "<option>$tNdisp</option>";
                        }
                    ?>
                </select>
             <br>
            </div>
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
</html>