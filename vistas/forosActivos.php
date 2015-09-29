<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $nombreUsuario = "$rowUser[1] $rowUser[2]";
    
?> 

<div class="col-md-12">
    <h2>Foros activos</h2>
</div>
<div class="col-md-12 misForos">
    <div class="col-md-3 listaForos"></div>
    <form class="col-md-9" id="form-comentario-foro" action="/php/agregarComentarioForoValidate.php" method="POST">
        <div class="col-md-9 foroActual">
            <div class="col-md-12">
                <label id="foro-activo-nombre" class="label-size"></label>
                <label id="foro-activo-descripcion" class="label-size"></label>
                <input type="text" id="foro-activo-identificador" name="foro-activo-identificador" style="display: none">
                <br>
                <div id="comments"></div>
                <br>
                <label id="label-comentar-foro" style="display: none"> ¡Haz tu comentario en el foro! </label>
                <textarea id="text-comentar-foro" class="text-area" name="text-comentar-foro" style="display: none"> </textarea>
                <label id="error-comentario-foro"></label>
                <br>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <input type="button" class="button be-green white" id="btn-comentar-foro" style="display: none" onclick="agregarComentario('<?php echo $nombreUsuario; ?>')" value="Comentar">  
            </div>
            <div class="col-md-12">
                <h6 class="text-center text-success" id="success-comment"></h6>
            </div>
        </div>
    </form>
    
</div>
<?php
    }
    else
    {
        header("location: /index.php");
    }
?>

