<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $nombreUsuario = "$rowUser[1] $rowUser[2]";
        
        $imageName = md5($rowUser[4]);
        $routeImage = "http://localhost/usuariosGitBook/$imageName";
?>        
    
<!DOCTYPE html>
<html>
<head>
    <title>GitBook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="/css/misEstilos.css">
    <link rel="stylesheet" type="text/css" href="/css/flexboxgrid.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script type="text/javascript" src="/js/vistaPrincipal.js"></script>
    <script type="text/javascript" src="/js/getFriends.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/chat.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/chat.js"></script>
    
</head>
<body onload="getFriends(); carga('miPerfil.php','cuerpo')">
    <div class="col-md-12 arriba">
        <div class="col-md-4"> 
            <h1 class="text-center pacific tamano-titulo go-top-2">GitBook</h1>
        </div>     
        <div class="col-md-3"> 
            <div class="inner-addon right-addon go-down">
                <input type="text" class="form-control" placeholder="Busca personas, empresas y foros"/>
                <i class="glyphicon glyphicon-search search"></i>
            </div>
        </div>  
        <div class="col-md-4 col-md-offset-1"> 
            <div class="row col-md-3">
                <img id="image-perfil" src="<?php echo $routeImage;?>" width="68" height="62">
            </div>
            <div class="row col-md-9"> 
                <label style="margin-top: 15px;" class="go-top label-size"><?php echo $nombreUsuario ?></label> 
            </div>
        </div>
    </div>
    
    <div class="container col-md-12 box-menu">
        <div class="row col-md-10 col-md-offset-1 text-center white">
            <div class="col-md-2 menu-nav label-size" onclick="carga('miPerfil.php','cuerpo')">
                <h4>Mi perfil</h4>
            </div>
            <div class="col-md-2 menu-nav label-size" onclick="carga('misAmigos.php','cuerpo')">
                <h4>Mis amigos</h4>
            </div>
            <div class="col-md-2 menu-nav label-size desplegar">
                <h4>Publicaciones</h4>
                <ul>
                    <li onclick="carga('crearPublicacion.php','cuerpo')"><a href='#'><h4>Crear publicación</h4></a></li>
                    <li onclick="carga('misPublicaciones.php','cuerpo')"><a href='#'><h4>Mis publicaciones</h4></a></li>
                </ul>
            </div>
            <div class="col-md-2 menu-nav label-size desplegar">
                <h4>Foros</h4>
                <ul>
                    <li onclick="carga('crearForo.php','cuerpo')"><a href='#'><h4>Crear foro</h4></a></li>
                    <li onclick="carga('misForos.php','cuerpo')"><a href='#'><h4>Mis foros</h4></a></li>
                    <li onclick="carga('forosActivos.php','cuerpo')"><a href='#'><h4>Foros activos</h4></a></li>
                </ul>
            </div>
            <div class="col-md-2 menu-nav label-size">
                <h4>Notificaciones</h4>
            </div>
            <div class="col-md-2 menumiPerfil.php-nav label-size" onclick="salir(this)">
                <h4 id="button-logout">Salir</h4>
            </div>
        </div>
    </div>
        
    <div class="col-md-12 cuerpo" id="cuerpo"></div>
    
    <div id="chat" class="chat-rounded-border properties-chat"></div>
    
    <div id="friends" class="properties-chat mCustomScrollbar" data-mcs-theme="minimal"></div>
               
</body>
</html>
<?php
    }
    else
    {
        header("location: /index.php");
    }
?>


