<?php
    $array_data = array();
    $name = $_POST['name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $admissionDate = $_POST['admission-date'];
    $user = $_POST['user'];
    if(isset($_POST['sex']))
    {
        $sex = $_POST['sex'];
    }
    else
        $sex = "";
    $pass = $_POST['pass'];
    $passConfirm = $_POST['pass-confirm'];
    $securityAnswer = $_POST['security-answer'];

    sleep(2);

    $array_data[] = nameValidate($name);
    $array_data[] = lastNameValidate($lastName);
    $array_data[] = emailValidate($email);
    $array_data[] = admissionDateValidate($admissionDate);
    $array_data[] = userValidate($user);
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

    function emailValidate($email)
    {
        if(preg_match(
        '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
        $email))
            return array(
                'state' => "Correcto",
                'box' => "#box-email",
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-email",
                'errorBox' => "#error-email",
                'error' => "Escriba un email válido."
                );
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
    
    function userValidate($user)
    {
        if(strlen($user) >= 2)
            return array(
                'state' => "Correcto",
                'box' => "#box-user"
                );
        else
            return array(
                'state' => "Incorrecto",
                'box' => "#box-user",
                'errorBox' => "#error-user",
                'error' => "Debe tener al menos 2 caracteres."
                );
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