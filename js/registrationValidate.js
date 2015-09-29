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
            
            $('.error-register').remove();
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
                    $(data.errorBox).html("<h6 class=\"error-text error-register\">"+data.error+"</h6>");
                }
                else
                {
                    $(data.box).css("border-color", "#00B276");
                }
            }

            if(ok)
            {
               var name = $("#box-name").val();
               var last_name = $("#box-last-name").val();
               var email = $("#box-email").val();
               
               var admission_date = $("#box-admission-date").val();
               
               var user = $("#box-user").val();
               var pass = CryptoJS.MD5($("#box-pass").val()); 
               
               var security_answer = CryptoJS.MD5($("#box-security-answer").val());   
               
               var security_question = $("#select-question").val();
               var sex = $("#radio-sex").val();
               
               location.href = "/php/registrationNewUser.php?name="+name+"&last_name="+last_name+"&email="+email+"&admission_date="+admission_date+"&user="+user+"&pass="+pass+"&security_answer="+security_answer+"&security_question="+security_question+"&sex="+sex;
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