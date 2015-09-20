<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página web</title>
        <link rel="stylesheet" type="text/css" href="/css/flexboxgrid.css">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link rel="stylesheet" type="text/css" href="/css/chat.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script>
            function ocultarChat()
            {
                $('#chat').hide(500);
                $('#chat').empty();
            }
            function newChat(number_friend) 
            {
                var div_header = document.createElement("div");
                div_header.setAttribute("class", "chat-rounded-border chat-header");
                var label_name = document.createElement("label");
                label_name.setAttribute("class", "label-size white");
                label_name.appendChild(document.createTextNode($("#friend-"+number_friend).val()));
                var label_exit = document.createElement("label");
                label_exit.setAttribute("class", "label-size white chat-exit");
                label_exit.setAttribute("onclick", "ocultarChat()");
                label_exit.appendChild(document.createTextNode("X"));
                div_header.appendChild(label_name);
                div_header.appendChild(label_exit);
                
                var div_messages = document.createElement("div");
                div_header.setAttribute("id", "chat-messages");
                // CARGAR MENSAJES DE LA CONVERSACCION
                
                var input_message = document.createElement("input");
                input_message.setAttribute("id", "box-new-message");
                input_message.setAttribute("class", "text-box-chat");
                input_message.setAttribute("type", "text");
                input_message.setAttribute("name", "new-message");
                
                $("#chat").append(div_header);
                $("#chat").append(div_messages);
                $("#chat").append(input_message);
                $("#chat").show(500);
            }
            $(document).on("keyup", function (e) {
                if($("#box-new-message").is(":focus") && (e.keyCode === 13)) {
                    var div = document.createElement("div");
                    div.setAttribute("class", "col-md-12");
                    var label = document.createElement("label");
                    label.setAttribute("class", "my-messages properties-messages");
                    label.appendChild(document.createTextNode($("#box-new-message").val()));
                    div.appendChild(label);
                    $("#chat-messages").append(div);
                    
                    $("#box-new-message").val("");
                }
                else if($("#box-new-message").is(":focus") && (e.keyCode === 27)) {
                    ocultarChat();
                }
            });
        </script>
    </head>
    <body>
        <div id="chat" class="chat-rounded-border properties-chat">
            <div class="chat-rounded-border chat-header">
                <label class="label-size white">Fauricio Rojas</label>
                <label class="label-size white chat-exit" onclick="ocultarChat()">X</label>
            </div>
            <div id="chat-messages">
                <div class="col-md-12">
                    <label class="my-messages properties-messages">Cara de pinga.</label>
                </div>
                <div class="col-md-12">
                    <label class="message-receive properties-messages">Cristian: Carepinga, dónde está?</label>
                </div>
            </div>
            <input id="box-new-message" class="text-box-chat" type="text" name="new-message">
        </div>
        <div id="friends" class="properties-chat">
            <input id="friend-1" class="box-friend" onclick="newChat(1)" value="Cristian Salas" readonly>
            <input id="friend-2" class="box-friend" onclick="newChat(2)" value="Kenneth Pérez" readonly>
            <input id="friend-3" class="box-friend" onclick="newChat(3)" value="Jose R. Chacón" readonly>
        </div>
    </body>
</html>

