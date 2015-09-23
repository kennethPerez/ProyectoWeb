<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $nombreUsuario = "$rowUser[1] $rowUser[2]";
        
        $imageName = md5($rowUser[4]);
        $routeImage = "http://localhost/usuariosGitBook/$imageName.png";
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
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/js/chat.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/js/vistaPrincipal.js"></script>
    <script type="text/javascript" src="/js/getFriends.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/chat.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body onload="getFriends()">
    <div class="col-md-12 arriba">
        <div class="col-md-4"> 
            <h1 class="text-center pacific tamano-titulo go-top-2">GitBook</h1>
        </div>     
        <div class="col-md-3"> 
            <div class="inner-addon right-addon go-down">
                <input type="text" class="form-control" placeholder="Busca personas, empresas y foros" />
                <i class="glyphicon glyphicon-search search"></i>
            </div>
        </div>  
        <div class="col-md-1"></div>
        <div class="col-md-4"> 
            <div class="col-md-3">
                <img src="<?php echo $routeImage;?>" width="68" height="62">
            </div>
            <div class="col-md-9"> 
                <h4 class="go-top"><?php echo $nombreUsuario ?></h4> 
            </div>
            <div class="col-md-4">
                <input type="submit" class="button-exit be-green-dark white" onclick="salir(this)" value="Salir">
            </div>
        </div>
    </div>
    
    <div class="container col-md-12 box-menu">
        <div class="row col-md-8 col-md-offset-2 text-center white">
            <div class="col-md-2 col-md-offset-1 menu-nav label-size">Perfil</div>
            <div class="col-md-2 menu-nav label-size">Mis amigos</div>
            <div class="col-md-2 menu-nav label-size">Publicaciones</div>
            <div class="col-md-2 menu-nav label-size">
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu 1 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Submenu 1-1</a></li>
                  <li><a href="#">Submenu 1-2</a></li>
                  <li><a href="#">Submenu 1-3</a></li>                        
                </ul>
              </li>
            </div>
            <div class="col-md-2 menu-nav label-size">Notificaciones</div>
        </div>
    </div>
        
    <div class="col-md-12 menuD">
        <nav id="menu">
            <ul>
                <li>
                    <a href="javaScript:;" onclick="carga('miPerfil.php','cuerpo')">Perfil</a>
                </li>
                <li>
                    <a href="javasScrip:;" onclick="carga('misAmigos.php','cuerpo')">Mis amigos</a>
                </li>
                <li> 
                    <a href="javaScript:;" onclick="carga('misPublicaciones.php','cuerpo')">Publicaciones</a> 
                </li>
                <li> 
                    <a href="#">Foros</a> 
                    <ul>
                        <li> 
                            <a href="javaScript:;" onclick="carga('crearForo.php','cuerpo')">Crear Foro</a> 
                        </li>
                        <li> 
                            <a href="#"> Mis Foros </a> 
                        </li>
                        <li> 
                            <a href="#"> Foros Activos </a> 
                        </li>
                    </ul>
                </li>
                <li> 
                    <a href="#">Notificaciones</a> 
                </li>
            </ul>
        </nav>
    </div>
        
    <div class="col-md-12 cuerpo" id="cuerpo"></div>
    
    <!--<div id="chat" class="chat-rounded-border properties-chat">
        <div class="chat-rounded-border chat-header">
            <label class="white">Cristian Salas</label>
            <label class="white chat-exit" onclick="ocultarChat()">X</label>
        </div>
        <div id="chat-messages">
            <div class="col-md-12">
                <label class="my-messages properties-messages">Cara de pinga</label>
            </div>
            <div class="col-md-12">
                <label class="message-receive properties-messages">Cristian: Carepinga, dónde está?</label>
            </div>
        </div>
        <input id="box-new-message" class="text-box-chat" type="text" name="new-message">
    </div>-->
    <div id="friends" class="properties-chat mCustomScrollbar" data-mcs-theme="minimal">
        <!--<input id="friend-1" class="box-friend" onclick="newChat(1)" value="Leonardo Víquez" readonly>
        <input id="friend-2" class="box-friend" onclick="newChat(2)" value="Kenneth Pérez" readonly>
        <input id="friend-3" class="box-friend" onclick="newChat(3)" value="Jose R. Chacón" readonly>
        <input id="friend-4" class="box-friend" onclick="newChat(4)" value="Mainor Gamboa" readonly>
        <input id="friend-5" class="box-friend" onclick="newChat(5)" value="Brian Salazar" readonly>
        <input id="friend-6" class="box-friend" onclick="newChat(6)" value="Daniel Rodriguez" readonly>
        <input id="friend-7" class="box-friend" onclick="newChat(7)" value="Manfred Artavia Gómez" readonly>
        <input id="friend-8" class="box-friend" onclick="newChat(8)" value="Carlos Jimenez" readonly>
        <input id="friend-9" class="box-friend" onclick="newChat(9)" value="Heiner Lezama" readonly>
        <input id="friend-10" class="box-friend" onclick="newChat(10)" value="Yorbi G. Mendez" readonly>
        <input id="friend-11" class="box-friend" onclick="newChat(11)" value="Carlos Vargas Montoya" readonly>
        <input id="friend-12" class="box-friend" onclick="newChat(12)" value="Alejandro Rodriguez Salas" readonly>
        <input id="friend-13" class="box-friend" onclick="newChat(13)" value="Mauricio Rodriguez" readonly>
        <input id="friend-14" class="box-friend" onclick="newChat(14)" value="J. Andrés López" readonly>
        <input id="friend-15" class="box-friend" onclick="newChat(15)" value="Stwart Blanco" readonly>
        <input id="friend-16" class="box-friend" onclick="newChat(16)" value="Carlos Solís" readonly>
        <input id="friend-17" class="box-friend" onclick="newChat(17)" value="Juan Miguel Arce" readonly>
        <input id="friend-18" class="box-friend" onclick="newChat(18)" value="Oscar Víquez" readonly>
        <input id="friend-19" class="box-friend" onclick="newChat(19)" value="Froilan Vargas Montoya" readonly>
        <input id="friend-20" class="box-friend" onclick="newChat(20)" value="Marvin Rojas Rojas" readonly>
        <input id="friend-21" class="box-friend" onclick="newChat(21)" value="Jonathan Rojas Vargas" readonly>-->
    </div>
               
</body>
</html>
<?php
    }
    else
    {
        header("location: /index.php");
    }
?>


