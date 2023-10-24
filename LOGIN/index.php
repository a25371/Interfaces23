<?php session_start();
    if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=''){
        //esta logeado
    }else{
        //header('Location: login.php');
    }
    // https://es.cooltext.com/
?>
<!DOCTYPE html>
<html lang="es">
<html>
    <head>
        <meta name="viewport" 
            content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" 
            href="librerias/bootstrap-5.1.3-dist/css/bootstrap.min.css">
        </link>
        <link rel="icon" type="image/x-icon" href="img/favicon.png">
        <script src="js/app.js"></script>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/menu.css">
    </head>
    <body>
        <section id="secEncabezadoPagina" class="container-fluid">
            <div class="row">
                <div class="divLogotipo col-lg-2 col-md-2 col-sm-10">
                    <img src="img/Logo.png">
                </div>
                <div class="divTituloApp col-lg-8 col-md-8 d-none d-md-block">Desarrollo de Interfaces.</div>
                <div class="divLog col-lg-2 col-md-2 col-sm-2">
                    <?php
                        if(isset($_SESSION['nombre'])){
                            echo '<a href="logout.php" title="Salir">';
                            echo $_SESSION['nombre'];
                            echo    '<img src="img/logout.png">';
                            echo '</a>';
                        }else{
                            echo '<a href="login.php" title="Entrar">';
                            echo    '<img src="img/login.png">';
                            echo '</a>';
                        }
                    ?>
                </div>
            </div>
        </section>
        <section id="secMenuPagina" class="container-fluid">
            
            <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;" aria-label="Fourth navbar example">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled">Disabled</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" 
                                    aria-expanded="false">Cruds</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" 
                                        onclick="getVistaMenuSeleccionado('Usuarios', 'getVistaUsuarios')" >Usuarios</a></li>
                                    <li><a class="dropdown-item" 
                                        onclick="getVistaMenuSeleccionado('Pedidos', 'getVistaPedidos')">Another action</a></li>
                                    <li><a class="dropdown-item" 
                                        onclick="getVistaMenuSeleccionado('', '')">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


        </section>
        <section id="secContenidoPagina" class="container-fluid">

        </section>
        
        



        <script src="librerias/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>