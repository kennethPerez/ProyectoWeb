<?php
    session_start();

    $array_data = array();
    
    $user = $_REQUEST['login_user'];
    $pass = $_REQUEST['login_pass'];    
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
    $query = "Select * from personas where usuario='$user'";
    $result = pg_query($conn,$query);
    $row = pg_fetch_row($result);              
            
    function userValidate($user, $row)
    {
        if(strlen($user) >= 2)
        {                     
            if($row != NULL)
            {
                $_SESSION["rowUser"] = $row;
                return array('state' => "Correcto",'box' => "box-user-login");
            }
            else
            {
                return array('state' => "Incorrecto",'box' => "#box-user-login",'errorBox' => "#error-user-login",'error' => "Usuario incorrecto.");                       
            }
        }          
        else
        {
            return array('state' => "Incorrecto",'box' => "#box-user-login",'errorBox' => "#error-user-login",'error' => "Debe tener al menos 2 caracteres.");
        }
    }

    function passValidate($pass, $row)
    {
        if(strlen($pass) >= 8)
        {
            if($row[5] === md5($pass))
            {
                $_SESSION["rowUser"] = $row;
                return array('state' => "Correcto",'box' => "box-pass-login");
            }
            else
            {
                return array('state' => "Incorrecto",'box' => "#box-pass-login",'errorBox' => "#error-pass-login",'error' => "Contraseña incorrecta.");
            }
        }
        else
        {
            return array('state' => "Incorrecto",'box' => "#box-pass-login",'errorBox' => "#error-pass-login",'error' => "Debe tener al menos 8 caracteres.");
        }
    }
    
    $array_data[] = userValidate($user, $row);
    $array_data[] = passValidate($pass, $row);      
        
    echo json_encode($array_data);
?>