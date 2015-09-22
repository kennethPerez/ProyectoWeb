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

function cargarAjax()
{
    var peticion = obtenerXHR(); 
    peticion.open("GET", "php/getFriends.php", true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            document.getElementById(capaContenido).innerHTML = peticion.responseText;
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}    