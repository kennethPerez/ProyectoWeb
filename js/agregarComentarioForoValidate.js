function agregarComentario(nombre) {
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
                $("#success-comment").html("<h5>El comentario se ha creado correctamente.</h5>");
                $('#text-comentar-foro').css("border-color", "green");
                
                var li = document.createElement("li"); 
                li.appendChild(document.createTextNode($('#text-comentar-foro').val()+" - "+nombre));
                $("#comments").append(li);
                
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

function insertComment(idForo)
{
    $.ajax({
        data: $('#form-comentario-foro').serialize(),
        url: "/php/agregarComentarioForoValidate.php?text-comentar-foro="+$("#comentar-foroBuscado").val()+"&foro-activo-identificador="+idForo,
        type: "GET",
        beforeSend: function() {
            $('#comentar-foroBuscado').css("border-color", "lightgray");
            $('#error-comentario-foroBuscado').remove();
        },
        success: function(resp)
        {          
            resp = $.parseJSON(resp);
            
            $("#success-comment").html("<h5>El comentario se ha creado correctamente.</h5>");
            $('#comentar-foroBuscado').css("border-color", "green");

            var li = document.createElement("li"); 
            li.appendChild(document.createTextNode($('#comentar-foroBuscado').val()+" - "+resp[0].nombre));
            $("#comentarios-foroBuscado").append(li);

            $('#comentar-foroBuscado').val("");
        },
        error: function(jqXHR, estado, error) 
        {
            console.log("Error en registro del foro.");
        },
        timeout: 4000
    });
}