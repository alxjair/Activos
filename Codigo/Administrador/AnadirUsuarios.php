<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
    <title>Gestion usuarios</title>
</head>

<body>
  <form action="anadirUsuario.php?modo=insertUser" method="post"> 
   <div class="container-fluid well ">
       <img src="../../Imagenes/logoMUNDIAL.png" class="image-responsive">
   </div>
       
    <div class="container well ">
        <center><h1>Gestion de usuarios</h1></center>    
    </div>
    
    <div class="container well">
        
            <label for="nombre">Nombre</label>
            <div class="row">
                <div class="col-xs-8">
                     <input class="form-control" required="" type="text" name="username" pattern="[A-Za-z ]+">
                     
                </div>
             </div>
             <br/>
             
             <label for="usuario">Usuario</label>
             <div class="row">    
                 <div class="col-xs-4">
                     <input class="form-control" required="" type="text" name="usernick" pattern="[a-zA-Z0-9]+" title="NO debe contener signos">
                 </div>
             </div>
             <br/>
                 
             <label for="idusuario">Cedula</label>
             <div class="row">    
                 <div class="col-xs-4">
                     <input class="form-control" required="" type="text" id="text" name="userid" pattern="[0-9]+" title="Debe ser Numerico">
                 </div>
             </div>
             <br/>
                  
             <label for="contraseña">Contraseña</label>
             <div class="row">    
                 <div class="col-xs-4">
                     <input class="form-control" required="" type="password" id="contraseña" name="userpass" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Deberia contener almenos un numero, una letra en mayuscula y una letra en minuscula">
                     <span id="helpBlock" class="help-block">Por favor Introduzca una contraseña entre 8-16 caracteres</span>
                 </div>
             </div>
             <br/>
             
             <label for="email">Email</label>
             <div class="row">
                 <div class="col-xs-6">
                 <input class="form-control" type="email" required="" name="usermail">
                 
                 </div>
             </div>
             <br/>
             
             <div class="form-group">
                
                 <label for="perfil">Perfil</label>
                 <div class="row">
                    <div class="col-xs-4">
                        <select class="form-control" name="perfil">
                        <option value="Adminsitrador">Adminsitrador</option>
                        <option value="Gestor">Gestor</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Auditor">Auditor</option>
                     </select>
                    </div>
                 </div>
              
             </div>
             
             <div class="form-group">
                
                 <label for="estado">Estado</label>
                 <div class="row">
                    <div class="col-xs-4">
                        <select class="form-control" name="estado">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                     </select>
                    </div>
                 </div>
              
             </div>
                <input type= "hidden" name="insertar" value="1"/>  
                <button type="submit" class="btn btn-success" name="Guardar">Guardar</button>
                <button type="reset" class="btn btn-reset" name="Cancelar">Limpiar</button>
                <button type="button" class="btn btn-default" onclick="goBack()" name="Cancelar" >Cancelar</button>
           </div>
    </form>
    
     <script>
       function goBack() {
           window.history.back();
       }
    </script>
</body>
</html>