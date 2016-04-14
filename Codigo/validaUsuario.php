<?php 

require ('class.Conexion.php');
    
$modo=isset($_GET['modo']) ? $_GET['modo'] : 'default';
echo $modo;
switch ($modo){
    case 'login':
        
        if (isset($_POST['login'])){
            
            if (!empty($_POST['username']) and !empty($_POST['password'])){ 
                include ('class.Acceso.php');
                $login = new Acceso($_POST['username'],$_POST['password']);
                $login-> Login();
            }
            else{
               
                header ('location: Index.html');
            }
        }
        else{
            header('location : Index.html');
        }
    break;
    case 'Recordar' :
        header('Location : OlvidoContraseña.html');
        if(isset($_POST['email'])){
            alert("Hello! I am an alert box!!");
        }
        else
            echo 'ERROR';
    break;
    default:
       # $template =new Prinick();
       # $template->display('public/Index.html');
    break;
}
    

?>     


