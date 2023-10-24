<?php session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario']!=''){
    //esta logeado
}else{
    header('Location: login.php'); //Redirige a login.php
}
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        Hola <?php echo $_SESSION['usuario']; ?>.
        <?php
            echo "<br>hoy es jueves";
            $numero=5;
            $texto='<br>esto es un texto y '.$numero. ' es un numero';
            echo $texto;
            $texto="<br>esto es un texto y es un $numero numero";
            echo $texto;

            $matriz=array();
            $matriz=array('a','b',5,7.6);
            echo '<br>';
            print_r($matriz);
            for ($i=0; $i < sizeof($matriz); $i++) { 
                echo '<br>En la posicion '.$i.' esta el elemento '.$matriz[$i];
                //echo "<br>En la posicion $i esta el elemento: $matriz[$i]";
            }
            echo '<hr>';
            foreach ($matriz as $i => $value) {
                echo "<br>En la posicion $i esta el elemento: $value";
            }
            echo '<hr>';
            $edades=array('Javier'=>52, 'Ivan'=>23);
            foreach ($edades as $nombre => $edad) {
                echo '<br>'.$nombre.' tiene: '.$edad.' años.';
            }

            define('CENTRO', 'San Valero');
        ?>

<br>
<a href="login.php">LOGIN HERE</a>
<a href="logout.php">LOGOUT HERE</a>

        <br>(c) <?php echo CENTRO; ?> 2023
        <br>(c) <?=CENTRO ?> 2023
    </body>
</html>