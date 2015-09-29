<?php
session_start();

if (isset($_SESSION["rowUser"]))
{    
    $ingreso = $_REQUEST['generacion'];
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
    
    $query = "SELECT (nombre ||' '|| apellidos), md5(usuario), idPersona FROM personas where ingreso='$ingreso'";
    $result = pg_query($conn,$query);

    while ($row = pg_fetch_row($result)) {
        $array_friends[] = array(
            'nombre' => $row[0],
            'foto' => $row[1],
            'id' => $row[2]
        );
    }

    echo json_encode($array_friends);
}

