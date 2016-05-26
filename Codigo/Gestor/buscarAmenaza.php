<?php

require_once ('../class.Conexion.php');

$conexion = new Conexion();

$dAmenazas= $_POST['nomAmenazas'];

$consulta= $conexion -> query ("SELECT * FROM amenazas WHERE Tipo_Amenazas_Id_Tipo_Amenazas = (SELECT Id_Tipo_Amenazas FROM tipo_amenazas WHERE Nom_Tipo_Amenaza = '$dAmenazas');");

echo "<option>Seleccione una Amenaza</option>";
while  ($row = $conexion->recorrer($consulta)){	
	$linea = $row["Nom_Amenazas"];
	echo "<option>$linea</option>";
}
?>