<?php
	
require ('../class.Conexion.php');
include ('class.CalcRiesgos.php');



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




$datos = array ("impactoConf"=>$valCon,"impactoInt"=>$riesInt,"impactoDisp"=>$riesDisp,"impacTotal" =>$ImpacTotal);
echo json_encode($datos);
exit();


          
          #$ImpactoConfiden = new CalcRiesgos($_POST['ValorConf'], $_POST['Degradacion']);
          #$ImpactoConfiden -> CalcImpactActivo();
	
?>