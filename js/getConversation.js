function getConversation(id_sesion, id_friend)
{
    var peticion = obtenerXHR(); 
    peticion.open("GET", "/php/getConversation.php?idFriend="+id_friend, true); 
    peticion.onreadystatechange = function() 
    {
        if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
        {
            var respuestaJSON = peticion.responseText;
            var json_mensajes = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON
            
            ocultarChat();
            $("#id-friend-chat-actual").val(id_friend); // Se almacena el id del amigo en un div oculto
            
            var div_header = document.createElement("div");
            div_header.setAttribute("class", "chat-rounded-border chat-header");
            var label_name = document.createElement("label");
            label_name.setAttribute("class", "white lato");
            label_name.appendChild(document.createTextNode($("#friend-"+id_friend).val()));
            var label_exit = document.createElement("label");
            label_exit.setAttribute("class", "white chat-exit");
            label_exit.setAttribute("onclick", "ocultarChat()");
            label_exit.appendChild(document.createTextNode("X"));
            div_header.appendChild(label_name);
            div_header.appendChild(label_exit);

            var div_messages = document.createElement("div");
            div_messages.setAttribute("id", "chat-messages");
            for(var i=0; i<json_mensajes.length; i++) 
            {
                var div = document.createElement("div");
                div.setAttribute("class", "col-md-12");
                var label = document.createElement("label");
                
                if(json_mensajes[i]['idPersona1'] == id_sesion)
                {
                    label.setAttribute("class", "my-messages properties-messages");
                    label.appendChild(document.createTextNode("Yo: "+json_mensajes[i]['mensaje']));
                }
                else
                {
                    label.setAttribute("class", "message-receive properties-messages");
                    label.appendChild(document.createTextNode(json_mensajes[i]['amigo']+": "+json_mensajes[i]['mensaje']));
                }
                div.appendChild(label);
                div_messages.appendChild(div);
            }

            var input_message = document.createElement("input");
            input_message.setAttribute("id", "box-new-message");
            input_message.setAttribute("class", "text-box-chat");
            input_message.setAttribute("type", "text");
            input_message.setAttribute("name", "new-message");
                
            $("#chat").append(div_header);
            $("#chat").append(div_messages);
            $("#chat").append(input_message);
            
            var altura = $(document).height()*100000;
            $("#chat-messages").animate({scrollTop: altura+"px"});
            $("#chat").show(500);
        }    
        else // Petición no completada
        {
            console.log("No completada | Estado de la petición: " + peticion.readyState); 
        }
    };
    peticion.send(null);     
}

setInterval(function(){
    if($("#id-friend-chat-actual").val() !== "")
    {
        var id_friend = $("#id-friend-chat-actual").val();
        var peticion = obtenerXHR(); 
        peticion.open("GET", "/php/getConversation.php?idFriend="+id_friend, true); 
        peticion.onreadystatechange = function() 
        {
            if (peticion.readyState === 4 && peticion.status === 200) // Petición completada
            {
                var respuestaJSON = peticion.responseText;
                var json_mensajes = eval("("+respuestaJSON+")"); // Se evalua la respuesta del JSON

                $("#chat-messages").empty();
                for(var i=0; i<json_mensajes.length; i++) 
                {
                    var div = document.createElement("div");
                    div.setAttribute("class", "col-md-12");
                    var label = document.createElement("label");

                    if(json_mensajes[i]['idPersona1'] != id_friend)
                    {
                        label.setAttribute("class", "my-messages properties-messages");
                        label.appendChild(document.createTextNode("Yo: "+json_mensajes[i]['mensaje']));
                    }
                    else
                    {
                        label.setAttribute("class", "message-receive properties-messages");
                        label.appendChild(document.createTextNode(json_mensajes[i]['amigo']+": "+json_mensajes[i]['mensaje']));
                    }
                    div.appendChild(label);
                    $("#chat-messages").append(div);
                }
            }    
            else // Petición no completada
            {
                console.log("No completada | Estado de la petición: " + peticion.readyState); 
            }
        };
        peticion.send(null);     
    }
}, 3000);