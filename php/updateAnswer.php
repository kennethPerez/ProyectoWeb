<?php
session_start();
if (isset( $_SESSION["rowUser"]))
{
    $user = $_SESSION["rowUser"][0];
    
    $array_data = array();
    $estado = 0;
    
    $answer = $_REQUEST['answer-profile'];
    $newanswer = $_REQUEST['new-answer-profile'];  
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn); 
    
   
    function answer($answer)
    {
        if(strlen($answer) > 0)
        {
            $row = $GLOBALS['user'];
            $query = "Select respuestaseg from personas where idPersona='$row'";
            $result = pg_query($GLOBALS["conn"],$query);
            $row = pg_fetch_row($result);
            
            if($row[0] === md5($answer))
            {
                return array('state' => "Correcto",'box' => "#box-answer-profile");                    
            }
            else
            {
                $GLOBALS["estado"] = 1;
                return array('state' => "Incorrecto",'box' => "#box-answer-profile",'errorBox' => "#error-answer-profile",'error' => "La respuesta es incorrecta.");
            }
        }
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-answer-profile",'errorBox' => "#error-answer-profile",'error' => "Debe tener al menos 1 caracteres.");
        }            
    }

    function newanswer($newanswer)
    {
        if(strlen($newanswer) > 0)
            return array('state' => "Correcto",'box' => "#box-new-answer-profile");
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-new-answer-profile",'errorBox' => "#error-new-answer-profile",'error' => "Debe tener al menos 1 caracteres.");
        }            
    }
    
    $array_data[] = answer($answer);
    $array_data[] = newanswer($newanswer);
    
    if($estado == 0)
    {
        $answerTemp = md5($newanswer);
        $query = "update personas set respuestaseg='$answerTemp' where idPersona='$user'";
        $result = pg_query($conn,$query);        
    }   
    
    echo json_encode($array_data);
}

