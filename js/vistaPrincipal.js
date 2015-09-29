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
        alert("Persona id: "+id);
    }   
    else if(type === "Foro")
    {
        alert("Foro id: "+id);
    }
    else if(type === "Empresa")
    {
        alert("Empresa id: "+id);
    }
    else
    {
        alert("Generacion: "+item);
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
