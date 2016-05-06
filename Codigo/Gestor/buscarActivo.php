<?php
require_once("busquedasDB.php");

if(isset($_POST['area'])){
	
	$activos = buscarActivos($_POST['area']);
	
	$html = "<option value=''>- Seleccione un Activo -</option>";
	
	foreach($activos as $registro){
		$html .= "<option value=$registro[Nom_Activo]</option>";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}
/*
if(isset($_POST['municipio'])){
	
	$localidades= dameLocalidad($_POST['municipio']);
	
	$html = "<option value=''>- Seleccione una Localidad -</option>";
	foreach($localidades as $indice => $registro){
		$html .= "<option value='".$registro['idlocalidades']."'>".$registro['localidad']."</option>";
	}
	
	$respuesta = array("html"=>$html);
	echo json_encode($respuesta);
}*/

?>