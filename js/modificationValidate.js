function dataProfileValidate()
{
    var pet = $('#form-profile').attr('action');
    var met = $('#form-profile').attr('method');

    $.ajax({
        data: $('#form-profile').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#box-name-profile').css("border-color", "lightgray");
            $('#box-email-profile').css("border-color", "lightgray");
            $('#box-last-name-profile').css("border-color", "lightgray");
            
            if($("#check-company").is(':checked')) {
                $("#box-company-profile").css("border-color", "lightgray");
            }         
            
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
                $('#Profile-Name').html($('#box-name-profile').val()+" "+$('#box-last-name-profile').val());
                $('#notification-user-profile').html("<h5>Modificado correctamente</h5>");
            }
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en la modificacion.");
        },
        timeout: 4000
    });
}

function dataPassValidate()
{
    var pet = $('#form-pass').attr('action');
    var met = $('#form-pass').attr('method');

    $.ajax({
        data: $('#form-pass').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#box-pass-profile').css("border-color", "lightgray");
            $('#box-new-pass-profile').css("border-color", "lightgray");    
            
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
                $('#box-pass-profile').css("border-color", "");
                $('#box-new-pass-profile').css("border-color", "");
                $('#box-pass-profile').val("");
                $('#box-new-pass-profile').val("");
                $('#notification-pass-profile').html("<h5>Modificado correctamente</h5>");
            }
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en la modificacion.");
        },
        timeout: 4000
    });
}

function dataAnswerValidate()
{
    var pet = $('#form-answer').attr('action');
    var met = $('#form-answer').attr('method');

    $.ajax({
        data: $('#form-answer').serialize(),
        url: pet,
        type: met,
        beforeSend: function() {
            $('#box-answer-profile').css("border-color", "lightgray");
            $('#box-new-answer-profile').css("border-color", "lightgray");
            
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
                $('#box-answer-profile').css("border-color", "");
                $('#box-new-answer-profile').css("border-color", "");
                $('#box-answer-profile').val("");
                $('#box-new-answer-profile').val("");
                $('#notification-answer-profile').html("<h5>Modificado correctamente</h5>");
            }
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en la modificacion.");
        },
        timeout: 4000
    });
}



setInterval(function(){
    $('#notification-user-profile').empty();
    $('#notification-pass-profile').empty();
    $('#notification-answer-profile').empty();    
},10000);