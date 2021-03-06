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
        <br>
        <form class="form-horizontal">
        <div class="row">
            <div class="col-sm-6" id="left">
                <label>Codigo</label>
                <input type="text" class="form-control" name= "CodActivo" id= "codActivo" required="" pattern="[A-Za-z]+[-]+[0-9]+" title="El codigo debe ser en el Formato  Iniciales Area - Numero">
                <br>
                <label>Nombre del Activo</label>
                <input type="text" class="form-control"  name="NomActivo" id= "nActivo" required="" pattern="[A-Za-z ]+">
                <br>
                <label>Propietario del Activo</label>
                <input type="text" class="form-control"  name="NomPropietario" id= "pActivo" required="" pattern="[A-Za-z ]+" >
                <br>
                <label>Descripcion del Activo</label>
                <input type="text" class="form-control"  name="DescActivo" id= "dActivo" required="" pattern="[A-Za-z ]+">
                <br>
                <label>Soporte Funcional</label>
                <input type="text" class="form-control"  name="SopFuncional" id= "sfActivo" required="" pattern="[A-Za-z ]+">
                <br>
                 
            <label class="col-sm">Clasificacion del Activo</label>
                <select class="form-control" name="Clasificacion" id= "cActivo">
                    <option>-Seleccione una opcion-</option>
                     <?php
                        $sql= $db -> query ("SELECT * FROM clasificacion_activo ;");
                        while($row = $db -> recorrer($sql)) {
                            $cActivo=$row["Nom_Clasificacion_Activo"];
                            echo "<option>$cActivo</option>";
                        }
                    ?>         
                </select>
            <br>
            <label class="col-sm">Area</label>
                <select class="form-control" name="Area" id= "nArea" >
                   <option>-Seleccione una opcion-</option>
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
                <select class="form-control" name="ValConfidencialidad" id= "valConfActivo">
                   <option>-Seleccione una opcion-</option>
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
                <select class="form-control" name="ValIntegridad" id= "valInteActivo">
                   <option>-Seleccione una opcion-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM integridad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tInteg=$row["val_Integridad"];
                            echo "<option>$tInteg</option>";
                        }
                    ?>
                </select>
             <br>
            </div>
             
            <div class="col-sm-6">
                <label>Remitente/Destinatario/No Aplica</label>
                <input type="text" class="form-control" id="valRemitente" name="Remitente" required="" pattern="[A-Za-z ]+"> 
                <br>
                <label>Ubicacion</label>
                <input type="text" class="form-control" id="nUbicacion" name="Ubicacion" required="" pattern="[A-Za-z ]+"> 
                <br>
                <label>Custodio del Activo(Cargo-Nombre)</label>
                <input type="text" class="form-control" id="nCustodia" name="CustodioActivo" required="" pattern="[A-Za-z ]+">
                <br> 
                <label>Soporte Tecnico</label>
                <input type="text" class="form-control" id="nSopTecnico" name="SopTecnico" required="" pattern="[A-Za-z ]+">
             <br>                  
             <label class="col-sm">Tipo de activo</label>
                 <select class="form-control" name="TipoActivo" id ="nTipoActivo">
                   <option>-Seleccione una opcion-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM tipo_activo ;");
                        while($row = $db -> recorrer($sql)) {
                            $tTipo = $row["Nom_Tipo_Activo"];
                            echo "<option>$tTipo</option>";
                        }
                    ?>
                </select>
             <br>
             <label class="col-sm">Medio de Almacenamiento</label>
                 <select class="form-control" name="MedioAlmacenamiento"  id ="nMedio">
                   <option>-Seleccione una opcion-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM med_almacenamiento ;");
                        while($row = $db -> recorrer($sql)) {
                            $tMedA = $row["Nom_Med_Almacenamiento"];
                            echo "<option>$tMedA</option>";
                        }
                    ?>
                </select>
             <br>
            <label class="col-sm">Valor Disponibilidad</label>
                <select class="form-control" name="ValDisponibilidad"  id ="nvalDispActivo">
                   <option>-Seleccione una opcion-</option>
                    <?php
                        $sql= $db -> query ("SELECT * FROM disponibilidad ;");
                        while($row = $db -> recorrer($sql)) {
                            $tNdisp = $row["val_Disponibilidad"];
                            echo "<option>$tNdisp</option>";
                        }
                    ?>
                </select>
             <br>
             <label class="col-sm">Valor Entrada/Salida</label>
                <select class="form-control" name="EntradaActivo" id ="nEntrada" >
                   <option>-Seleccione una opcion-</option>
                    <option >ENTRADA</option>
                    <option >SALIDA</option>
                    <option >ENTRADA/SALIDA</option>
                    <option >NO APLICA</option>
                </select>
             <br>
            </div>
          </div>
                <input type= "hidden" name="insetAct" value="1"/>
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="submit" class="btn btn-default" onclick="goBack()" >Cancelar</button>
        </form>
    </div>
      <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
    
    </form>
</body>
</html>