<?php

require_once ('../class.Conexion.php');

$conexion = new Conexion();

$nActivo= $_POST['nomActivo'];
$consulta= $conexion -> query ("SELECT Degradacion FROM activo WHERE Nom_Activo = '$nActivo';");


while  ($row = $conexion->recorrer($consulta)){
	$idDeg= $row["Degradacion"];
	echo $idDeg; 
}

mysqli_close($conexion);

?>