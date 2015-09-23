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
    elemento.value = "Confirmar";
    elemento.setAttribute("onClick","confirmar()");

    setTimeout(function()
    {
        elemento.style.backgroundColor = "#2F763D";
        elemento.value = "Salir";
        elemento.setAttribute("onClick","salir(this)"); 
    }, 3000);
}

function ocultarTextArea()
{
    document.getElementById("txtCodigo").style.display = "none";
}

function mostrarTextArea()
{
    document.getElementById("txtCodigo").style.display = "block";
}