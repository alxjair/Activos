


<?php

/**
******************************************************
* @file CalcularRiesgos.php
* @brief Archivo encargado de comunicar con la clase de calculo y manejar la entrada y salida de los datos a calcular y calculados respectivamente.
* @author Grupo Proyecto Sistema de Gestión Activos de Información ingesoft2
* @version 3.0
* @date Mayo 2016
*******************************************************/
	
require ('../class.Conexion.php');
include ('class.CalcRiesgos.php');


$conexion = new Conexion();

$valCon = $_POST['confi']; 
$valInte = $_POST['integri'];
$valDisp = $_POST['disp'];
$valDeg = $_POST['degrada'];
$activo = $_POST['nomactivo'];

$riesgoActivo = new CalcRiesgos($valDeg);
$riesgConf = $riesgoActivo -> CalcImpactActivo($valCon);
$riesInt = $riesgoActivo -> CalcImpactActivo($valInte);
$riesDisp = $riesgoActivo -> CalcImpactActivo($valDisp);
$ImpacTotal = $riesgoActivo -> CalcImpactTotalActivo($riesgConf, $riesInt, $riesDisp);

$sql = $conexion -> query ("SELECT Id_Activo FROM activo WHERE Nom_Activo = '$activo';");
$idActv=0;


while  ($row = $conexion->recorrer($sql)){
	$idActv= $row["Id_Activo"];
}

$sql2 = $conexion -> query ("SELECT Probabilidad_Ocurrencia FROM Activo_has_Amenazas WHERE Activo_Id_Activo = '$idActv';");

$sql = $conexion -> query ("SELECT Id_Activo FROM activo WHERE Nom_Activo = '$activo';");

$idActv=0;
while  ($row = $conexion->recorrer($sql)){
	$idActv= $row["Id_Activo"];
}


$sql2 = $conexion -> query ("SELECT Probabilidad_Ocurrencia FROM Activo_has_Amenazas WHERE Activo_Id_Activo = '$idActv';");


$probabilidad="";
while  ($row1 = $conexion->recorrer($sql2)){
	$probabilidad= $row1["Probabilidad_Ocurrencia"];
}

if($probabilidad!=""){
	$riesInherente = $riesgoActivo -> CalcrInherente($probabilidad,$ImpacTotal);	
}


$datos = array ("impactoConf"=>$riesgConf,"impactoInt"=>$riesInt,"impactoDisp"=>$riesDisp,"impacTotal" =>$ImpacTotal, "riesInherente"=>$riesInherente);
echo json_encode($datos);
exit();


$datos = array ("impactoConf"=>$riesgConf,"impactoInt"=>$riesInt,"impactoDisp"=>$riesDisp,"impacTotal" =>$ImpacTotal, "riesInherente"=>$riesInherente);
echo json_encode($datos);
exit();

?>