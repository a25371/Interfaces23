<?php session_start();
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != '') {
    //echo '<pre>'; print_r($_SESSION); echo '</pre>';
} else {
    //header('Location: login.php');
}
// https://es.cooltext.com/
?>
<!DOCTYPE html>
<html lang="es">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="librerias/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    </link>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <title>Index</title>
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
            <div class="divTituloApp col-lg-8 col-md-8 d-none d-md-block">Francisco J. Esteban Garcia</div>
            <div class="divLog col-lg-2 col-md-2 col-sm-2">
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo '<a href="logout.php" title="Salir">';
                    echo $_SESSION['usuario'];
                    echo    '<img src="img/logout.png">';
                    echo '</a>';
                } else {
                    echo '<a href="login.php" title="Entrar">';
                    echo    '<img src="img/login.png">';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php 
        require_once 'controladores/C_Menus.php';
        $menu=new C_Menus();
        //$menu->getMenu();
        //echo '<br><hr><br>';
        $menu->getMenuBD();

    ?>
    <section id="secContenidoPagina" class="container-fluid">
    </section>
    <script src="librerias/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>