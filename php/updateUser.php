<?php
session_start();

    $array_data = array();
    
    $name = $_REQUEST['name-profile'];
    $lastName = $_REQUEST['last-name-profile'];
    $email = $_REQUEST['email-profile'];
    $companyName = $_REQUEST['company-profile'];    
    $username = $_REQUEST['user-profile'];    
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
    
    $estado = 0;
    $rowEmpresa;
    
    $queryUser = "Select idPersona from personas where usuario='$username'";
    $resultUser = pg_query($conn,$queryUser);
    $rowUser = pg_fetch_row($resultUser);
    
    
    $array_data[] = nameValidate($name);
    $array_data[] = lastNameValidate($lastName);
    $array_data[] = emailValidate($email,$username);
    
    
    $query2 = "delete from persona_empresa where idPersona=$rowUser[0]";
    $result2 = pg_query($GLOBALS["conn"],$query2);
    if($companyName != "")
    {
        $array_data[] = companyNameValidate($companyName);
        $query = "Select * from empresas where nombre='$companyName'";
        $result = pg_query($conn,$query);
        $row = pg_fetch_row($result);        
        $_SESSION["rowCompany"] = $row;
    }
    
    if($estado === 0)
    {
        $query = "update personas set nombre='$name', apellidos='$lastName', correo='$email' where idPersona='$rowUser[0]'";
        $result = pg_query($conn,$query);
        
        $query1 = "Select * from personas where idPersona='$rowUser[0]'";
        $result1 = pg_query($conn,$query1);
        $row = pg_fetch_row($result1);

        $_SESSION["rowUser"] = $row;
        
    }

    echo json_encode($array_data);
    
    function nameValidate($name)
    {
        if(strlen($name) >= 3)
            return array('state' => "Correcto",'box' => "#box-name-profile");
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-name-profile",'errorBox' => "#error-name-profile",'error' => "Debe tener al menos 3 caracteres.");
        }            
    }

    function lastNameValidate($lastName)
    {
        if(strlen($lastName) >= 2)
            return array('state' => "Correcto",'box' => "#box-last-name-profile");
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-last-name-profile",'errorBox' => "#error-last-name-profile",'error' => "Debe tener al menos 2 caracteres.");
        }            
    }

    function emailValidate($email,$user)
    {
        if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email))
        {            
            $query = "Select correo from personas where usuario='$user'";
            $result = pg_query($GLOBALS["conn"],$query);
            $row = pg_fetch_row($result);
                        
            if($row[0] === $email)
            {
                return array('state' => "Correcto",'box' => "#box-email-profile");                
            }
            else
            {
                $query = "Select correo from personas where correo='$email'";
                $result = pg_query($GLOBALS["conn"],$query);
                $row = pg_fetch_row($result);
                
                if($row[0] === NULL)
                    return array('state' => "Correcto",'box' => "#box-email-profile");
                else
                {
                    $GLOBALS["estado"] = 1;
                    return array('state' => "Incorrecto",'box' => "#box-email-profile",'errorBox' => "#error-email-profile",'error' => "El email se encuentra registrado.");       
                }
            }
        }
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-email-profile",'errorBox' => "#error-email-profile",'error' => "Escriba un email válido.");
        }
    }
    
    function companyNameValidate($company)
    {
        if(strlen($company) >= 2)
        {            
            $query = "Select * from empresas where nombre='$company'";
            $result = pg_query($GLOBALS["conn"],$query);
            $row = pg_fetch_row($result);
            
            $GLOBALS['rowEmpresa'] = $row;
            
            if($row[0] === NULL)
            {                 
                $query = "insert into empresas(nombre) values('$company');";
                $result = pg_query($GLOBALS["conn"],$query);
                
                $query1 = "select * empresas where nombre = '$company';";
                $result1 = pg_query($GLOBALS["conn"],$query1);
                $rowE = pg_fetch_row($result1);
                
                $GLOBALS['rowEmpresa'] = $rowE;
            }
            
            
            $p = $GLOBALS["rowUser"][0];
            $e = $GLOBALS['rowEmpresa'][0];
            
            $query2 = "insert into persona_empresa(idPersona, idEmpresa) values($p,$e);";
            $result2 = pg_query($GLOBALS["conn"],$query2);
            
            return array('state' => "Correcto",'box' => "#box-company-profile");        
        }
        else
        {
            $GLOBALS["estado"] = 1;
            return array('state' => "Incorrecto",'box' => "#box-company-profile",'errorBox' => "#error-company-profile",'error' => "Debe tener al menos 2 caracteres.");
        }            
    }    
?>