


<?php


/**
******************************************************
* @file GuardarCalculos.php
* @brief Archivo encargado de guardar los calculos realizados en  la base de datos.
* @author Grupo Proyecto Sistema de Gestión Activos de Información ingesoft2
* @version 3.0
* @date Mayo 2016
*******************************************************/
require ('../class.Conexion.php');

$conexion = new Conexion();

$nActivo = $_POST['nomactivo'];
$impactoConf = $_POST['confi'];
$impactoInt = $_POST["integri"];
$ImpactoDisp = $_POST['disp'];
$riesgoInherente = $_POST['rInhe'];
$impactoTotal= $_POST['iTotal'];

echo $nActivo;

$consulta= $conexion -> query ("SELECT Id_Activo FROM activo WHERE Nom_Activo = '$nActivo';");
$idActivo=0;

while  ($row = $conexion->recorrer($consulta)){
	$idActivo = $row["Id_Activo"];
}

$idImpActivo = $idActivo
    
$sql = "INSERT INTO `impacto_por_dimension`(`Impacto_Id_Impacto`, `Impacto_Total`, `Activo_Id_Activo`, `ImpactoConf`, `ImpactoDis`, `ImpactoInte`) VALUES ('$idImpActivo','$impactoTotal','$idActivo','$impactoConf','$ImpactoDisp','$impactoInt');";

$idImpActivo = $idActivo;

$sql = "INSERT INTO `impacto_por_dimension`(`Impacto_Id_Impacto`, `Impacto_Total`, `Activo_Id_Activo`, `ImpactoConf`, `ImpactoDis`, `ImpactoInte`) VALUES ('$idImpActivo','$impactoTotal','$idActivo','$impactoConf','$ImpactoDisp','$impactoInt');";

$sql2 = "UPDATE activo SET Riesgo_inherente='$riesgoInherente' WHERE Id_Activo='$idActivo';";


$sql2 = "UPDATE activo SET Riesgo_inherente='$riesgoInherente' WHERE Id_Activo='$idActivo';";

if (mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql2)){
    echo "Registros almacenados con Exito";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);
?>