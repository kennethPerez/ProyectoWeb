<!DOCTYPE html>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/css/misEstilos.css">
        <link rel="stylesheet" type="text/css" href="/css/flexboxgrid.css">
    </head>
    <body>   
        
        <!-- <script>
            
            function cargarPerfil()
            {
                document.getElementById("cuerpo").innerHTML='<object type=text/php data="miPerfil.php"> </object>';
            }
            
        </script> -->
        
        <script language="JavaScript">
 
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

        </script>
        
        <div class="col-md-12 arriba">
            
            <br>
            <div class="col-md-4"> 
            
                <div class="col-md-1"> </div>
                <div class="col-md-3"> <br> Logo </div>
                <div class="col-md-8"> <h1> GitBook </h1> </div>
            
            </div>
            
            <div class="col-md-3"> 
                
                <div class="col-md-2"> </div>
                <div class="col-md-10"> <br> <input id="btnBuscar" type="text" placeholder="Buscar"> </div>
                
            </div>
            
            <div class="col-md-5"> 
                
                <div class="col-md-1">  </div>
                <div class="col-md-3"> <br> Foto </div>
                <div class="col-md-4"> <br> Info </div>
                <div class="col-md-1"> <br> </div>
                <div class="col-md-3"> <br> Cerrar </div>
                
            </div>
            
        </div>
        
        <div class="col-md-12 menuD">
            
            <nav id="menu">
                <ul>
                    <li> <a href="javaScript:;" onclick="carga('miPerfil.php','cuerpo')"> Perfil </a> </li>
                    <li> <a href="javasScrip:;" onclick="carga('misAmigos.php','cuerpo')"> Amigos </a> </li>
                    <li> <a href="#"> Publicaciones </a> </li>
                    <li> <a href="#"> Foros </a> 
                        
                        <ul>
                            <li> <a href="javaScript:;" onclick="carga('crearForo.php','cuerpo')"> Crear Foro </a> </li>
                            <li> <a href="#"> Foros participantes </a> </li>
                            <li> <a href="#"> Foros Activos </a> </li>
                        </ul>
                    
                    </li>
                    <li> <a href="#"> Notificaciones </a> </li>
                    <li> <a href="#"> Chat </a> </li>
                </ul>
            </nav>
            
        </div>
        
        <div class="col-md-12 cuerpo" id="cuerpo">
            Cuerpo
        </div>
        
        <div class="col-md-12 fondo">
            
        </div>
        
        
    </body>
</html>
