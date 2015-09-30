function getMisPublicaciones()
{
    carga('misPublicaciones.php','cuerpo');
    var peticion = obtenerXHR(); 
    peticion.open("GET","/php/cargarMisPublicaciones.php", true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            //alert(respuestaJSON);
            var json_publicaciones = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            for(var i=0; i<json_publicaciones.length; i++) 
            {
                var div = document.createElement("div");
                var h41 = document.createElement("h4");
                var h42 = document.createElement("h4");
                var h43 = document.createElement("h4");
                var h61 = document.createElement("h6");
                var h62 = document.createElement("h6");
                var h63 = document.createElement("textarea");
                h63.setAttribute("class","text-area");
                h63.setAttribute("readonly","");
                h63.setAttribute("style","font-size: 0.9em");
                var hr = document.createElement("hr");
               
                h41.appendChild(document.createTextNode("Descripción"));
                h42.appendChild(document.createTextNode("Lenguaje"));
                h43.appendChild(document.createTextNode("Código"));
                h61.appendChild(document.createTextNode(json_publicaciones[i]['descripcion']));
                h62.appendChild(document.createTextNode(json_publicaciones[i]['nombre']));
                h63.appendChild(document.createTextNode(json_publicaciones[i]['codigo']));
                
               
                h41.setAttribute("class","green lato");
                h42.setAttribute("class","green lato");
                h43.setAttribute("class","green lato");

                
                div.appendChild(h41);
                div.appendChild(h61);
                div.appendChild(h42);
                div.appendChild(h62);
                div.appendChild(h43);
                div.appendChild(h63);
                div.appendChild(hr);
                $(".misPublicaciones").append(div);
            }
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}



