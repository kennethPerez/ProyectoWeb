<?php
session_start();

    class conexion{
        

        function cargarMisPublicaciones()
        {
            
            if (isset($_SESSION["rowUser"]))
            {
                $rowUser = $_SESSION["rowUser"];
                $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
                $conn=pg_connect($strconn);  
                $query = "SELECT * FROM publicaciones WHERE publicaciones.idpersona = '$rowUser[0]'";
                $result = pg_query($conn,$query);

                while($fila = pg_fetch_array($result))
                {
                    echo "<div> <h4> <strong> $fila[descripcion] </strong> <h4> </div>";
                    echo "<h6 style='font-size: 12px; color:black'> $fila[codigo] </h6>";
                    echo "<br>";
                    echo "<hr style= 'border-bottom: 1px solid #00B276'>";
                }
            }
        }
        
        function cargarMisForos()
        {
            if (isset($_SESSION["rowUser"]))
            {
                $rowUser = $_SESSION["rowUser"];
                $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
                $conn=pg_connect($strconn);  
                $query = "SELECT titulo,descripcion FROM foros WHERE foros.idpersona = '$rowUser[0]'";
                $result = pg_query($conn,$query);
                

                while($fila = pg_fetch_array($result))
                {
                    echo "<label> <a onclick='mostrarDescripForo(\"$fila[descripcion]\")'> $fila[titulo] </a> </label>";
                }
                
                //$a = count($array);
                //echo json_encode($array);
            }

        }
        
        function cargarForosActivos()
        {
            if (isset($_SESSION["rowUser"]))
            {
                $rowUser = $_SESSION["rowUser"];
                $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
                $conn=pg_connect($strconn);  
                                
                $query = "select nombre,titulo,idforo,descripcion from personas inner join foros on (personas.idpersona = foros.idpersona)";
                $result = pg_query($conn,$query);

                while($fila = pg_fetch_array($result))
                {
                    echo "<label> <a onclick='mostrarInfoForos(\"$fila[nombre]\",\"$fila[descripcion]\",\"$fila[idforo]\")'> $fila[titulo] </a> </label>";
                }
                
                
                //$a = count($array);
                //echo json_encode($array);
                //cambiar el diseño de mostrar los foros
                //en una consulta la informacion del foro
                //en otra todos los comentarios
            }
        }
        
        /*function cargarComentariosDeForo($IDforo)
        {
            if (isset($_SESSION["rowUser"]))
            {
                $rowUser = $_SESSION["rowUser"];
                $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
                $conn=pg_connect($strconn);  
                $query = "SELECT comentario FROM comentarios WHERE comentarios.idforo = $IDforo";
                $result = pg_query($conn,$query);

                while($fila = pg_fetch_array($result))
                {
                    echo "<div> <h4> <strong> $fila[comentario] </strong> <h4> </div>";
                    echo "<br>";
                }
            }
        }*/
        
    }


