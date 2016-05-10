<?php

require_once ('../class.Conexion.php');

$conexion = new Conexion();

$dArea= $_POST['nomArea'];	

$consulta= $conexion -> query ("SELECT * FROM activo WHERE Area_idArea = (SELECT idArea FROM area WHERE nom_Area = '$dArea');");

var_dump($consulta);

while  ($row = $conexion->recorrer($consulta)){	
	$linea = $row["Nom_Activo"];
	echo "<option>$linea</option>";
}

?>