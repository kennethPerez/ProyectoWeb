<?php
    session_start();
    if (isset( $_SESSION["name"]))
    {
?>        
    
<!DOCTYPE html>
<html>
<head>
    <title>GitBook</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/misEstilos.css">
    <link rel="stylesheet" type="text/css" href="/css/flexboxgrid.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/js/chat.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/chat.css">
    
    <!-- <script>

        function cargarPerfil()
        {
            document.getElementById("cuerpo").innerHTML='<object type=text/php data="miPerfil.php"> </object>';
        }

    </script> -->

    <script>
        function carga(url,id)
        {
            var pagecnx = createXMLHttpRequest();
            pagecnx.onreadystatechange=function()
            {
                if (pagecnx.readyState === 4 &&
                   (pagecnx.status===200 || window.location.href.indexOf("http")===-1))
                       document.getElementById(id).innerHTML=pagecnx.responseText;
            };
            pagecnx.open('GET',url,true);
            pagecnx.send(null);
        }

        function createXMLHttpRequest()
        {
            var xmlHttp=null;
            if (window.ActiveXObject) xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            else if (window.XMLHttpRequest)
                         xmlHttp = new XMLHttpRequest();
            return xmlHttp;
        }

        function confirmar()
        {
            <?php
                unset( $_SESSION["name"]);
            ?>
            location.href = "/index.php";
        }

        function salir(elemento)
        {
            elemento.style.backgroundColor = "red";
            elemento.value = "Confirmar";
            elemento.setAttribute("onClick","confirmar()");

            setTimeout(function()
            {
                elemento.style.backgroundColor = "#0455BF";
                elemento.value = "Salir";
                elemento.setAttribute("onClick","salir(this)"); 
            }, 3000);
        }
    </script>
</head>
<body>   
    <div class="col-md-12 arriba">
        <br>
        <div class="col-md-4"> 
            <div class="col-md-1"></div>
            <div class="col-md-3"><br>Logo</div>
            <div class="col-md-8">
                <h1>GitBook</h1>
            </div>
        </div>     
        <div class="col-md-4"> 
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <br>
                <input id="btnBuscar" type="text" placeholder="Buscar">
            </div>
        </div>  
        <div class="col-md-4"> 
            <div class="col-md-1">  </div>
            <div class="col-md-3"> <br> Foto </div>
            <div class="col-md-6"> 
                <br> 
                <label>Nombre persona</label> 
                <br> 
                <input type="submit" class="btnSalir" onclick="salir(this)" value="Salir">
            </div>
            <div class="col-md-2"></div>
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
                <li> 
                    <a href="#">Chat</a> 
                </li>
            </ul>
        </nav>
    </div>
        
    <div class="col-md-12 cuerpo" id="cuerpo">
        Cuerpo
    </div>

    <div class="col-md-12 fondo">
        Fondo
    </div>
               
</body>
</html>
<?php
    }
    else
    {
        echo "El usuario no tiene acceso a este sitio";
    }
?>


