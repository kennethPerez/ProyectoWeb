<?php
session_start();

if (isset($_SESSION["rowUser"]))
{    
    $idEmpresa = $_REQUEST['idEmpresa'];
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
    
    $query = "select (p.nombre||' '||p.apellidos), md5(p.usuario), p.idPersona from personas p inner join persona_empresa pe on p.idPersona = pe.idPersona where pe.idEmpresa = $idEmpresa";
    $result = pg_query($conn,$query);

    while ($row = pg_fetch_row($result)) {
        $array_friends[] = array(
            'nombre' => $row[0],
            'foto' => $row[1],
            'id' => $row[2],
        );
    }

    echo json_encode($array_friends);
}

