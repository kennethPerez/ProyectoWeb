<?php
    
    session_start();
    if(isset($_SESSION["rowUser"]))
    {
        $id_friend = $_REQUEST["idFriend"];
        $id_user = $_SESSION["rowUser"][0];
        
        $array_conversation = array();

        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);
        
        $query = "SELECT * FROM
        (SELECT idMensaje as idMensaje,idPersona1 as emisor,idPersona2,mensaje,hora FROM mensajes WHERE idPersona1=$id_user AND idPersona2=$id_friend 
        UNION 
        SELECT idMensaje as idMensaje,idPersona1 as emisor,idPersona2,mensaje,hora FROM mensajes WHERE idPersona1=$id_friend AND idPersona2=$id_user) AS m
        INNER JOIN 
        (SELECT idPersona,nombre,apellidos FROM personas) AS p ON p.idpersona = m.emisor order by m.idMensaje";
        $result = pg_query($conn,$query);

        while ($row = pg_fetch_row($result)) {
            $array_conversation[] = array(
                'idPersona1' => $row[1], 
                'idPersona2' => $row[2], 
                'amigo' => $row[6],
                'mensaje' => $row[3],
                'hora' => $row[4]
                );
        }

        echo json_encode($array_conversation);
    }