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
    elemento.style.backgroundColor = "#E74C3C";
    document.getElementById("button-logout").innerHTML = "Confirmar";
    elemento.setAttribute("onClick","confirmar()");

    setTimeout(function()
    {
        elemento.style.backgroundColor = "#2F2F2F";
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
function autocomplet() 
{
    var min_length = 0;
    var keyword = $('#box-company-profile').val();
    if (keyword.length >= min_length) 
    {
        $.ajax({
            url: '/php/ajax_refresh.php',
                    type: 'POST',
                    data: {keyword:keyword},
                    success:function(data){
                        $('#element_list_id').show();
                        $('#element_list_id').html(data);
                    }
            });
    } else {
            $('#element_list_id').hide();
    }
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#box-company-profile').val(item);
	// hide proposition list
	$('#element_list_id').hide();
}