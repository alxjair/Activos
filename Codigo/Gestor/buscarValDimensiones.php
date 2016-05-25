<?php
	
require ('../class.Conexion.php');
include ('class.CalcRiesgos.php');
$conexion = new Conexion();

$conexion = new Conexion();

$nActivo= $_POST['nomActivo'];
$consulta= $conexion -> query ("SELECT * FROM activo WHERE Nom_Activo = '$nActivo';");

$resultDisp="";
$resultCof="";
$resultInt="";
while  ($row = $conexion->recorrer($consulta)){
	$idDis= $row["Disponibilidad_Id_Disponibilidad"];
	$idCof= $row["Confidencialidad_idConfidencialidad"];
	$idInt= $row["Integridad_idIntegridad"];
	
	if ($idDis == "1"){
		$resultDisp="MUY ALTO";
	}else if($idDis == "2"){
		$resultDisp= "ALTO";
	}else if($idDis == "3"){
		$resultDisp= "MEDIO";
	}else if($idDis == "4"){
		$resultDisp= "BAJO";
	}else if ($idDis == "5"){
		$resultDisp= "MUY BAJO";
	} 
	
	if ($idCof == "1"){
		$resultCof="MUY ALTO";
	}else if($idCof == "2"){
		$resultCof= "ALTO";
	}else if($idCof == "3"){
		$resultCof= "MEDIO";
	}else if($idCof == "4"){
		$resultCof= "BAJO";
	}else if ($idCof == "5"){
		$resultCof= "MUY BAJO";
	}
	
	if ($idInt == "1"){
		$resultInt="MUY ALTO";
	}else if($idInt == "2"){
		$resultInt= "ALTO";
	}else if($idInt == "3"){
		$resultInt= "MEDIO";
	}else if($idInt == "4"){
		$resultInt= "BAJO";
	}else if ($idInt == "5"){
		$resultInt= "MUY BAJO";
	}
	
}

mysqli_close($conexion);
$datos = array ("valConf"=>$resultCof,"valInt"=>$resultInt,"valDisp"=>$resultDisp);
echo json_encode($datos);
exit();

?>