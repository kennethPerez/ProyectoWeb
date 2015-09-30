function createXMLHttpRequest()
{
    var xmlHttp=null;
    if (window.ActiveXObject) xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else if (window.XMLHttpRequest)
                 xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}
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

/********************************************************************/

function mostrarForoBuscado(id)
{
    $.ajax({
        url: '/php/cargarForoBuscado.php',
        type: 'POST',
        data: {id_foro:id},
        success:function(data)
        {
            data = $.parseJSON(data);
            $('#cuerpo').empty();         
            
            var div = document.createElement('div');
            div.setAttribute("class","col-md-12 padding-top-bottom");
            
            var divTitulo = document.createElement('div');
            divTitulo.setAttribute("class","col-md-11");
            
            var divImagen = document.createElement('div');
            divImagen.setAttribute("class","col-md-1");
            
            var img = document.createElement('img');
            img.setAttribute("src","/img/forum");
            img.setAttribute("style","width:70px; height:70px");
            
            var h1 = document.createElement('h1');
            h1.appendChild(document.createTextNode(data[0].titulo));
            
            var divC = document.createElement('div');
            divC.setAttribute("class","col-md-12 misAmigos");
            
            var divContenido = document.createElement('div');
            divContenido.setAttribute("class","col-md-6 col-md-offset-3");
            divContenido.setAttribute("id","comentarios-foroBuscado");
            
            divTitulo.appendChild(h1);
            divImagen.appendChild(img);
            
            div.appendChild(divImagen);
            div.appendChild(divTitulo); 
            divC.appendChild(divContenido);
            
            var labelCreador = document.createElement('label');
            labelCreador.appendChild(document.createTextNode("Creador: "+data[0].creador));
            labelCreador.setAttribute("class","label-size");
            
            var labelDesc = document.createElement('label');
            labelDesc.appendChild(document.createTextNode("Descripcion del foro: "+data[0].desc));
            labelDesc.setAttribute("class","label-size");
            
            div.appendChild(divC);
            divContenido.appendChild(labelCreador);
            divContenido.appendChild(labelDesc);
            
            
            var label = document.createElement("label");
            label.setAttribute("class", "label-size");
            label.appendChild(document.createTextNode("Comentarios"));
            divContenido.appendChild(label);
                     
            for(var i=0; i<data[1].length; i++) 
            {
                var li = document.createElement("li"); 
                li.appendChild(document.createTextNode(data[1][i].comentario+" - "+data[1][i].nombre));

                divContenido.appendChild(li);
            }
            
            var form = document.createElement('form');
            form.setAttribute("class","col-md-9 col-md-offset-3");
            form.setAttribute("id","form-comentario-foroBuscado");
            
            var divform = document.createElement('div');
            divform.setAttribute("class","col-md-9 foroActual");
            
            var textarea = document.createElement('textarea');
            textarea.setAttribute("id","comentar-foroBuscado");
            textarea.setAttribute("class","text-area");
            textarea.setAttribute("name","comentario-foroBuscado");
            
            var labelerror = document.createElement('label');
            labelerror.setAttribute("id","error-comentario-foroBuscado");
            
            var br = document.createElement('br');
            
            var div_input = document.createElement('div');
            div_input.setAttribute("class", "col-md-4 col-md-offset-4");
            var inputButton = document.createElement('input');
            inputButton.setAttribute("type","button");
            inputButton.setAttribute("class","button be-green white");
            inputButton.setAttribute("id","btn-comentar-foroBuscado");
            inputButton.setAttribute("onclick","insertComment("+id+")");
            inputButton.setAttribute("value", "Comentar");
            
            var h6 = document.createElement('label');
            h6.setAttribute("class","text-center text-success");
            h6.setAttribute("id","success-comment");
            
            divform.appendChild(textarea);
            divform.appendChild(labelerror);
            divform.appendChild(br);
            div_input.appendChild(inputButton);
            divform.appendChild(div_input);
            divform.appendChild(h6);
            
            form.appendChild(divform);
            div.appendChild(form);
            
            
            $('#cuerpo').append(div);
        }
        });
}

/********************************************************************/
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
            
            $('#cuerpo').empty();
            
            var div = document.createElement('div');
            div.setAttribute("class","col-md-12 padding-top-bottom");
            
            var divTitulo = document.createElement('div');
            divTitulo.setAttribute("class","col-md-11");
            
            var divImagen = document.createElement('div');
            divImagen.setAttribute("class","col-md-1");
            
            var img = document.createElement('img');
            img.setAttribute("src","http://localhost/usuariosGitBook/"+data[1].foto);
            img.setAttribute("style","width:70px; height:70px");
            
            var h1 = document.createElement('h1');
            h1.appendChild(document.createTextNode(item));
            
            var divC = document.createElement('div');
            divC.setAttribute("class","col-md-12 misAmigos");
            divC.setAttribute("style","height:400px; overflow:auto;");
            
            divTitulo.appendChild(h1);
            divImagen.appendChild(img);
            
            div.appendChild(divImagen);
            div.appendChild(divTitulo);                         

            if(data[0].estado === "Amigo")
            {
                var i = 3;
                
                var h2 = document.createElement("h2");
                h2.appendChild(document.createTextNode("Publicaciones"));
                
                divC.appendChild(h2);
                divC.appendChild(document.createElement("br"));
                divC.appendChild(document.createElement("br"));

                while(i < data.length)
                {
                    var pos = data[i];
                    
                    var div_pub = document.createElement("div");
                    var h41 = document.createElement("h4");
                    var h42 = document.createElement("h4");
                    var h43 = document.createElement("h4");
                    var h61 = document.createElement("h6");
                    var h62 = document.createElement("h6");
                    var h63 = document.createElement("h6");
                    h63.setAttribute("class","text-area");
                    h63.setAttribute("readonly","");
                    h63.setAttribute("style","font-size: 0.9em");
                    var hr = document.createElement("hr");

                    h41.appendChild(document.createTextNode("Descripción"));
                    h42.appendChild(document.createTextNode("Lenguaje"));
                    h43.appendChild(document.createTextNode("Código"));
                    h61.appendChild(document.createTextNode(pos.descripcion));
                    h62.appendChild(document.createTextNode(pos.lenguaje));
                    h63.appendChild(document.createTextNode(pos.codigo));


                    h41.setAttribute("class","green lato");
                    h42.setAttribute("class","green lato");
                    h43.setAttribute("class","green lato");


                    div_pub.appendChild(h41);
                    div_pub.appendChild(h61);
                    div_pub.appendChild(h42);
                    div_pub.appendChild(h62);
                    div_pub.appendChild(h43);
                    div_pub.appendChild(h63);
                    div_pub.appendChild(hr);                    
                    divC.appendChild(div_pub);

                    i = i+1;
                }
                if(i === 3)
                {
                    var div_noPub = document.createElement("div");
                    div_noPub.setAttribute("class", "col-md-4 col-md-offset-4 text-center");
                    var h3 = document.createElement("h3");
                    h3.setAttribute("class", "label-size");
                    h3.appendChild(document.createTextNode("Su amigo no tiene publicaciones."));
                    div_noPub.appendChild(h3);
                    
                    divC.appendChild(div_noPub);
                    div.appendChild(divC);

                    $("#cuerpo").append(div);
                }
                else
                {   
                    div.appendChild(divC);
                    $("#cuerpo").append(div);
                }
            }
            else
            {
                pos = data[1];
                var div_info = document.createElement("div");
                div_info.setAttribute("class", "col-md-12");
                
                var label_ingreso = document.createElement("p");
                label_ingreso.setAttribute("class", "label-size");
                label_ingreso.appendChild(document.createTextNode("Año de ingreso: " + data[3].ingreso));
                
                var label_sexo = document.createElement("p");
                label_sexo.setAttribute("class", "label-size");
                label_sexo.appendChild(document.createTextNode("Sexo: "+data[4].sexo));
                
                var div_boton = document.createElement("div");
                div_boton.setAttribute("class", "row col-md-5");
                
                var boton = document.createElement("button");
                boton.setAttribute("onclick","seguirPersona(\""+data[1].foto+"\")");
                boton.setAttribute("class","button be-green white");
                boton.appendChild(document.createTextNode("Seguir a "+item));
                
                div_info.appendChild(label_ingreso);
                div_info.appendChild(label_sexo);
                div_boton.appendChild(boton);
                div_info.appendChild(div_boton);
                
                divC.appendChild(div_info);
                div.appendChild(divC);
            }
            
            $("#cuerpo").append(div);
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
        mostrarForoBuscado(id);
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
                
                $('#cuerpo').empty();         
            
                var div = document.createElement('div');
                div.setAttribute("class","col-md-12 padding-top-bottom");

                var divTitulo = document.createElement('div');
                divTitulo.setAttribute("class","col-md-11");

                var divImagen = document.createElement('div');
                divImagen.setAttribute("class","col-md-1");

                var img = document.createElement('img');
                img.setAttribute("src","/img/company");
                img.setAttribute("style","width:70px; height:70px");

                var h1 = document.createElement('h1');
                h1.appendChild(document.createTextNode(item));
                
                divTitulo.appendChild(h1);
                divImagen.appendChild(img);
                
                var divC = document.createElement('div');
                divC.setAttribute("class","col-md-12 misAmigos");
                
                div.appendChild(divImagen);
                div.appendChild(divTitulo);                                                           
                
                if(data !== null)
                {                
                    for(var index in data)
                    {
                        var info = data[index];

                        var divp = document.createElement("div");
                        divp.setAttribute("class","col-md-12");

                        var h4 = document.createElement("h4");
                        var img = document.createElement("img");
                        var hr = document.createElement("hr");

                        h4.appendChild(document.createTextNode(info.nombre));
                        img.setAttribute("style","width:80px; height: 80px");
                        img.setAttribute("src","http://localhost/usuariosGitBook/"+info.foto);
                        img.setAttribute("onclick","cargarPersona(\""+info.nombre+"\","+info.id+")");

                        divp.appendChild(h4);
                        divp.appendChild(img);
                        divp.appendChild(hr);

                        divC.appendChild(divp);
                    }

                    div.appendChild(divC);                 
                }
                else
                {
                    var div_nothing = document.createElement("div");
                    div_nothing.setAttribute("class", "col-md-4 col-md-offset-4 text-center");
                    var h3 = document.createElement("h3");
                    h3.setAttribute("class", "label-size");
                    h3.appendChild(document.createTextNode("No existen usuarios asosiados."));
                    div_nothing.appendChild(h3);
                    console.log(div_nothing);
                    
                    divC.appendChild(div_nothing);
                    div.appendChild(divC);
                }
                
                $("#cuerpo").append(div);
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
               
                $('#cuerpo').empty();         
            
                var div = document.createElement('div');
                div.setAttribute("class","col-md-12 padding-top-bottom");

                var divTitulo = document.createElement('div');
                divTitulo.setAttribute("class","col-md-11");

                var divImagen = document.createElement('div');
                divImagen.setAttribute("class","col-md-1");

                var img = document.createElement('img');
                img.setAttribute("src","/img/generation");
                img.setAttribute("style","width:70px; height:70px");

                var h1 = document.createElement('h1');
                h1.appendChild(document.createTextNode("Generacion "+item));
                
                divTitulo.appendChild(h1);
                divImagen.appendChild(img);
                
                var divC = document.createElement('div');
                divC.setAttribute("class","col-md-12 misAmigos");
                
                div.appendChild(divImagen);
                div.appendChild(divTitulo);                                                           
                                
                for(var index in data)
                {
                    var info = data[index];

                    var divp = document.createElement("div");
                    divp.setAttribute("class","col-md-12");
                    
                    var h4 = document.createElement("h4");
                    var img = document.createElement("img");
                    var hr = document.createElement("hr");

                    h4.appendChild(document.createTextNode(info.nombre));
                    img.setAttribute("style","width:80px; height: 80px");
                    img.setAttribute("src","http://localhost/usuariosGitBook/"+info.foto);
                    img.setAttribute("onclick","cargarPersona(\""+info.nombre+"\","+info.id+")");

                    divp.appendChild(h4);
                    divp.appendChild(img);
                    divp.appendChild(hr);
                    
                    divC.appendChild(divp);
                }
                
                div.appendChild(divC);                 
                $("#cuerpo").append(div); 
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
