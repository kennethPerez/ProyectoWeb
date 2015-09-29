<?php
    
    session_start();
    if(isset($_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        
        $array_friends = array();

        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);
        $query = "SELECT idAmigo FROM amigos WHERE idPersona='$rowUser[0]'";
        $result = pg_query($conn,$query);

        while ($row = pg_fetch_row($result)) {
            $query2 = "SELECT idPersona, nombre, apellidos, online FROM personas WHERE idPersona='$row[0]'";
            $result2 = pg_query($conn,$query2);
            $row2 = pg_fetch_row($result2);
            
            $array_friends[] = array('id' => $row2[0], 'nombre' => "$row2[1] $row2[2]", 'online' => $row2[3], 'id_sesion' => $rowUser[0]);
        }

        echo json_encode($array_friends);
    }