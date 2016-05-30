


<?php

/**
******************************************************
* @file buscarValdeg.php
* @brief Archivo encargado de consultar en la base de datos el valor de la degradacion del activo.
* @author Grupo Proyecto Sistema de Gestión Activos de Información ingesoft2
* @version 3.0
* @date Mayo 2016
*******************************************************/

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