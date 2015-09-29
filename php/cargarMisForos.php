<?php
session_start();
if (isset($_SESSION["rowUser"]))
{
    $array_misForos = array();
    $rowUser = $_SESSION["rowUser"];
    $name = $rowUser[1]." ".$rowUser[2];
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
    $query = "SELECT titulo,idforo,descripcion FROM foros WHERE foros.idpersona = '$rowUser[0]'";
    $result = pg_query($conn,$query);
               
    while($fila = pg_fetch_array($result))
    {
        $array_misForos[] = array(
            'titulo' => $fila[0],
            'idforo' => $fila[1],
            'descripcion' => $fila[2],
            'nombre' => $name
        );
    }    
    
    echo json_encode($array_misForos);
}

