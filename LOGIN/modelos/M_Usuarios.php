<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Usuarios extends Modelo
{
    public $DAO;

    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }

    public function buscarUsuarios($filtros = array()){
        $b_texto = '';
        $b_genero = '';
        $b_activo = '';
        $usuario = '';
        $pass = '';

        extract($filtros);
        $SQL = "SELECT * FROM usuarios WHERE 1=1 ";

        if ($usuario != '' && $pass != '') {
            $usuario = addslashes($usuario);
            $pass = addslashes($pass);
            $SQL .= " AND login = '$usuario' AND pass = MD5('$pass') ";
        }
        if ($b_texto != '') {
            $aTexto = explode(' ', $b_texto);
            $SQL .= " AND (1=2 ";
            foreach ($aTexto as $palabra) {
                $SQL .= " OR apellido_1 LIKE '%$palabra%' ";
                $SQL .= " OR apellido_2 LIKE '%$palabra%' ";
                $SQL .= " OR nombre LIKE '%$palabra%' ";
                $SQL .= " OR login LIKE '%$palabra%' ";
            }
            $SQL .= " ) ";
        }
        if ($b_genero != '') {
            $SQL .= " AND sexo = '$b_genero'";
        }
        if ($b_activo != '') {
            $SQL .= " AND activo = '$b_activo'";
        }

        // Call the paginado function
        $usuarios = $this->paginado($SQL);

        return $usuarios;
    }


    public function insertUsuario($datosU = array())
    {
        $n_texto = '';
        $a1_texto = '';
        $a2_texto = '';
        $ma_texto = '';
        $mo_texto = '';
        $g_texto = '';
        $l_texto = '';
        $p_texto = '';

        $Upass = MD5($p_texto);

        //$json = json_encode($filtros);
        //echo $json;
        extract($datosU);

        $SQL = "INSERT INTO `usuarios`
            (`nombre`, `apellido_1`, `apellido_2`, `sexo`, `fecha_Alta`, `mail`, `movil`, `login`, `pass`, `activo`)
             VALUES (";
        $SQL .= " '$n_texto', ";
        $SQL .= " '$a1_texto', ";
        $SQL .= " '$a2_texto', ";
        $SQL .= " '$g_texto', ";
        $SQL .= " NOW(), ";
        $SQL .= " '$ma_texto', ";
        $SQL .= " '$mo_texto', ";
        $SQL .= " '$l_texto', ";
        $SQL .= " '$Upass', ";
        $SQL .= " 'Y') ";
        //echo $SQL.'<br>';

        $this->DAO->insertar($SQL);
    }

    public function getUpdateUsuario($ID)
    {
        $SQL = "SELECT * FROM `usuarios` WHERE `id_Usuario` = $ID";
        //echo $SQL.'<br>';
        $datosUser = $this->DAO->consultar($SQL);
        return $datosUser;
    }

    public function updateUsuario($datosU = array())
    {
        $id_Usuario = '';
        $n_texto = '';
        $a1_texto = '';
        $a2_texto = '';
        $g_texto = '';
        $fecha_alta = '';
        $ma_texto = '';
        $mo_texto = '';
        $activo = '';

        extract($datosU);

        $SQL = "UPDATE `usuarios` SET ";
        $SQL .= "`nombre`= '$n_texto'";
        $SQL .= ",`apellido_1`='$a1_texto'";
        $SQL .= ",`apellido_2`='$a2_texto'";
        $SQL .= ",`sexo`='$g_texto'";
        $SQL .= ",`fecha_Alta`='$fecha_alta'";
        $SQL .= ",`mail`='$ma_texto'";
        $SQL .= ",`movil`='$mo_texto'";
        $SQL .= ",`activo`='$activo'";

        $SQL .= "WHERE `id_Usuario`= '$id_Usuario'";
        $SQL .= "";
        $SQL .= "";
        //echo $SQL.'<br>';

        if ($n_texto == '') {
            echo "ERROR-UP001";
        } else {
            //$this->DAO->actualizar($SQL);
        }

        $this->getUpdateUsuario($id_Usuario);
    }


    

    public function paginado($SQL)
    {
        // Define the number of results per page
        $resultsPerPage = 20;
        // Get the current page number from the URL, default to 0 if not set
        $currentPage = isset($_GET['page']) ? max(0, intval($_GET['page'])) : 0;
    
        // Execute a separate COUNT query to get the total number of records
        $countSQL = "SELECT COUNT(*) as total FROM (" . $SQL . ") AS count_query";
        $totalCount = $this->DAO->consultar($countSQL)[0]['total'];
    
        // Calculate the total number of pages
        $totalPages = ceil($totalCount / $resultsPerPage);
    
        // Display the total number of rows obtained
        echo '<div>Total Rows: ' . $totalCount . '</div>';
    
        // Calculate the starting index for the SQL LIMIT clause
        $startIndex = $currentPage * $resultsPerPage;
    
        // Append the LIMIT clause to the SQL query
        $SQL .= " LIMIT $startIndex, $resultsPerPage";
    
        // Output the generated SQL for debugging
        echo '<div>Generated SQL: ' . $SQL . '</div>';
    
        // Execute the modified SQL query to get the current page of results
        $result = $this->DAO->consultar($SQL);
    
        // Display the results or do whatever you need with them
        foreach ($result as $row) {
            // Your code to process each row
        }
    
        // Example pagination buttons (adjust as needed)
        echo '<div class="pagination" id="pagination">';
    
        // Previous page button
        if ($currentPage > 0) {
            echo '<button onclick="changePage(' . ($currentPage - 1) . ')"><<</button>';
        }
    
        // Page numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<button onclick="changePage(' . ($i - 1) . ')" ' . ($i == $currentPage + 1 ? 'class="active"' : '') . '>' . $i . '</button>';
        }
    
        // Next page button
        if ($currentPage < $totalPages - 1) {
            echo '<button onclick="changePage(' . ($currentPage + 1) . ')">>></button>';
        }
    
        echo '</div>';
    
        // JavaScript to handle page changes without full page reload
        echo '<script>
            function changePage(page) {
                // Use AJAX to fetch and display the new page content without reloading the entire page
                $.get("?page=" + page, function(data) {
                    // Update the content area with the new data
                    $("#content").html(data);
                });
    
                // Update the page number in the URL without reloading the page
                history.pushState(null, null, "?page=" + page);
            }
        </script>';
    
        return $result;
    }
    
    

    
    


}
