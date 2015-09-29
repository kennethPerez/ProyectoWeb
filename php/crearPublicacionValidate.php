<?php
session_start();

    $array_data = array();
    
    $descripcion = $_REQUEST['description-publication'];
    $lenguaje = $_REQUEST['language-publication']; 
    $code = $_REQUEST['code-publication'];

    $array_data[] = descriptionValidate($descripcion);
    $array_data[] = languageValidate($lenguaje);
    $array_data[] = codeValidate($code);
    
    
    if($array_data[0]["state"] === "Correcto"  and $array_data[1]["state"] === "Correcto" and $array_data[2]["state"] === "Correcto")
    {
        if (isset($_SESSION["rowUser"]))
        {
            $rowUser = $_SESSION["rowUser"];
            $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
            $conn=pg_connect($strconn);  
            
            $queryLeng = "SELECT idlenguaje FROM lenguajes WHERE lenguajes.nombre = '$lenguaje'";
            $resultLen = pg_query($conn,$queryLeng);
            $row = pg_fetch_row($resultLen);
            $idLenguaje = $row[0];
                        
            if($idLenguaje === null)
            {
                $query = "INSERT INTO lenguajes(nombre) values('$lenguaje')";
                pg_query($conn,$query);
                $queryLeng = "SELECT idlenguaje FROM lenguajes WHERE lenguajes.nombre = '$lenguaje'";
                $resultLen = pg_query($conn,$queryLeng);

                $row = pg_fetch_row($resultLen);
                $idLenguaje = $row[0];
            }
            $query = "INSERT INTO publicaciones(idpersona,descripcion,idlenguaje,codigo)";
            $query .=" values('$rowUser[0]','$descripcion',$idLenguaje,'$code')";
            $result = pg_query($conn,$query);
        }
    }
    
        
    echo json_encode($array_data);
    

    function descriptionValidate($descripcion)
    {
        if(strlen($descripcion) >= 10)
        {
            return array(
                'state' => "Correcto",
                'box' => "box-description-publication");
        }
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-description-publication",
                'errorBox' => "#error-description-publication",
                'error' => "Debe tener al menos 10 caracteres."
                );
        }
    }
    
    function languageValidate($lenguaje)
    {
        if(strlen($lenguaje) >= 1)
        {
            return array(
                'state' => "Correcto",
                'box' => "box-language-forum");
        }
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-language-forum",
                'errorBox' => "#error-language-publication",
                'error' => "Debe tener al menos 1 caracter"
                );
        }
    }
    
    /*function modoValidate($modo)
    {
        if($modo !== "")
        {
            return array(
                'state' => "Correcto",
                'box' => "#radio-modo"
                );
        }
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#radio-modo",
                'errorBox' => "#error-sex",
                'error' => "Seleccione el modo."
                );
        }
    }*/
    
    function codeValidate($code)
    {
        if(strlen($code) > 10)
        {
            return array(
                'state' => "Correcto",
                'box' => "box-code-publication");
        }
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-code-publication",
                'errorBox' => "#error-code-publication",
                'error' => "Debe tener al menos 10 caracteres"
                );
        }
    }
    
