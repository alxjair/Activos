<?php 

class Acceso {
    
    protected $user;
    protected $pass;
    
    public function __construct($usuario,$password){
        $this->user = $usuario;
        $this->pass = $password;
    }
    
    public function login(){
        
        $db = new Conexion();
        $sql= $db -> query ("SELECT nick_Usuario, pass_Usuario, Perf_Usuario_idPerf_Usuario FROM usuario WHERE nick_Usuario= '$this->user' OR pass_Usuario = '$this->pass';");
        $dato = $db -> recorrer($sql);
            
        if($dato['nick_Usuario']== $this->user and $dato['pass_Usuario']== $this->pass){
            if ($dato['Perf_Usuario_idPerf_Usuario']== 3){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: location: http://localhost/Activos/Codigo/Gerente/IngresarActivos.html');
                header('location: /Administrador/IngresarActivos.html');
            }
            else  if ($dato['Perf_Usuario_idPerf_Usuario']== 1){ 
                session_start();
                $_SESSION ['user']= $this->user;

                header('location: http://localhost/Activos/Codigo/Administrador/Administrador.html');
            }else  if ($dato['Perf_Usuario_idPerf_Usuario']== 2){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: location: http://localhost/Activos/Codigo/Gestor/Gestor.html');

                header('location: /Administrador/Administrador.html');
            }else  if ($dato['Perf_Usuario_idPerf_Usuario']== 2){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: /Administrador/Gestor.html');

            }
            else  if ($dato['Perf_Usuario_idPerf_Usuario']== 4){ 
                session_start();
                $_SESSION ['user']= $this->user;
                header('location: location: http://localhost/Activos/Codigo/Auditor/Auditor.html');
                header('location: /Administrador/Auditor.html');
            }
            else{
                echo 'ERROR!!!!';
            }
        }
        else{
            header ('location: Index.html');
            
        }
            
    }
}



?>