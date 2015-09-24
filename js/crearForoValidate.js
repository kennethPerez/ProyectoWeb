function faroValidate() {
    var pet = $('#box-forum').attr('action');
    var met = $('#box-forum').attr('method');

    $.ajax({
        data: $('#box-forum').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#status').html('<img src="/img/spin.gif" width="35" height="35"/>');
            $('#box-name-forum').css("border-color", "lightgray");
            $('#box-description-forum').css("border-color", "lightgray");
            
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
               var name = $("#box-name-forum").val();
               var description = $("#box-description-forum").val();
               
               location.href = "/php/insertForo.php?name="+name+"&description="+description;
            }
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en registro del foro.");
        },
        timeout: 4000
    });
}
