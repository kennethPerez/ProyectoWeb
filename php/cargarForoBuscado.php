<?php
session_start();
if (isset($_SESSION["rowUser"]))
{
    $id_foro = $_REQUEST['id_foro'];
    
    $array_foros = array();
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
                                
    $query = "select (p.nombre||' '||p.apellidos), f.titulo, f.descripcion from foros f inner join personas p on f.idPersona = p.idPersona where f.idForo = $id_foro;";
    $result = pg_query($conn,$query);
    
    $row_foro = pg_fetch_row($result);    
    $array_foros[] = array("creador"=>$row_foro[0], "titulo"=>$row_foro[1], "desc"=>$row_foro[2]);

    $query1 = "SELECT c.comentario, (p.nombre ||' '|| p.apellidos) FROM comentarios c INNER JOIN personas p ON c.idpersona = p.idpersona WHERE c.idforo = $id_foro;";
    $result1 = pg_query($conn,$query1);
    
    while($fila = pg_fetch_array($result1))
    {
        $array[] = array(
        'nombre' => $fila[1],
        'comentario' => $fila[0]
        );
    }
    $array_foros[] = $array;                
    echo json_encode($array_foros);
}



