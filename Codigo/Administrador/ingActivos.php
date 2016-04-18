<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">    
    <title>Formularios Activos</title>
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
</head>

<body>
  <form action="IngresarActivos.php?modo=insert" method="post"> 
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
                        require ('../class.Conexion.php');
                        $db = new Conexion();
                        $sql= $db -> query ("SELECT * FROM tipo_activo ;");
                        while($row = $db -> recorrer($sql)) {
                            $tActivo=$row["Nom_Tipo_Activo"];
                            echo "<option>$tActivo</option>";
                        }
                    ?>         
                </select>
                <br />
            <br>  
            <label class="col-sm">Area</label>
                <select class="form-control" name="Area" >
                    <option >DIRECCION DE RIESGOS</option>
                </select>
            <br />
            <br>
                          
             <label class="col-sm">Contenedor de Activos</label>
                <select class="form-control" name="ContActivos" >
                    <option >SI</option>
                    <option >NO</option>
                </select>
            <br />
            <br>
                
             <label class="col-sm">Valor Confidencialidad</label>
                <select class="form-control" name="ValConfidencialidad" >
                    <option >CONFIDENCIAL</option>
                    <option >PRIVADO</option>
                    <option >PUBLICO</option>
                </select>
             <br>
             
             <label class="col-sm">Valor Integridad</label>
                <select class="form-control" name="ValIntegridad" >
                    <option >NO CRITICA</option>
                    <option >CRITICA</option>
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
                <input type="text" class="form-control" id="formGroup" name="Soporte">
                <!--<br> 
                <label>Dependencia de Otros Activos</label>
                <input type="text" class="form-control" id="formGroup" >
                <br>--> 
                               
             <label class="col-sm">Tipo de activo</label>
                 <select class="form-control" name="TipoActivo" >
                    <option value="">FISICO</option>
                    <option >ELECTRONICO</option>
                </select>
             <br/>
             
             <label class="col-sm">Medio de Almacenamiento</label>
                 <select class="form-control" name="MedioAlmacenamiento" >
                    <option value="">ELECTRONICO</option>
                    <option >FISICO</option>
                    <option >FISICO Y ELECTRONICO</option>
                </select>
             <br/>
             
            <label class="col-sm">Proceso</label>                   
                    <select class="form-control" name="Proceso" >
                    <option >SOFTWARE UTILITARIO</option>
                </select>
                 <br/>
                
                <label class="col-sm">SubProceso</label>                   
                    <select class="form-control" name="SubProceso" >
                    <option >TECNOLOGIA</option>
                    <option >SINIESTROS</option>
                    <option >RIESGOS</option>
                </select>
                <br/>
                
            <label class="col-sm">Valor Disponibilidad</label>
                <select class="form-control" name="ValDisponibilidad" >
                    <option >INDISPENSABLE</option>
                    <option >NECESARIA</option>
                    <option >NORMAL</option>
                </select>
             <br>
            </div>
        </div>      
                <button type="submit" class="btn btn-success" onclick="alert('Se Ha Agregado El Usuario!')">Enviar</button>
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