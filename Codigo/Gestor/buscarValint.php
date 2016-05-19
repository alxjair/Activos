<?php

require_once ('../class.Conexion.php');

$conexion = new Conexion();

$nActivo= $_POST['nomActivo'];
$consulta= $conexion -> query ("SELECT Integridad_idIntegridad FROM activo WHERE Nom_Activo = '$nActivo';");


while  ($row = $conexion->recorrer($consulta)){
	$idCof= $row["Integridad_idIntegridad"];
	$result="";
	
	if ($idCof == "1"){
		$result="MUY ALTO";
	}else if($idCof == "2"){
		$result= "ALTO";
	}else if($idCof == "3"){
		$result= "MEDIO";
	}else if($idCof == "4"){
		$result= "BAJO";
	}else if ($idCof == "5"){
		$result= "MUY BAJO";
	}
	echo $result; 
}

mysqli_close($conexion);

?>