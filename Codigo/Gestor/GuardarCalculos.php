<?php
require ('../class.Conexion.php');

$conexion = new Conexion();

$nActivo = $_POST['nomactivo'];
$impactoConf = $_POST['confi'];
$impactoInt = $_POST["integri"];
$ImpactoDisp = $_POST['disp'];
$riesgoInherente = $_POST['rInhe'];
$impactoTotal= $_POST['iTotal'];

echo $nActivo;
<<<<<<< HEAD
=======


>>>>>>> origin/master
$consulta= $conexion -> query ("SELECT Id_Activo FROM activo WHERE Nom_Activo = '$nActivo';");
$idActivo=0;

while  ($row = $conexion->recorrer($consulta)){
	$idActivo = $row["Id_Activo"];
}

<<<<<<< HEAD
$idImpActivo = $idActivo
    
$sql = "INSERT INTO `impacto_por_dimension`(`Impacto_Id_Impacto`, `Impacto_Total`, `Activo_Id_Activo`, `ImpactoConf`, `ImpactoDis`, `ImpactoInte`) VALUES ('$idImpActivo','$impactoTotal','$idActivo','$impactoConf','$ImpactoDisp','$impactoInt');";
=======
$idImpActivo = $idActivo;

$sql = "INSERT INTO `impacto_por_dimension`(`Impacto_Id_Impacto`, `Impacto_Total`, `Activo_Id_Activo`, `ImpactoConf`, `ImpactoDis`, `ImpactoInte`) VALUES ('$idImpActivo','$impactoTotal','$idActivo','$impactoConf','$ImpactoDisp','$impactoInt');";

$sql2 = "UPDATE activo SET Riesgo_inherente='$riesgoInherente' WHERE Id_Activo='$idActivo';";
>>>>>>> origin/master

$sql2 = "UPDATE activo SET Riesgo_inherente='$riesgoInherente' WHERE Id_Activo='$idActivo';";

if (mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql2)){
    echo "Registros almacenados con Exito";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}
<<<<<<< HEAD
mysqli_close($conexion);
=======

mysqli_close($conexion);

>>>>>>> origin/master
?>