function loadFriends()
{
    carga('misAmigos.php','cuerpo'); 
    var peticion = obtenerXHR(); 
    peticion.open("GET", "/php/loadFriends.php", true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            var jsonAmigos = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            
            if(jsonAmigos.length > 0)
            {
                // HACER INTERFAZ A PATA PARA MOSTRAR AMIGOS
            }
            else
            {
                var div = document.createElement("div");
                div.setAttribute("class", "col-md-4 col-md-offset-4 text-center");
                var h3 = document.createElement("h3");
                h3.setAttribute("class", "label-size");
                h3.appendChild(document.createTextNode("Usted no tiene amigos."));
                div.appendChild(h3);
                
                $(".misAmigos").append(div);
            }
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}