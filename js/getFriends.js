var json_amigos;

function obtenerXHR() 
{  
    req = false; 
    if(window.XMLHttpRequest) 
    { 
        req = new XMLHttpRequest(); 
    }     
    else 
    { 
        if(ActiveXObject) 
        { 
            var vectorVersiones = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0","MSXML2.XMLHttp", "Microsoft.XMLHttp"]; 
            for(var i=0; i<vectorVersiones.lengt; i++) 
            { 
                try 
                { 
                    req = new ActiveXObject(vectorVersiones[i]); 
                    return req;
                } 
                catch(e) 
                {} 
            } 
        } 
    } 
    return req; 
} 

function getFriends()
{
    var peticion = obtenerXHR(); 
    peticion.open("GET", "/php/getFriends.php", true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            json_amigos = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            
            $("#friends").empty();
            
            if($("#search-friends").val() === ""){
                for(var i=0; i<json_amigos.length; i++) 
                {
                    // Crear elemento para cada amigo
                    var input = document.createElement("input");
                    input.setAttribute("id", "friend-"+json_amigos[i]['id']);
                    input.setAttribute("class", "box-friend lato");
                    input.setAttribute("onclick", "getConversation("+json_amigos[i]['id_sesion']+","+json_amigos[i]['id']+")");
                    input.setAttribute("value", json_amigos[i]['nombre']);
                    input.setAttribute("readonly", "");

                    $('#friends').append(input);
                }
            }
            else
                filtrarAmigos();
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}    

setInterval(getFriends, 5000);

/* Inicio buscar amigos conectados */
function filtrarAmigos()
{
    var clave = $("#search-friends").val();
    $("#friends").empty();
    
    for(var i=0; i<json_amigos.length; i++) 
    {
        if(json_amigos[i]['nombre'].indexOf(clave) > -1) 
        {
            // Crear elemento para cada amigo
            var input = document.createElement("input");
            input.setAttribute("id", "friend-"+json_amigos[i]['id']);
            input.setAttribute("class", "box-friend lato");
            input.setAttribute("onclick", "newChat("+json_amigos[i]['id']+")");
            input.setAttribute("value", json_amigos[i]['nombre']);
            input.setAttribute("readonly", "");

            $('#friends').append(input);
        }
    }
}
/* Fin buscar amigos conectados */