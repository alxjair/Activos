<?php 

class Acceso {
    
    protected $user;
    protected $pass;
    
    public function __construct($usuario,$password){
        $this->user = $usuario;
        $this->pass = $password;
    }
    //Matriz asociativa para redirecciones
    public function login(){
        
        $db = new Conexion();
        $sql= $db -> query ("SELECT nick_Usuario, pass_Usuario, Perf_Usuario_idPerf_Usuario FROM usuario WHERE nick_Usuario= '$this->user' OR pass_Usuario = '$this->pass';");
        $dato = $db -> recorrer($sql);
            
        if($dato['nick_Usuario']== $this->user and $dato['pass_Usuario']== $this->pass){
            if ($dato['Perf_Usuario_idPerf_Usuario']== 3){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: http://localhost/Activos/Codigo/Comunes/ingActivos.php');
            }
            else  if ($dato['Perf_Usuario_idPerf_Usuario']== 1){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: http://localhost/Activos/Codigo/Administrador/Administrador.php');
            }else  if ($dato['Perf_Usuario_idPerf_Usuario']== 2){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: location: http://localhost/Activos/Codigo/Gestor/Gestor.php');
            }else  if ($dato['Perf_Usuario_idPerf_Usuario']== 2){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: /Administrador/Gestor.php');
            }
            else  if ($dato['Perf_Usuario_idPerf_Usuario']== 4){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: location: http://localhost/Activos/Codigo/Auditor/Auditor.php');
            }
            else{
                echo 'ERROR!!!!';
            }
        }
        else{
            header ('location: Index.php');
            
        }
            
    }
}



?>