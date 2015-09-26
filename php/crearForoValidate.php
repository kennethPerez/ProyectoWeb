<?php
    session_start();

    $array_data = array();
    
    $name = $_REQUEST['name-forum'];
    $description = $_REQUEST['description-forum'];           

    $array_data[] = nameValidate($name);
    $array_data[] = descriptionValidate($description);    
    
    if($array_data[0]["state"] === "Correcto" and $array_data[1]["state"] === "Correcto")
    {
        if (isset($_SESSION["rowUser"]))
        {
            $rowUser = $_SESSION["rowUser"];
            $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
            $conn=pg_connect($strconn);  
            $query = "INSERT INTO foros(idpersona,titulo,descripcion)";
            $query .=" values('$rowUser[0]','$name','$description')";
            $result = pg_query($conn,$query);
        }
    }
        
    echo json_encode($array_data);
    
    function nameValidate($name)
    {
        if(strlen($name) >= 5)
        {         
            return array(
                'state' => "Correcto",
                'box' => "#box-name-forum"
                );
        }          
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-name-forum",
                'errorBox' => "#error-name-forum",
                'error' => "Debe tener al menos 5 caracteres."
                );
        }
    }

    function descriptionValidate($description)
    {
        if(strlen($description) >= 20)
        {
            return array(
                'state' => "Correcto",
                'box' => "box-description-forum");
        }
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-description-forum",
                'errorBox' => "#error-description-forum",
                'error' => "Debe tener al menos 20 caracteres."
                );
        }
    }
?>