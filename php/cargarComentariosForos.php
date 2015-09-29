<?php
session_start(); 


if (isset($_SESSION["rowUser"]))
{
    $idForo = $_REQUEST['idForo'];
    $array_comentarios = array();

    $rowUser = $_SESSION["rowUser"];
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
    $query = "SELECT c.comentario, (p.nombre ||' '|| p.apellidos) FROM comentarios c INNER JOIN personas p ON c.idpersona = p.idpersona WHERE c.idforo = $idForo";
    $result = pg_query($conn,$query);

    while($fila = pg_fetch_array($result))
    {
        $array_comentarios[] = array(
            'comentario' => $fila[0],
            'nombre' => $fila[1]
        );
    }

    echo json_encode($array_comentarios);
}