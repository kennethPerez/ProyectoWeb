<?php
    session_start();

    $array_data = array();
    
    $name = $_REQUEST['name-forum'];
    $description = $_REQUEST['description-forum'];           
    
    $array_data[] = nameValidate($name);
    $array_data[] = descriptionValidate($description);      
        
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