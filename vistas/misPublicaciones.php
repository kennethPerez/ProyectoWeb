<div class="col-md-12">
    <h2>Mis publicaciones</h2>
</div>
<div class="col-md-12 misPublicaciones">
    <div class="col-md-6 col-md-offset-3">
        <label class="label-size text-center">No hay publicaciones</label>
        <?php
            include '/var/www/proyectoWeb/trunk/php/cargarPublForos.php';
            $con = new conexion();
            $con->cargarMisPublicaciones();
            
        ?>
    </div>
</div>