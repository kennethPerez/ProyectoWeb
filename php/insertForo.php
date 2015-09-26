<?php
    session_start();
    
    if (isset($_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $titulo = $_REQUEST['name'];
        $descripcion = $_REQUEST['description'];
    
        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);  
        $query = "INSERT INTO foros(idpersona,titulo,descripcion)";
        $query .=" values('$rowUser[0]','$titulo','$descripcion')";
        $result = pg_query($conn,$query);
    }
    
    
    
    