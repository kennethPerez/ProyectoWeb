<?php
    session_start();

    
    if (isset($_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $titulo = $_REQUEST['name-forum'];
        $descripcion = $_REQUEST['description-forum'];
        echo $titulo;
        echo $descripcion;
        $titulo = $_REQUEST['name-forum'];
        $descripcion = $_REQUEST['description-forum'];
    
        $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
        $conn=pg_connect($strconn);  
        $query = "INSERT INTO foros(idpersona,titulo,descripcion)";
        $query .=" values('$rowUser[0]','titulo','descripcion')";
        $result = pg_query($conn,$query);
        //echo $result;
    }
    else
    {
        echo "error";
    }
    
    $array_data = array('Titulo' => $titulo, 'Descripcion' => $descripcion);
    
    print_r(json_encode($array_data));
    
?>
    
    
    