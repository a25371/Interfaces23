<?php
$MenuData = $datos['MenuData'];
//$json = json_encode($datos);
//echo $json;


function ordenaORDEN($a, $b)
{
    return $a['ORDEN'] - $b['ORDEN'];
}
usort($datos['MenuData'], 'ordenaORDEN');

echo '<section id="secMenuPagina" class="container-fluid">';
echo '<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #0A367D;" aria-label="Fourth navbar example">';
echo '<div class="container-fluid">';
echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="navbarsExample04">';
echo '<ul class="navbar-nav me-auto mb-2 mb-md-0">';
foreach ($datos['MenuData'] as $fila) {
    if ((isset($_SESSION['perms'][$fila['ID_MENU']]) || (empty($_SESSION) && $fila['PRIVADO'] == 0))) {
        if (isset($fila['hijos'])) {
            echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">' . $fila['TITULO'] . '</a>';
            echo '<ul class="dropdown-menu">';
            foreach ($fila['hijos'] as $filahijos) {
                echo '<li><a class="dropdown-item" onclick="' . $filahijos['ACCION'] . '">' . $filahijos['TITULO'] . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo '<li class="nav-item">';
            echo '<a class="nav-link" onclick=' . $fila['ACCION'] . '>' . $fila['TITULO'] . '</a>';
            echo '</li>';
        }
    }
}
echo '</li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '</nav>';
echo '</section>';