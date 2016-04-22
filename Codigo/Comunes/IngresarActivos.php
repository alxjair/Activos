<?php 

require ('../class.Conexion.php');
    
$modo=isset($_GET['modo']) ? $_GET['modo'] : 'default';

switch ($modo){
    case 'insertActivo':  
        if (isset($_POST['insetAct'])){
			
		 $idActivo= $_POST['CodActivo'];
		 $nomActivo = $_POST['NomActivo'];
		 $proActivo = $_POST['NomPropietario'];
		 $descActivo = $_POST['DescActivo'];
		 $sopFunActivo = $_POST['SopFuncional'];
		 $clasActivo = $_POST['Clasificacion'];
		 $valEntrada = $_POST['EntradaActivo'];
		 $valRemitente = $_POST['Remitente'];
		 $ubiActivo = $_POST['Ubicacion'];
		 $cusActivo = $_POST['CustodioActivo'];
		 $sopActivo = $_POST['SopTecnico'];
		 $malmaActivo = $_POST['MedioAlmacenamiento'];
		 $valConfiden = $_POST['ValConfidencialidad'];
		 $valIntegri = $_POST['ValIntegridad'];
		 $valDisp = $_POST['ValDisponibilidad'];
		 $tiActivo = $_POST['TipoActivo'];
         include ('class.Anadir.php');
         $add = new Anadir ($idActivo, $nomActivo, $proActivo, $descActivo, $sopFunActivo, $clasActivo, $valEntrada, $valRemitente, $ubiActivo, $cusActivo, $sopActivo, $malmaActivo, $valConfiden, $valIntegri, $valDisp, $tiActivo);
         $add -> insertActivo();
        }
        else {
            
            header('Location : window.history.back();');
            echo 'Error!';
        }
    break;
    case 'Cancelar' :
        header('Location : Administrador/Administrador.php');
    break;
    default:
       # $template =new Prinick();
       # $template->display('public/Index.html');
    break;
}







?>     

