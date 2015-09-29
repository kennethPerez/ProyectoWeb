<?php
session_start();

if (isset($_SESSION["rowUser"]))
{    
    $id_user = $_SESSION["rowUser"][0];
    $usuario = $_REQUEST['usuario'];
            
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
    
    $query = "select idPersona,(nombre||' '||apellidos) from personas where md5(usuario) = '$usuario'";
    $result = pg_query($conn,$query);
    $row = pg_fetch_row($result);
    
    $query1 = "insert into amigos(idpersona, idamigo) values($id_user,$row[0])";
    pg_query($conn,$query1);
    $query2 = "insert into amigos(idpersona, idamigo) values($row[0],$id_user)";
    pg_query($conn,$query2);
    
    $array_friends[] = array('nombre'=>$row[1]);
    $array_friends[] = array('id'=>$row[0]);
    
    echo json_encode($array_friends);
}
