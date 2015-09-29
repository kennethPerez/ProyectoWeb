<?php
session_start();
if (isset($_SESSION["rowUser"]))
{
    $array_misForos = array();
    $rowUser = $_SESSION["rowUser"];
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
    $query = "SELECT titulo,idforo,descripcion FROM foros WHERE foros.idpersona = '$rowUser[0]'";
    $result = pg_query($conn,$query);
               
    while($fila = pg_fetch_array($result))
    {
        //echo "<label> <a onclick='mostrarDescripForo(\"$fila[descripcion]\")'> $fila[titulo] </a> </label>";
        $array_misForos[] = array(
            'titulo' => $fila[0],
            'idforo' => $fila[1],
            'descripcion' => $fila[2]
        );
    }    
    
    echo json_encode($array_misForos);
}

