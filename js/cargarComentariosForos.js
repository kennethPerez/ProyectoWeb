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
            alert(json_comentarios);
            for(var i=0; i<json_comentarios.length; i++) 
            {
                var div = document.createElement("div");
                var h4 = document.createElement("h4");            
                
                h4.appendChild(document.createTextNode(json_comentarios[i]['comentario']));
                
                div.appendChild(h4);
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



