function getMisForos()
{
    $(".listaForos").empty();
    carga('misForos.php','cuerpo');
    var peticion = obtenerXHR(); 
    peticion.open("GET","/php/cargarMisForos.php", true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            
            var json_misForos = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            for(var i=0; i<json_misForos.length; i++) 
            {
                var label = document.createElement("label");
                var a = document.createElement("a");
                a.setAttribute("onclick","mostrarDescripForo('"+json_misForos[i]['descripcion']+"')");
               
                
                a.appendChild(document.createTextNode(json_misForos[i]['titulo']));
                
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






