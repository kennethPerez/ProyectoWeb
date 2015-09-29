function mostrarDescripForo(des)
{
    document.getElementById("foro-actual").innerHTML = des;
}

function mostrarInfoForos(nombre,descripcion,idforo)
{
    $.ajax({
        url: '/php/cargarComentariosForos.php',
        type: 'POST',
        data: {idForo:idforo},
        success:function(json_comentarios)
        {
            $("#comments").empty();
            json_comentarios = $.parseJSON(json_comentarios);
             
            document.getElementById("foro-activo-nombre").innerHTML = "Creador del foro: " + nombre;
            document.getElementById("foro-activo-descripcion").innerHTML = "Descripción: " + descripcion;
            document.getElementById("foro-activo-idforo").innerHTML = "Número de foro: " + idforo;
            document.getElementById("foro-activo-identificador").value = idforo;
    
            for(var i = 0; i < json_comentarios.length; i++)
            {
                var div = document.createElement("div");
                var h4 = document.createElement("h4");            
                
                h4.appendChild(document.createTextNode(json_comentarios[i]['comentario']));
                
                div.appendChild(h4);
                $("#comments").append(div);
            }
            
            document.getElementById("text-comentar-foro").style.display = "block";
            document.getElementById("label-comentar-foro").style.display = "block";
            document.getElementById("btn-comentar-foro").style.display = "block";
        }
        });
    
    
    /*
    var peticion = obtenerXHR();
    peticion.open("GET", "/php/cargarComentariosForos.php?idForo="+idforo, true); 
    alert("ID FORO: "+idforo);
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            var json_comentarios = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            
            document.getElementById("foro-activo-nombre").innerHTML = "Creador del foro:    " + nombre;
            document.getElementById("foro-activo-descripcion").innerHTML = "Descripción:    " + descripcion;
            document.getElementById("foro-activo-idforo").innerHTML = "Número de foro:     " + idforo;
            document.getElementById("foro-activo-identificador").value = idforo;
    
            for(var i = 0; i < json_comentarios.length; i++)
            {
                var div = document.createElement("div");
                var h4 = document.createElement("h4");            
                
                h4.appendChild(document.createTextNode(json_comentarios[i]['comentario']));
                
                div.appendChild(h4);
                $("#comments").append(div);
            }
            
            document.getElementById("text-comentar-foro").style.display = "block";
            document.getElementById("label-comentar-foro").style.display = "block";
            document.getElementById("btn-comentar-foro").style.display = "block";
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };*/
}

function saludar()
{
    alert("so");
}