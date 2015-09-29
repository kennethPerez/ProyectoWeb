<?php
session_start();

if (isset($_SESSION["rowUser"]))
{    
    $id_user = $_SESSION["rowUser"][0];
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
        
    if (isset($_REQUEST['idPersona']))
    {
        $id = $_REQUEST['idPersona'];  
        $query = "select * from personas where idPersona = $id";
        $result = pg_query($conn,$query);
        $rowUser = pg_fetch_row($result);
    }
    else
    {
        $usuario = $_REQUEST['usuario'];
        $query = "select * from personas where md5(usuario) = '$usuario'";
        $result = pg_query($conn,$query);
        $rowUser = pg_fetch_row($result);
        $id = $rowUser[0];
    }
    
    
    $query = "select * from amigos where idPersona = $id_user and idAmigo = $id";
    $result = pg_query($conn,$query);
    $row = pg_fetch_row($result);
       
    
    if($row)
    {
        $query = "SELECT descripcion,codigo FROM publicaciones WHERE idPersona = $id";
        $result = pg_query($conn,$query);
        
        $array_friends[] = array('estado'=>'Amigo');
        $array_friends[] = array('foto'=>md5($rowUser[4]));
        $array_friends[] = array('correo'=>$rowUser[3]);
        
        while ($row = pg_fetch_row($result)) {
            $array_friends[] = array(
                'descripcion' => $row[0],
                'codigo' => $row[1]
            );
        }        
    }
    else
    {
        $array_friends[] = array('estado'=>'NoAmigo');
        $array_friends[] = array('foto'=>md5($rowUser[4]));
        $array_friends[] = array('correo'=>$rowUser[3]);                
        $array_friends[] = array('ingreso' => $rowUser[6]);
        $array_friends[] = array('sexo' => $rowUser[7]);
    }
    
    echo json_encode($array_friends);
}
