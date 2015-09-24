function foroValidate()
{
    var titulo = $("#box-name-forum").val();
    var descripcion = $("#box-description-forum").val();
    
    if(titulo === "" && descripcion === "")
    {
        alert("error");
    }
    else
    {
        location.href = "/php/crearForo.php?nombre="+titulo+"&descripcion="+descripcion+"";
        alert("si");
    }
    
}
