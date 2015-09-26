function faroValidate() {
    console.log("ENTRA AL AJAX");
    var pet = $('#box-forum').attr('action');
    var met = $('#box-forum').attr('method');

    $.ajax({
        data: $('#box-forum').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#box-name-forum').css("border-color", "lightgray");
            $('#box-description-forum').css("border-color", "lightgray");
            
            $('.error-text').remove();
        },
        success: function(resp)
        {
            console.log("SUCCESS");
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
                $("#success-forum").html("<h5>El foro se ha creado correctamente.</h5>");
                $('#box-name-forum').css("border-color", "lightgray");
                $('#box-description-forum').css("border-color", "lightgray");
                $('#box-name-forum').val("");
                $('#box-description-forum').val("");
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
   $("#success-forum").empty();
},10000);

