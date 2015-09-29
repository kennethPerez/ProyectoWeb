<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Página web</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/flexboxgrid.css">
    <link rel="stylesheet" type="text/css" href="/css/estilos.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="/js/chat.js"></script>
    <script type="text/javascript" src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="/css/chat.css">
    
</head>
<body>
    <div id="chat" class="chat-rounded-border properties-chat">
        <div class="chat-rounded-border chat-header">
            <label class="white">Cristian Salas</label>
            <label class="white chat-exit" onclick="ocultarChat()">X</label>
        </div>
        <div id="chat-messages">
            <div class="col-md-12">
                <label class="my-messages properties-messages">Cara de pinga</label>
            </div>
            <div class="col-md-12">
                <label class="message-receive properties-messages">Cristian: Carepinga, dónde está?</label>
            </div>
        </div>
        <input id="box-new-message" class="text-box-chat" type="text" name="new-message">
    </div>
    <div id="box-friends" class="properties-chat">
        <input type="text" class="text-box-search-friend lato" placeholder="Buscar"/>
        <div id="friends" class="properties-chat mCustomScrollbar" data-mcs-theme="minimal">
            <div>
                <img src="/img/online.png" width="15px" height="15px">
                <input id="friend-1" class="box-friend" onclick="newChat(1)" value="Leonardo Víquez" readonly>
            </div>
            <!--<input id="friend-2" class="box-friend" onclick="newChat(2)" value="Kenneth Pérez" readonly>
            <input id="friend-3" class="box-friend" onclick="newChat(3)" value="Jose R. Chacón" readonly>
            <input id="friend-4" class="box-friend" onclick="newChat(4)" value="Mainor Gamboa" readonly>
            <input id="friend-5" class="box-friend" onclick="newChat(5)" value="Brian Salazar" readonly>
            <input id="friend-6" class="box-friend" onclick="newChat(6)" value="Daniel Rodriguez" readonly>
            <input id="friend-7" class="box-friend" onclick="newChat(7)" value="Manfred Artavia Gómez" readonly>
            <input id="friend-8" class="box-friend" onclick="newChat(8)" value="Carlos Jimenez" readonly>
            <input id="friend-9" class="box-friend" onclick="newChat(9)" value="Heiner Lezama" readonly>
            <input id="friend-10" class="box-friend" onclick="newChat(10)" value="Yorbi G. Mendez" readonly>
            <input id="friend-11" class="box-friend" onclick="newChat(11)" value="Carlos Vargas Montoya" readonly>
            <input id="friend-12" class="box-friend" onclick="newChat(12)" value="Alejandro Rodriguez Salas" readonly>
            <input id="friend-13" class="box-friend" onclick="newChat(13)" value="Mauricio Rodriguez" readonly>
            <input id="friend-14" class="box-friend" onclick="newChat(14)" value="J. Andrés López" readonly>
            <input id="friend-15" class="box-friend" onclick="newChat(15)" value="Stwart Blanco" readonly>
            <input id="friend-16" class="box-friend" onclick="newChat(16)" value="Carlos Solís" readonly>
            <input id="friend-17" class="box-friend" onclick="newChat(17)" value="Juan Miguel Arce" readonly>
            <input id="friend-18" class="box-friend" onclick="newChat(18)" value="Oscar Víquez" readonly>
            <input id="friend-19" class="box-friend" onclick="newChat(19)" value="Froilan Vargas Montoya" readonly>
            <input id="friend-20" class="box-friend" onclick="newChat(20)" value="Marvin Rojas Rojas" readonly>
            <input id="friend-21" class="box-friend" onclick="newChat(21)" value="Jonathan Rojas Vargas" readonly>-->
        </div>
    </div>
</body>
</html>