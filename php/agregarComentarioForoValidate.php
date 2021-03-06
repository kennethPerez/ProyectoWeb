<?php
    session_start();
    if (isset($_SESSION["rowUser"]))
    {
        
        $rowUser = $_SESSION["rowUser"];
        $nombre_usuario = "$rowUser[1] $rowUser[2]";
        $array_data = array();

        $comment = $_REQUEST['text-comentar-foro'];
        $idforoComment = $_REQUEST['foro-activo-identificador'];


        function commentValidate($comment)
        {
            if(strlen($comment) >= 1)
            {         
                return array(
                    'state' => "Correcto",
                    'box' => "#text-comentar-foro",
                    'nombre' => $GLOBALS['nombre_usuario']
                    );
            }          
            else
            {
                return array(
                    'state' => "Incorrecto",
                    'box' => "#text-comentar-foro",
                    'errorBox' => "#error-comentario-foro",
                    'error' => "Debe tener al menos 1 caracteres.",
                    'nombre' => $GLOBALS['nombre_usuario']
                    );
            }
        }
                
        $array_data[] = commentValidate($comment);
        
        if($array_data[0]["state"] === "Correcto")
        {
            $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
            $conn=pg_connect($strconn);  
            $query = "INSERT INTO comentarios(idpersona,idforo,comentario)";
            $query .=" values('$rowUser[0]',$idforoComment,'$comment')";
            $result = pg_query($conn,$query);
        }

        echo json_encode($array_data);
        
    }