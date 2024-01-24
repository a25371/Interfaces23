<?php
?>
<section id="secMenuPagina" class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #0A367D;" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">En construcción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">No disponible</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Cruds</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Usuarios', 'getVistaUsuarios')">Usuarios</a></li>
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Pedidos', 'getVistaPedidos')">Another action</a></li>
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('', '')">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>