<?php
    session_start();
    
    $name = $_REQUEST['name'];
    $lastName = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $admissionDate = $_REQUEST['admission_date'];
    $user = $_REQUEST['user'];
    if(isset($_REQUEST['sex']))
    {
        $sex = $_REQUEST['sex'];
    }
    else
        $sex = "";
    $pass = $_REQUEST['pass'];
    $securityQuestion = $_REQUEST['security_question'];
    $securityAnswer = $_REQUEST['security_answer'];
    
    $strconn="host=localhost port=5432 dbname=gitbook user=postgres password=12345";    
    $conn=pg_connect($strconn);
    $query = "insert into personas(nombre, apellidos, correo, usuario, pass, fechaIngreso, sexo, preguntaSeg, respuestaSeg)";
    $query .=" values('$name','$lastName','$email','$user','$pass','$admissionDate','$sex','$securityQuestion','$securityAnswer')";
    $result = pg_query($conn,$query);    
    
    $query1 = "Select * from personas where usuario='$user'";
    $result1 = pg_query($conn,$query1);
    $row = pg_fetch_row($result1);
            
    $_SESSION["rowUser"] = $row;
    header('Location: /vistas/vistaPrincipal.php');
    
?>
