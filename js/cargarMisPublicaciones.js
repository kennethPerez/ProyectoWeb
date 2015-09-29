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
            var json_publicaciones = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            for(var i=0; i<json_publicaciones.length; i++) 
            {
                var div = document.createElement("div");
                var h4 = document.createElement("h4");
                var h6 = document.createElement("h6");
                var br = document.createElement("br");
                var hr = document.createElement("hr");
               
                
                h4.appendChild(document.createTextNode("Descripción: "+json_publicaciones[i]['descripcion']));
                h6.appendChild(document.createTextNode("Código: "+json_publicaciones[i]['codigo']));
                
                div.appendChild(h4);
                $(".misPublicaciones").append(div);
                $(".misPublicaciones").append(h6);
                $(".misPublicaciones").append(br);
                $(".misPublicaciones").append(hr);
            }
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}



