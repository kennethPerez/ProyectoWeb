var string_search_friends = "";

(function($){
    $(window).load(function(){
        $("body").mCustomScrollbar({
            theme:"minimal"
        });
    });
})(jQuery);

function ocultarChat()
{
    $('#chat').hide(500);
    $('#chat').empty();
    $("#id-friend-chat-actual").val("");
}

$(document).on("keydown", function (e) {
    if($("#box-new-message").is(":focus") && (e.keyCode === 13) && $("#box-new-message").val() !== "") {
        var peticion = obtenerXHR(); 
        var f = new Date();
        cad = f.getHours()+":"+f.getMinutes(); 
        peticion.open("GET", "/php/insertMessage.php?idFriend="+$("#id-friend-chat-actual").val()+"&message="+$("#box-new-message").val()+" | "+cad, true); 
        peticion.onreadystatechange = function() 
        {
            if(peticion.readyState === 4 && peticion.status === 200) // Petición completada
            {
                var div = document.createElement("div");
                div.setAttribute("class", "col-md-12");
                var label = document.createElement("label");
                label.setAttribute("class", "my-messages properties-messages");
                label.appendChild(document.createTextNode("Yo: "+$("#box-new-message").val()+" | "+cad));
                div.appendChild(label);
                $("#chat-messages").append(div);
                $("#box-new-message").val("");

                var altura = $(document).height()*100000;
                $("#chat-messages").animate({scrollTop: altura+"px"});
            }    
            else // Petición no completada
            {
                console.log("No completada | Estado de la petición: " + peticion.readyState); 
            }
        };
        peticion.send(null);
    }
    else if($("#box-new-message").is(":focus") && (e.keyCode === 27)) {
        ocultarChat();
    }
});