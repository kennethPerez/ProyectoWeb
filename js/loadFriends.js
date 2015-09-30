/*function loadFriends()
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
                var div_principal = document.createElement("div");
                div_principal.setAttribute("class", "col-md-12")
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
}*/

function loadFriends()
{
    $.ajax({
        url: '/php/loadFriends.php',
        type: 'POST',
        success:function(data)
        {
            data = $.parseJSON(data);
            
            $('#cuerpo').empty();
            
            if(data.length > 0){
                var div = document.createElement('div');
                div.setAttribute("class","col-md-12");

                var h2 = document.createElement('h2');
                h2.setAttribute("class","lato");
                h2.appendChild(document.createTextNode("Mis amigos"));
                
                div.appendChild(h2);
                
                var divC = document.createElement('div');
                divC.setAttribute("class","col-md-12 border-top");
                
                for(var i=0; i<data.length; i++)
                {
                    var div_amigo = document.createElement("div");
                    div_amigo.setAttribute("class","col-md-6 box-friend-view");

                    var divNombre = document.createElement('div');
                    divNombre.setAttribute("class","col-md-10");

                    var divImagen = document.createElement('div');
                    divImagen.setAttribute("class","col-md-2");

                    var img = document.createElement('img');
                    img.setAttribute("src","http://localhost/usuariosGitBook/"+data[i].usuario);
                    img.setAttribute("style","width:70px; height:70px");
                    img.setAttribute("onclick","cargarPersona(\""+data[i].nombre+"\","+data[i].id+")");

                    var label_nombre = document.createElement('p');
                    label_nombre.appendChild(document.createTextNode(data[i].nombre));
                    label_nombre.setAttribute("class", "label-size");
                    
                    var label_correo = document.createElement('p');
                    label_correo.appendChild(document.createTextNode(data[i].correo));
                    label_correo.setAttribute("class", "label-size text-info");

                    divNombre.appendChild(label_nombre);
                    divNombre.appendChild(label_correo);
                    divImagen.appendChild(img);

                    div_amigo.appendChild(divImagen);
                    div_amigo.appendChild(divNombre);   
                    
                    divC.appendChild(div_amigo);
                }
                div.appendChild(divC);
                $("#cuerpo").append(div);
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
    });
}