function agregarComentario() {
    console.log("ENTRA AL AJAX");
    var pet = $('#form-comentario-foro').attr('action');
    var met = $('#form-comentario-foro').attr('method');
    
    $.ajax({
        data: $('#form-comentario-foro').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#text-comentar-foro').css("border-color", "lightgray");
            
            $('.error-text').remove();
        },
        success: function(resp)
        {
            var data;
            var ok = true;
            resp = $.parseJSON(resp);

            for(var index in resp)
            {
                data = resp[index];
                if(data.state === "Incorrecto")
                {
                    ok = false;
                    $(data.box).css("border-color", "red");
                    $(data.errorBox).html("<h6 class=\"error-text\">"+data.error+"</h6>");
                }
                else
                {
                    $(data.box).css("border-color", "#00B276");
                }
            }

            if(ok)
            {
                $("#exito-comentario").html("<h5>El comentario se ha creado correctamente.</h5>");
                $('#text-comentar-foro').css("border-color", "green");
                $('#text-comentar-foro').val("");
            }
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en registro del foro.");
        },
        timeout: 4000
    });
}

setInterval(function(){
   $("#exito-comentario").empty();
},10000);

