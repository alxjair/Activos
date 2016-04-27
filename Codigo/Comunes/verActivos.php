
<?php
	require ('../class.Conexion.php');
	$db = new Conexion();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <div class="container-fluid well ">
       <img src="../../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
    
    <div class="container">
        <table class="table table-striped table-bordered" border="1">
            <thead>
                <tr>
                    <th>Nombre del Activo</th>
                    <th>Descripcion del activo</th>
                    <th>Propietario del activo</th>
                </tr>
                <?php
                        $sql= $db -> query ("SELECT * FROM activo ;");
                        while($row = $db -> recorrer($sql)) {
                            
							$NAMEACT = $row['Nom_Activo'];
							$DESCACTIVO =$row ['Desc_Activo'];
							$PROPIETARIO = $row ['Propietario_Activo'];
    						echo "<tr>";
								echo "<th>$NAMEACT</th>";
								echo "<th>$DESCACTIVO</th>";
								echo "<th>$PROPIETARIO</th>";
							echo "</tr>";
                        }
                 ?>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button type="submit" class="btn btn-default" onclick="goBack()" >Cancelar</button>
    </div>
    <script>
      function goBack() {
           window.history.back();
       }
    </script>
</body>
</html>