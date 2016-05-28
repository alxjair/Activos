<?php
require ('../class.Conexion.php');

$conexion = new Conexion();

$nActivo = $_POST['nomactivo'];
$valorAmenaza = $_POST['vAmenaza'];
$Vulnerabilidad = $_POST['vulne'];
$Riesgos = $_POST['ries'];
$Degradacion = $_POST['degra'];
$Probabilidad = $_POST['proba'];

var_dump ($valorAmenaza);

$consulta= $conexion -> query ("SELECT Id_Activo FROM activo WHERE Nom_Activo = '$nActivo';");

$consulta1 = $conexion -> query ("SELECT Id_Amenazas FROM amenazas WHERE Nom_Amenazas = '$valorAmenaza';");

$idActivo=0;

while  ($row = $conexion->recorrer($consulta)){
    $idActivo = $row["Id_Activo"];
}

$idAmenaza = 0;

while ($row = $conexion->recorrer($consulta1)){
    $idAmenaza = $row["Id_Amenazas"];
}

$sql = "INSERT INTO `activo_has_amenazas`(`Amenazas_Id_Amenazas`, `Activo_Id_Activo`, `Probabilidad_Ocurrencia`, `Vulnerabilidades`, `Riesgos`) VALUES ('$idAmenaza','$idActivo','$Vulnerabilidad','$Riesgos')";

$sql1 = "UPDATE activo SET Degradacion = '$Degradacion' WHERE Id_Activo='$idActivo';";


if (mysqli_query($conexion, $sql) && mysqlli_query($conexion, $sql1)){
    echo "Registros almacenados con Exito";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);

?>