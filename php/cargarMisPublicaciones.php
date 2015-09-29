<?php
session_start();
if (isset($_SESSION["rowUser"]))
{
    $array_publicaciones = array();
    $rowUser = $_SESSION["rowUser"];
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
    $query = "SELECT descripcion,codigo FROM publicaciones WHERE publicaciones.idpersona = '$rowUser[0]'";
    $result = pg_query($conn,$query);
    while($fila = pg_fetch_array($result))
    {
        /*echo "<div> <h4> <strong> $fila[descripcion] </strong> <h4> </div>";
        echo "<h6 style='font-size: 12px; color:black'> $fila[codigo] </h6>";
        echo "<br>";
        echo "<hr style= 'border-bottom: 1px solid #00B276'>";*/
        $array_publicaciones[] = array(
            'descripcion' => $fila[0],
            'codigo' => $fila[1]
        );
    }
    
    echo json_encode($array_publicaciones);
}

