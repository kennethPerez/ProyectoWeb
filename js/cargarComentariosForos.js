function getComentariosForos()
{
    $(".listaForos").empty();
    //carga('forosActivos.php','cuerpo');
    var peticion = obtenerXHR(); 
    peticion.open("GET","/php/cargarComentariosForos.php", true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            var json_comentarios = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            
            var label = document.createElement("label");
            label.setAttribute("class", "label-size");
            label.appendChild(document.createTextNode("Comentarios"));
            $("#comments").append(label);
                    
            for(var i=0; i<json_comentarios.length; i++) 
            {
                var div = document.createElement("div");
                var label = document.createElement("label");  
                
                label.appendChild(document.createTextNode(json_comentarios[i]['comentario'])+" - "+json_comentarios[i]['nombre']);
                
                div.appendChild(label);
                $("#comments").append(div);
            }
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}



