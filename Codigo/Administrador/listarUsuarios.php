
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
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                </tr>
                <?php
                        $sql= $db -> query ("SELECT * FROM usuario ;");
                        while($row = $db -> recorrer($sql)) {
                            
							$ID = $row['idUsuario'];
							$NAME =$row ['nombreUsuario'];
							$NICK = $row ['nick_Usuario'];
							$STATE =$row ['estado'];		
    						echo "<tr>";
								echo "<th>$ID</th>";
								echo "<th>$NAME</th>";
								echo "<th>$NICK</th>";
								echo "<th>$STATE</th>";
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