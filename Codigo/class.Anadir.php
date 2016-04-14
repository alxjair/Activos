<?php 

class Anadir {
    
    protected $user;
    protected $pass;
    protected $estado;
    protected $nombre;
    protected $perfil;
    protected $idUsuario;
    protected $mailUsuario;
    
    public function __construct($usuario,$password,$estate,$name,$perf,$id,$mail){
        $this->idUsuario = $id;
        $this->user = $usuario;
        $this->pass = $password;
        $this->estado = $estate;
        $this->nombre = $name;
        $this->perfil = $perf;
        $this->mailUsuario = $mail;
    }
    
    public function insertUser(){
        
        $db = new Conexion();
        $perfVal=0;
        if ($this->perfil =='Adminsitrador'){
            $perfVal=1;
        }
        else if ($this->perfil =='Gestor'){
            $perfVal=2;
        }
        else if ($this->perfil =='Gerente'){
            $perfVal=3;
        }
        else if ($this->perfil =='Auditor'){
            $perfVal=4;
        }
        
        $sql= $db -> query ("SELECT nick_Usuario, correo_Usuario FROM usuario WHERE nick_Usuario = '$this->user' OR pass_Usuario = '$this->pass';");
        $existe = $db -> recorrer($sql);
        
     
        if($existe['nick_Usuario'] != $this->user and $existe['correo_Usuario'] != $this->mailUsuario){
            
            $db -> query ("INSERT INTO Usuario (idUsuario, nick_Usuario, pass_Usuario, Perf_Usuario_idPerf_Usuario, correo_Usuario, nombreUsuario, estado) VALUES ('$this->idUsuario', '$this->user', '$this->pass', '$perfVal', '$this->mailUsuario', '$this->nombre', '$this->estado')");
        }
        else{ 
            
                
                echo '<script language="javascript">';
                echo 'alert("message successfully sent")';
                echo '</script>';
                exit;
                
        }
        header("Location: AnadirUsuarios.html");
        
    }   
}

?>