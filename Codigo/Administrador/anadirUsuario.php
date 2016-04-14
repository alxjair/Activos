<?php 

require ('class.Conexion.php');
    
$modo=isset($_GET['modo']) ? $_GET['modo'] : 'default';
echo $modo;

switch ($modo){
    case 'insert':  
        if (isset($_POST['insertar'])){
            
                 
          include ('class.Anadir.php');
          $add = new Anadir($_POST['usernick'], $_POST['userpass'], $_POST['estado'], $_POST['username'], $_POST['perfil'], $_POST['userid'],      $_POST['usermail']);
          $add-> insertUser();
        }
        else {
            
            header('Location : Administrador.html');
            echo 'Error!';
        }
    break;
    case 'Cancelar' :
        header('Location : Administrador.html');
    break;
    default:
       # $template =new Prinick();
       # $template->display('public/Index.html');
    break;
}

?>     


