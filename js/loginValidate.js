function loginDataValidate()
{
    var pet = $('#login-form').attr('action');
    var met = $('#login-form').attr('method');

    $.ajax({
        data: $('#login-form').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#box-user-login').css("border-color", "lightgray");
            $('#box-pass-login').css("border-color", "lightgray");            
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
                location.href = "/vistas/vistaPrincipal.php";
            }
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en Login. "+jqXHR+" "+estado+" "+error);
        },
        timeout: 4000
    });
}



