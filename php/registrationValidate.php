<?php
    $array_data = array();
    $name = $_REQUEST['name'];
    $lastName = $_REQUEST['last-name'];
    $email = $_REQUEST['email'];
    $admissionDate = $_REQUEST['admission-date'];
    $user = $_REQUEST['user'];
    if(isset($_REQUEST['sex']))
    {
        $sex = $_REQUEST['sex'];
    }
    else
        $sex = "";
    $pass = $_REQUEST['pass'];
    $passConfirm = $_REQUEST['pass-confirm'];
    $securityAnswer = $_REQUEST['security-answer'];
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);                  

    $array_data[] = nameValidate($name);
    $array_data[] = lastNameValidate($lastName);
    $array_data[] = emailValidate($email,$conn);
    $array_data[] = admissionDateValidate($admissionDate);
    $array_data[] = userValidate($user,$conn);
    $array_data[] = sexValidate($sex);
    $array_data[] = passValidate($pass);
    $array_data[] = passConfirmValidate($pass, $passConfirm);
    $array_data[] = securityAnswerValidate($securityAnswer);

    echo json_encode($array_data);

    function nameValidate($name)
    {
        if(strlen($name) >= 3)
            return array(
                'state' => "Correcto",
                'box' => "#box-name"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-name",
                'errorBox' => "#error-name",
                'error' => "Debe tener al menos 3 caracteres."
                );
    }

    function lastNameValidate($lastName)
    {
        if(strlen($lastName) >= 2)
            return array(
                'state' => "Correcto",
                'box' => "#box-last-name"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-last-name",
                'errorBox' => "#error-last-name",
                'error' => "Debe tener al menos 2 caracteres."
                );
    }

    function emailValidate($email,$conn)
    {
        if(preg_match('/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/',$email))
        {
            $query = "Select * from personas where correo='$email'";
            $result = pg_query($conn,$query);
            $row = pg_fetch_row($result);
            if($row == NULL)
            {
                return array(
                    'state' => "Correcto",
                    'box' => "#box-email"
                    );                
            }
            else
            {            
                return array(
                    'state' => "Incorrecto",
                    'box' => "#box-email",
                    'errorBox' => "#error-email",
                    'error' => "El email se encuentra registrado."
                    );
            }
        }
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-email",
                'errorBox' => "#error-email",
                'error' => "Escriba un email válido."
                );
        }
    }

    function admissionDateValidate($admissionDate)
    {
        if($admissionDate !== "")
            return array(
                'state' => "Correcto",
                'box' => "#box-admission-date"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-admission-date",
                'errorBox' => "#error-admission-date",
                'error' => "Seleccione una fecha."
                );
    }
    
    function userValidate($user,$conn)
    {
        if(strlen($user) >= 2)
        {
            $query = "Select * from personas where usuario='$user'";
            $result = pg_query($conn,$query);
            $row = pg_fetch_row($result);
            if($row == NULL)
            {
                return array(
                    'state' => "Correcto",
                    'box' => "#box-user"
                    );
            }
            else
            {
                return array(
                    'state' => "Incorrecto",
                    'box' => "#box-user",
                    'errorBox' => "#error-user",
                    'error' => "El usuario no esta disponible."
                    );
            }
        }            
        else
        {
            return array(
                'state' => "Incorrecto",
                'box' => "#box-user",
                'errorBox' => "#error-user",
                'error' => "Debe tener al menos 2 caracteres."
                );            
        }
    }
    
    function sexValidate($sex)
    {
        if($sex !== "")
            return array(
                'state' => "Correcto",
                'box' => "#box-sex"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-sex",
                'errorBox' => "#error-sex",
                'error' => "Seleccione el sexo."
                );
    }
    
    function passValidate($pass)
    {
        if(strlen($pass) >= 8)
            return array(
                'state' => "Correcto",
                'box' => "#box-pass"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-pass",
                'errorBox' => "#error-pass",
                'error' => "Debe tener al menos 8 caracteres."
                );
    }
    
    function passConfirmValidate($pass, $passConfirm)
    {
        if($pass === $passConfirm)
            return array(
                'state' => "Correcto",
                'box' => "#box-pass-confirm"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-pass-confirm",
                'errorBox' => "#error-pass-confirm",
                'error' => "Las contraseñas no coinciden."
                );
    }
    
    function securityAnswerValidate($securityAnswer)
    {
        if(strlen($securityAnswer) > 0)
            return array(
                'state' => "Correcto",
                'box' => "#box-security-answer"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-security-answer",
                'errorBox' => "#error-security-answer",
                'error' => "No puede ser vacía."
                );
    }
?>