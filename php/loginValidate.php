<?php
session_start();
    $array_data = array();
    
    $user = $_POST['login-user'];
    $pass = $_POST['login-pass'];    
    
    $user_ok = 0;
    $row = "";
              
            
    function userValidate($user)
    {
        if(strlen($user) >= 2)
        {
            $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
            $conn=pg_connect($strconn);
            $query = "Select * from personas where usuario='$user';";
            $result = pg_query($conn,$query);
            $row = pg_result($result);
            
            if($row != NULL)
            {
                $user_ok = 1;
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

    function passValidate($pass)
    {
        if(strlen($pass) >= 8)
        {
            if($user_ok === 1 && $row['contraseña'] === $pass)
            {
                $_SESSION["username"] = "$row[5]";
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
    
    $array_data[] = userValidate($user);
    $array_data[] = passValidate($pass);      
        
    echo json_encode($array_data);
?>