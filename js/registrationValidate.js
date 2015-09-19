function dataValidate() {
    var pet = $('#box-registration form').attr('action');
    var met = $('#box-registration form').attr('method');

    $.ajax({
        data: $('#box-registration form').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#status').html('<img src="img/spin.gif" width="30" height="30"/>');
            $('#box-name').css("border-color", "black");
            $('#box-email').css("border-color", "black");
            $('#box-user').css("border-color", "black");
            $('#box-pass').css("border-color", "black");
            $('#box-pass-confirm').css("border-color", "black");
            $('#box-last-name').css("border-color", "black");
            $('#box-admission-date').css("border-color", "black");
            $('#box-security-answer').css("border-color", "black");
        },
        success: function(resp)
        {
            var data;
            var ok = true;
            resp = $.parseJSON(resp);

            for(var index in resp)
            {
                    data = resp[index];

                    if(data.Estado == "Incorrecto")
                    {
                            ok = false;
                            $(data.Campo).css("border-color", "red");
                            $(data.Div).html("<h6 class=\"error-text\">"+data.Error+"</h6>");
                    }
            }

            if(ok)
            {
                    $('#status').html('<img src="http://localhost/AJAX/img/ok.png" width="30" height="30"/>');
                    validacionCorrecta();
            }
            else
            {
                    $('#status').html('<img src="http://localhost/AJAX/img/x.png" width="30" height="30"/>');
            }
        },
        error: function(jqXHR, estado, error) 
        {
                $('#status').html('<img src="http://localhost/AJAX/img/x.png" width="30" height="30"/>');
        },
        timeout: 4000
    });
}