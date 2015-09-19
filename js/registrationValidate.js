function dataValidate() {
    var pet = $('#box-registration form').attr('action');
    var met = $('#box-registration form').attr('method');

    $.ajax({
        data: $('#box-registration form').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#status').html('<img src="/img/spin.gif" width="35" height="35"/>');
            $('#box-name').css("border-color", "lightgray");
            $('#box-email').css("border-color", "lightgray");
            $('#box-user').css("border-color", "lightgray");
            $('#box-pass').css("border-color", "lightgray");
            $('#box-pass-confirm').css("border-color", "lightgray");
            $('#box-last-name').css("border-color", "lightgray");
            $('#box-admission-date').css("border-color", "lightgray");
            $('#box-security-answer').css("border-color", "lightgray");
            
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
                alert("REGISTRO CORRECTO");
            }
            $('#status').html('');
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en registro.");
        },
        timeout: 4000
    });
}