function carga(url,id)
{
    var pagecnx = createXMLHttpRequest();
    pagecnx.onreadystatechange=function()
    {
        if (pagecnx.readyState === 4 &&
           (pagecnx.status===200 || window.location.href.indexOf("http")===-1))
               document.getElementById(id).innerHTML=pagecnx.responseText;
    };
    pagecnx.open('GET',url,true);
    pagecnx.send(null);
}

function createXMLHttpRequest()
{
    var xmlHttp=null;
    if (window.ActiveXObject) xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else if (window.XMLHttpRequest)
                 xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}

function confirmar()
{
    location.href = "/index.php";
}

function salir(elemento)
{
    elemento.style.color = "#E74C3C";
    document.getElementById("button-logout").innerHTML = "Confirmar";
    elemento.setAttribute("onClick","confirmar()");

    setTimeout(function()
    {
        elemento.style.color = "#ECF0F1";
        document.getElementById("button-logout").innerHTML = "Salir";
        elemento.setAttribute("onClick","salir(this)"); 
    }, 3000);
}

function ocultarTextArea()
{
    document.getElementById("label-code").style.display = "none";
    document.getElementById("box-code-publication").style.display = "none";
}

function mostrarTextArea()
{
    document.getElementById("label-code").style.display = "block";
    document.getElementById("box-code-publication").style.display = "block";
}


function getFile()
{
   document.getElementById("upfile").click();
}

function subirImagen()
{       
    document.getElementById("form-image").submit();
}

function enableDisableCompany()
{
    if($("#check-company").is(':checked')) {
        $("#box-company-profile").css("cursor","text");
        $("#box-company-profile").prop('readonly', false);
    }
    else
    {
        $("#box-company-profile").css("cursor","no-drop");
        $("#box-company-profile").prop('readonly', true);
        $("#box-company-profile").val("");
    }
}

function seguirPersona(user)
{
    $.ajax({
        url: '/php/seguirPersona.php',
        type: 'POST',
        data: {usuario:user},
        success:function(data)
        {
            data = $.parseJSON(data);
            cargarPersona(data[0].nombre,data[1].id);
        }
    });
}

/********************************************************************/
function cargarPersona(item, id)
{
    $.ajax({
        url: '/php/personaBuscada.php',
        type: 'POST',
        data: {idPersona:id},
        success:function(data)
        {
            data = $.parseJSON(data);
            
            $('#cuerpo').html("");

            var div = document.createElement("div");
            div.setAttribute("class", "col-md-12");
            var h3 = document.createElement("h2");
            h3.setAttribute("class", "lato");
            h3.appendChild(document.createTextNode(item +"  -> "+data[2].correo));

            var img = document.createElement('img');
            img.setAttribute("style","width:80px; height: 80px");
            img.setAttribute("src","http://localhost/usuariosGitBook/"+data[1].foto);
            var hr = document.createElement("hr");

            div.appendChild(img);
            div.appendChild(h3);

            $("#cuerpo").append(div);                             

            if(data[0].estado === "Amigo")
            {
                var i = 3;

                while(i < data.length)
                {
                    var pos = data[i];

                    var div = document.createElement("div");
                    var h4 = document.createElement("h4");
                    var h6 = document.createElement("h6");
                    var br = document.createElement("br");
                    var hr = document.createElement("hr");


                    h4.appendChild(document.createTextNode(pos.descripcion));
                    h6.appendChild(document.createTextNode(pos.codigo));

                    div.appendChild(h4);
                    $("#cuerpo").append(div);
                    $("#cuerpo").append(h6);
                    $("#cuerpo").append(br);
                    $("#cuerpo").append(hr);

                    i = i+1;
                }
                if(i === 3)
                {
                    var div = document.createElement("div");
                    div.setAttribute("class", "col-md-4 col-md-offset-4 text-center");
                    var h3 = document.createElement("h3");
                    h3.setAttribute("class", "label-size");
                    h3.appendChild(document.createTextNode("Su amigo no tiene publicaciones."));
                    div.appendChild(h3);

                    $("#cuerpo").append(div);
                }
            }
            else
            {
                pos = data[1];
                var h4 = document.createElement("h4");
                h4.appendChild(document.createTextNode(data[3].ingreso+" "+data[4].sexo));
                
                var boton = document.createElement("button");
                boton.setAttribute("onclick","seguirPersona(\""+data[1].foto+"\")");
                boton.appendChild(document.createTextNode("Seguir a "+item));
                
                $("#cuerpo").append(h4);
                $("#cuerpo").append(boton);
            }
}
});
}


/******************************/
function autocomplet_lenguaje() 
{
    var keyword = $('#box-language-forum').val();
    if (keyword !== "") 
    {
        $.ajax({
            url: '/php/autocomplete_Lenguaje.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data)
            {
                $('#element_list_id_lenguaje').show();
                $('#element_list_id_lenguaje').html(data);
            }
            });
    } 
    else 
    {
        $('#element_list_id_lenguaje').html("");
    }
}

function set_item_lenguaje(item) 
{
    $('#box-language-forum').val(item);
    $('#element_list_id_lenguaje').html("");
}


/******************************/
function autocomplet_company() 
{
    var keyword = $('#box-company-profile').val();
    if (keyword !== "") 
    {
        $.ajax({
            url: '/php/autocomplete_Company.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data)
            {
                $('#element_list_id_company').show();
                $('#element_list_id_company').html(data);
            }
            });
    } 
    else 
    {
        $('#element_list_id_company').html("");
    }
}

function set_item_company(item) 
{
    $('#box-company-profile').val(item);
    $('#element_list_id_company').html("");
}


/******************************/
function autocomplet_search() 
{
    var keyword = $('#search-box').val();
    if (keyword !== "") 
    {
        $.ajax({
            url: '/php/autocomplete_Search.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data)
            {
                $('#element_list_id_search').show();
                $('#element_list_id_search').html(data);
            }
            });
    } 
    else 
    {
        $('#element_list_id_search').html("");
    }
}

function set_item_search(item, type, id) 
{
    $('#search-box').val(item);
    $('#element_list_id_search').html("");
    
    if(type === "Persona")
    {
        cargarPersona(item,id);
    }  
    
    else if(type === "Foro")
    {
        alert("foro id"+id);
    }
    
    else if(type === "Empresa")
    {
        $.ajax({
           url: '/php/listaEmpleadosEmpresa.php',
           type: 'POST',
           data: {idEmpresa:id},
           success:function(data)
           {
                data = $.parseJSON(data);
               
                $('#cuerpo').html("");
                
                var div = document.createElement("div");
                div.setAttribute("class", "col-md-12");
                
                var img = document.createElement('img');
                div.setAttribute("class", "col-md-4");
                img.setAttribute("style","width:80px; height: 80px");
                img.setAttribute("src","/img/company");
                
                var h3 = document.createElement("h3");
                h3.setAttribute("class", "lato col-md-8");
                h3.appendChild(document.createTextNode(item));
                
                
                var hr = document.createElement("hr");
                
                div.appendChild(img);
                div.appendChild(h3);
                div.appendChild(hr);

                $("#cuerpo").append(div);                             
               
               if(data !== null)
               {
                for(var index in data)
                 {
                     var info = data[index];

                     var div = document.createElement("div");
                     var h4 = document.createElement("h4");
                     var img = document.createElement("img");
                     var br = document.createElement("br");
                     var hr = document.createElement("hr");


                     h4.appendChild(document.createTextNode(info.nombre));
                     img.setAttribute("style","width:80px; height: 80px");
                     img.setAttribute("src","http://localhost/usuariosGitBook/"+info.foto);
                     img.setAttribute("onclick","cargarPersona(\""+info.nombre+"\","+info.id+")");

                     div.appendChild(h4);
                     $("#cuerpo").append(br);
                     $("#cuerpo").append(div);
                     $("#cuerpo").append(img);
                     $("#cuerpo").append(hr);
                 }
                }
                else
                {
                    var div = document.createElement("div");
                    div.setAttribute("class", "col-md-4 col-md-offset-4 text-center");
                    var h3 = document.createElement("h3");
                    h3.setAttribute("class", "label-size");
                    h3.appendChild(document.createTextNode("No existen usuarios asosiados."));
                    div.appendChild(h3);

                    $("#cuerpo").append(div);
                }
           }
           });
    }
    else
    {
        $.ajax({
           url: '/php/listaGeneracion.php',
           type: 'POST',
           data: {generacion:item},
           success:function(data)
           {
                data = $.parseJSON(data);
               
                $('#cuerpo').html("");
                
                var div = document.createElement("div");
                div.setAttribute("class", "col-md-12");
                var h3 = document.createElement("h2");
                h3.setAttribute("class", "lato");
                h3.appendChild(document.createTextNode("Generacion "+item));
                
                var img = document.createElement('img');
                img.setAttribute("style","width:80px; height: 80px");
                img.setAttribute("src","/img/generation");
                var hr = document.createElement("hr");
                
                div.appendChild(img);
                div.appendChild(h3);

                $("#cuerpo").append(div);                             
                                
                for(var index in data)
                {
                    var info = data[index];

                    var div = document.createElement("div");
                    var h4 = document.createElement("h4");
                    var img = document.createElement("img");
                    var br = document.createElement("br");
                    var hr = document.createElement("hr");


                    h4.appendChild(document.createTextNode(info.nombre));
                    img.setAttribute("style","width:80px; height: 80px");
                    img.setAttribute("src","http://localhost/usuariosGitBook/"+info.foto);
                    img.setAttribute("onclick","cargarPersona(\""+info.nombre+"\","+info.id+")");

                    div.appendChild(h4);
                    $("#cuerpo").append(div);
                    $("#cuerpo").append(img);
                    $("#cuerpo").append(br);
                    $("#cuerpo").append(hr);

                }
           }
           });
    }
}


$(document).on("keydown", function (e) {
    if($("#search-friends").is(":focus") && (e.keyCode === 27)) {
        $("#search-friends").val("");
    }
    else if($("#search-box").is(":focus") && (e.keyCode === 27)) {
        $("#search-box").val("");
    }
});
