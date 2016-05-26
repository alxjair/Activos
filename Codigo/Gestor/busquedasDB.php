<?php

require_once ('../class.Conexion.php');


function buscarArea(){

	$db = new Conexion();
	$sql= $db -> query ("SELECT nom_Area FROM Area ;");
	return $sql;
}

function buscarActivo(){

	$db = new Conexion();
	$sql= $db -> query ("SELECT Nom_Activo FROM activo;");
	return $sql;
}

function buscartAmenaza(){

	$db = new Conexion();
	$sql= $db -> query ("SELECT Nom_Tipo_Amenaza FROM tipo_amenazas;");
	return $sql;
}

function buscarActivos($area){
	$db = new Conexion();
	$consulta = "SELECT * FROM activo";
	if($area != ''){
		$consulta .= " WHERE Area_idArea = (SELECT idArea FROM area WHERE nom_Area ='$area')";
	}
	$resultado = $db->query($consulta);
	$row = $db->recorrer($resultado);
	/*
	$sentencia = $db->prepare($consulta);
	$sentencia->bind_param('s',$area);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetch_all();
		$sentencia->close();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	var_dump($resultado);*/
	return $row;
	
}



?>