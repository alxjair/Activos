<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
    <title>Generar Reportes</title>
</head>
<body>
    <div class="container-fluid well ">
       <img src="../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
       
    <div class="container well ">
        <center><h1>Generar Reporte</h1></center>    
    </div>
    <div class="form-group ">
       
            <div class="container well">
                <div class="form-group">
                            
                   <div class="form-group">
                       <label for="">Nombre de reporte</label>
                       <input class="form-control" type="text" >
                   </div>
                   
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" rows="6"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Generar Reporte</button>
                <button class="btn btn-default" onclick="goBack()">Cancelar Reporte</button>
            </div>
        </div>

    <script>
       function goBack() {
           window.history.back();
       }
    </script>
    
</body>
</html>