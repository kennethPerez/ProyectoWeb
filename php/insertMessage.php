<?php
    session_start();
    
    if (isset($_SESSION["rowUser"]))
    {
        $id_user = $_SESSION["rowUser"][0];
        $id_friend = $_REQUEST['idFriend'];
        $message = $_REQUEST['message'];
    
        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);  
        $query = "INSERT INTO mensajes(idPersona1, idPersona2, mensaje)";
        $query .=" values('$id_user','$id_friend','$message')";
        $result = pg_query($conn,$query);
        
        echo "ok";
    }
    
    
    
    