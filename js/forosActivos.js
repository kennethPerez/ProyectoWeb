function getForosActivos()
{
    carga('forosActivos.php','cuerpo'); 
    $(".listaForos").empty();
            
    var peticion = obtenerXHR(); 
    peticion.open("GET", "/php/cargarForosActivos.php", true);
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            var json_foros = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            
            for(var i=0; i<json_foros.length; i++) 
            {
                var label = document.createElement("label");
                var a = document.createElement("a");
                a.setAttribute("onclick", "mostrarInfoForos('"+json_foros[i]['nombre']+"','"+json_foros[i]['descripcion']+"',"+json_foros[i]['idforo']+")");
                a.appendChild(document.createTextNode(json_foros[i]['titulo']));
                
                label.appendChild(a);
                $(".listaForos").append(label);
            }
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}
