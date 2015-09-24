<?php
    session_start();
    
    if (isset($_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $titulo = $_REQUEST['titulo'];
        $descripcion = $_REQUEST['descripcion'];
        echo $rowUser;
        echo $titulo;
        echo $descripcion;
    
        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);  
        $query = "insert into foros(idpersona,titulo,descripcion)";
        $query .=" values('$rowUser[0]','titulo','descripcion')";
        $result = pg_query($conn,$query);
        echo $result;
    }
    else
    {
        echo "error";
    }
    
?>
    
    
    