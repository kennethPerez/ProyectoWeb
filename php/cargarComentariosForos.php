<?php
session_start(); 


if (isset($_SESSION["rowUser"]))
{
    $idForo = $_REQUEST['idForo'];
    $array_comentarios = array();

    $rowUser = $_SESSION["rowUser"];
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
    $query = "SELECT comentario FROM comentarios WHERE idforo = $idForo";
    $result = pg_query($conn,$query);

    while($fila = pg_fetch_array($result))
    {
        $array_comentarios[] = array(
            'comentario' => $fila[0]
        );
    }

    echo json_encode($array_comentarios);
}