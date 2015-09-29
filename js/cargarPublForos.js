function mostrarDescripForo(des)
{
    document.getElementById("foro-actual").innerHTML = des;
}

function mostrarInfoForos(nombre,descripcion,idforo)
{
    document.getElementById("foro-activo-nombre").innerHTML = "Creador del foro:    " + nombre;
    document.getElementById("foro-activo-descripcion").innerHTML = "Descripción:    " + descripcion;
    document.getElementById("foro-activo-idforo").innerHTML = "Número de foro:     " + idforo;
    document.getElementById("foro-activo-identificador").value = idforo;
    document.getElementById("text-comentar-foro").style.display = "block";
    document.getElementById("label-comentar-foro").style.display = "block";
    document.getElementById("btn-comentar-foro").style.display = "block";
}

function saludar(x)
{
    var c = 0;
    var capa = document.getElementById("comments");
    while(c < x)
    {
        var h1 = document.createElement("h1");
        h1.innerHTML = "hola";
        capa.appendChild(h1);
        c++;
    }
}