<?php

require_once ('../class.Conexion.php');


function buscarArea(){

	$db = new Conexion();
	$sql= $db -> query ("SELECT nom_Area FROM Area ;");
	return $sql;
}

function buscarActivos($area = ''){
	$resultado = false;
	$consulta = "SELECT * FROM activo";
	if($area != ''){
		$consulta .= " WHERE Area_idArea = (SELECT idArea FROM area WHERE nom_Area = :nArea)";
	}
	var_dump ($consulta);
	$db = new Conexion();
	$sentencia = $db->prepare($consulta);
	var_dump($sentencia);
	$sentencia->bind_param('nArea',$area);
	
	try {
		if(!$sentencia->execute()){
			print_r($sentencia->errorInfo());
		}
		$resultado = $sentencia->fetchAll();
		//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$sentencia->closeCursor();
	}
	catch(PDOException $e){
		echo "Error al ejecutar la sentencia: \n";
			print_r($e->getMessage());
	}
	
	return $resultado;
	
}



?>