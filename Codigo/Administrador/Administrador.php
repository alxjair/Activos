<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
    <title>Administrador</title>
    <link rel="stylesheet" href="../../Estilos/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../../favicon.ico"> 
    <link rel="stylesheet" type="text/css" href="../../Estilos/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../Estilos/css/style3.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    
</head>
<body>
    <header>
       <div class="container-fluid well">
           <img src="../../Imagenes/logoMUNDIAL.png" alt="right">
           
                <button class="btn btn-default navbar-right" type="form-control" onclick= "location.href = '../logout.php'">Cerrar Sesion</button>
                
       </div>
                

    </header>
    
   <div class="content container">
       <ul class="ca-menu">
                       <li>
                            <a href="../Comunes/IngActivos.php">
                                <span class="ca-icon">A</span>
                                <div class="ca-content">
                                    <h2 class="ca-main">Registrar Activos</h2>
                                    <h3 class="ca-sub">Agregar Usuarios al sistema</h3>
                                </div>
                            </a>
                        </li>
                        
                        <li>
                            <a href="AnadirUsuarios.php">
                                <span class="ca-icon">U</span>
                                <div class="ca-content">
                                    <h2 class="ca-main">Añadir Usuarios</h2>
                                    <h3 class="ca-sub">Agregar Usuarios al sistema</h3>
                                </div>
                            </a>
                        </li>
                        
                        <li>
                            <a href="listarUsuarios.php">
                                <span class="ca-icon">p</span>
                                <div class="ca-content">
                                    <h2 class="ca-main">Listar Usuarios </h2>
                                    <h3 class="ca-sub">Muestra todos los usuarios de la base de datos</h3>
                                </div>
                            </a>
                        </li>
                        
                        
                        
                        <li>
                            <a href="EditarActivos.php">
                                <span class="ca-icon">S</span>
                                <div class="ca-content">
                                    <h2 class="ca-main">Modificar Activos</h2>
                                    <h3 class="ca-sub">Modifica los activos en el sistema</h3>
                                </div>
                            </a>
                        </li>
                        <li>
							 <a href="../Comunes/verActivos.php">
                                <span class="ca-icon">o</span>
                                <div class="ca-content">
                                    <h2 class="ca-main">Ver Activos </h2>
                                    <h3 class="ca-sub">Muestra los activos en el sistema</h3>
                                </div>
                            </a>
                        </li>
                        
                        <li>
                            <a href="GenerarReporte.php">
                                <span class="ca-icon">a</span>
                                <div class="ca-content">
                                    <h2 class="ca-main">Generar Reportes</h2>
                                    <h3 class="ca-sub">Crear reportes</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
   </div>
    
    <footer></footer>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="../Estilos/js/jquery.js"></script>
    <script src="../Estilos/js/bootstrap.min.js"></script>
</body>
</html>