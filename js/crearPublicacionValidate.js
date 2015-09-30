function publicacionValidate() {
    var pet = $('#box-publicacion').attr('action');
    var met = $('#box-publicacion').attr('method');

    $.ajax({
        data: $('#box-publicacion').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#box-description-publication').css("border-color", "lightgray");
            $('#box-language-forum').css("border-color", "lightgray");
            $('#box-code-publication').css("border-color", "lightgray");
            
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
                $("#success-publication").html("<h5>Publicación creada correctamente.</h5>");                
                $('#box-description-publication').css("border-color", "lightgray");
                $('#box-language-forum').css("border-color", "lightgray");
                $('#box-code-publication').css("border-color", "lightgray");
                $('#box-description-publication').val("");
                $('#box-language-forum').val("");
                $('#box-code-publication').val("");
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
   $("#success-publication").empty();
},10000);




