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
    
    $array_data[] = userValidate($user, $row);
    $array_data[] = passValidate($pass, $row); 
    
    if(pg_num_rows($result) > 0){
        $query1 = "Select idEmpresa from persona_empresa where idPersona='$row[0]'";
        $result1 = pg_query($conn,$query1);

        if(pg_num_rows($result1) > 0){
            $row1 = pg_fetch_row($result1); 

            $query2 = "Select * from empresas where idEmpresa='$row1[0]'";
            $result2 = pg_query($conn,$query2);
            $row2 = pg_fetch_row($result2);
            $_SESSION["rowCompany"] = $row2;   
        }
    }
        
    echo json_encode($array_data);
    
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
