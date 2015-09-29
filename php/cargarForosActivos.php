<?php
session_start();
if (isset($_SESSION["rowUser"]))
{
    $array_foros = array();
    $rowUser = $_SESSION["rowUser"];
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);  
                                
    $query = "select (nombre ||' '|| apellidos),titulo,idforo,descripcion from personas inner join foros on (personas.idpersona = foros.idpersona)";
    $result = pg_query($conn,$query);

    while($fila = pg_fetch_array($result))
    {
        $array_foros[] = array(
        'nombre' => $fila[0],
        'titulo' => $fila[1],
        'idforo' => $fila[2],
        'descripcion' => $fila[3]
        );
    }
                
    echo json_encode($array_foros);
                
}
       
        

