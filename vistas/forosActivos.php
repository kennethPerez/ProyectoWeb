<div class="col-md-12">
    <h2>Foros activos</h2>
</div>
<div class="col-md-12 misForos">
    <div class="col-md-3 listaForos">
        <?php
            include '/var/www/proyectoWeb/trunk/php/cargarPublForos.php';
            $con = new conexion();
            $con->cargarForosActivos();
        ?>
    </div>
    <form id="form-comentario-foro" action="/php/agregarComentarioForoValidate.php" method="POST">
        <div class="col-md-9 foroActual">
            <label id="foro-activo-nombre"> </label>
            <label id="foro-activo-descripcion"> </label>
            <label id="foro-activo-idforo"> </label>
            <input type="text" id="foro-activo-identificador" name="foro-activo-identificador" style="display: none">
            <br>
            <div id="comments">
            </div>
            <label id="label-comentar-foro" style="display: none"> ¡Haz tu comentario en el foro! </label>
            <textarea id="text-comentar-foro" name="text-comentar-foro" style="display: none"> </textarea>
            <label id="error-comentario-foro"> </label>
            <br>
            <input type="button" class="button be-green white" id="btn-comentar-foro" onclick="agregarComentario()" style="display: none" value="Comentar">
            <label id="exito-comentario"> </label>
        </div>
    </form>
    
</div>


