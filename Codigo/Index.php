<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../Estilos/css/Styles.css"/>
        <link rel="stylesheet" href="../Estilos/css/bootstrap.min.css">
    </head> 
    
    <body id="principal">
       <div id="caja">
       <img id="mundial" src="../Imagenes/logoMUNDIAL.png"/>    
        <form action="validaUsuario.php?modo=login" method="post" class="login">
            <input class="form-control" type="text" name="username" placeholder="Usuario"/>
            
            <input class="form-control" type="password" name="password" placeholder="Contrasena"/>
            <input type= "hidden" name="login" value="1"/>
            
            <input class="btn btn-info center-block form-control" type="submit" name="login" value="Login"/>
            <br>
            <input class="btn btn-info center-block form-control" onclick="location.href='OlvidoContraseña.html'" type="button" name= "recuperar" value="Recordar" />
        </form>
       </div>
    </body>
<html>