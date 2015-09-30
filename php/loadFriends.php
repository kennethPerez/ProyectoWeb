<?php
    
    session_start();
    if(isset($_SESSION["rowUser"]))
    {
        $id_user = $_SESSION["rowUser"][0];
        
        $array_friends = array();

        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);
        
        $query = "SELECT (p.nombre ||' '|| p.apellidos), md5(p.usuario), p.correo, p.idPersona FROM amigos a INNER JOIN personas p ON a.idAmigo = p.idPersona WHERE a.idPersona=$id_user";
        $result = pg_query($conn,$query);

        while ($row = pg_fetch_row($result)) {
            $array_friends[] = array(
                'nombre' => $row[0],
                'usuario' => $row[1],
                'correo' => $row[2],
                'id' => $row[3]
            );
        }

        echo json_encode($array_friends);
    }