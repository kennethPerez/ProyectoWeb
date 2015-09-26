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
}
function newChat(number_friend) 
{
    ocultarChat();
    var div_header = document.createElement("div");
    div_header.setAttribute("class", "chat-rounded-border chat-header");
    var label_name = document.createElement("label");
    label_name.setAttribute("class", "white lato");
    label_name.appendChild(document.createTextNode($("#friend-"+number_friend).val()));
    var label_exit = document.createElement("label");
    label_exit.setAttribute("class", "white chat-exit");
    label_exit.setAttribute("onclick", "ocultarChat()");
    label_exit.appendChild(document.createTextNode("X"));
    div_header.appendChild(label_name);
    div_header.appendChild(label_exit);

    var div_messages = document.createElement("div");
    div_messages.setAttribute("id", "chat-messages");
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
$(document).on("keydown", function (e) {
    if($("#box-new-message").is(":focus") && (e.keyCode === 13) && $("#box-new-message").val() !== "") {
        var div = document.createElement("div");
        div.setAttribute("class", "col-md-12");
        var label = document.createElement("label");
        label.setAttribute("class", "my-messages properties-messages");
        var f = new Date();
        cad = f.getHours()+":"+f.getMinutes(); 
        label.appendChild(document.createTextNode($("#box-new-message").val()+" | "+cad));
        div.appendChild(label);
        $("#chat-messages").append(div);
        $("#box-new-message").val("");

        var altura = $(document).height()*100000;
        $("#chat-messages").animate({scrollTop: altura+"px"});
    }
    else if($("#box-new-message").is(":focus") && (e.keyCode === 27)) {
        ocultarChat();
    }
});
$(".box-friend").on("mouseenter", function(){
    alert("El ratón está sobre el texto");
});

$(document).on("ready", function(){
    $("#friends").mouseenter(function(){
        $(document).on("keydown", function (e) {
            if(e.keyCode === 8)
            {
                console.log("Borrar");
                // Recortar cadena
            }
            else
            {
                string_search_friends = string_search_friends + String.fromCharCode(e.keyCode);
                console.log(string_search_friends);
            }
        });
    });
});