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

function obtenerHoraActual()
{
    var fecha = new Date();
    var hora = fecha.getHours();
    var minuto = fecha.getMinutes();
    if (hora < 10) 
    {
        hora = "0" + hora;
    }
    if (minuto < 10) 
    {
        minuto = "0" + minuto;
    }
    
    return hora + ":" + minuto;
}

$(document).on("keydown", function (e) {
    if($("#box-new-message").is(":focus") && (e.keyCode === 13) && $("#box-new-message").val() !== "") {
        var peticion = obtenerXHR();         
        var hora = obtenerHoraActual();

        peticion.open("GET", "/php/insertMessage.php?idFriend="+$("#id-friend-chat-actual").val()+"&message="+$("#box-new-message").val()+"&hour="+hora, true); 
        peticion.onreadystatechange = function() 
        {
            if(peticion.readyState === 4 && peticion.status === 200) // Petición completada
            {
                var div = document.createElement("div");
                div.setAttribute("class", "col-md-12");
                var label = document.createElement("label");
                label.setAttribute("class", "my-messages properties-messages");
                var labelMessage = document.createElement("div");
                labelMessage.appendChild(document.createTextNode("Yo: "+$("#box-new-message").val()));
                var labelHora = document.createElement("div");
                labelHora.setAttribute("class", "text-right");
                labelHora.appendChild(document.createTextNode(hora));
                label.appendChild(labelMessage);
                label.appendChild(labelHora);
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