<?php
session_start();
if (isset( $_SESSION["rowUser"]))
{
    $User = $_SESSION["rowUser"][0];
    
    $array_data = array();
    $estado = 0;
    
    $pass = $_REQUEST['pass-profile'];
    $newpass = $_REQUEST['new-pass-profile'];   
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn); 
   
    function pass($pass)
    {
        if(strlen($pass) >= 8)
        {
            $row = $GLOBALS['User'];
            $query = "Select pass from personas where idPersona='$row'";
            $result = pg_query($GLOBALS["conn"],$query);
            $row = pg_fetch_row($result);
            
            if($row[0] === md5($pass))
            {
                return array('state' => "Correcto",'box' => "#box-pass-profile");                    
            }
            else
            {
                $GLOBALS["estado"] = 1;
                return array('state' => "Incorrecto",'box' => "#box-pass-profile",'errorBox' => "#error-pass-profile",'error' => "La contraseña es incorrecta.");
            }
        }
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-pass-profile",'errorBox' => "#error-pass-profile",'error' => "Debe tener al menos 8 caracteres.");
        }            
    }

    function newpass($newpass)
    {
        if(strlen($newpass) >= 2)
            return array('state' => "Correcto",'box' => "#box-new-pass-profile");
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-new-pass-profile",'errorBox' => "#error-new-pass-profile",'error' => "Debe tener al menos 8 caracteres.");
        }            
    }
    
    $array_data[] = pass($pass);
    $array_data[] = newpass($newpass);
    
    if($estado == 0)
    {
        $passTemp = md5($newpass);
        $query = "update personas set pass='$passTemp' where idPersona='$User'";
        $result = pg_query($conn,$query);        
    }   
    
    echo json_encode($array_data);
}
