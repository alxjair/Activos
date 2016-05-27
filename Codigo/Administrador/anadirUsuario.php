/**
******************************************************
* @file anadirUsuario.php
* @brief Archivo encargado de añadir usuarios a la base de datos con sus respectivos campos.
* @author Grupo Proyecto Sistema de Gestión Activos de Información ingesoft2
* @version 3.0
* @date Mayo 2016
*******************************************************/
 
<?php 

require ('../class.Conexion.php');
    
$modo=isset($_GET['modo']) ? $_GET['modo'] : 'default';

switch ($modo){
    case 'insertUser':  
        if (isset($_POST['insertar'])){
                 
          include ('../class.Anadir.php');
          $add = new Anadir($_POST['usernick'], $_POST['userpass'], $_POST['estado'], $_POST['username'], $_POST['perfil'], $_POST['userid'],      $_POST['usermail']);
          $add-> insertUser();
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


