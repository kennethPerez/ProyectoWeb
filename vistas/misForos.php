<div class="col-md-12">
    <h2>Mis publicaciones</h2>
</div>
<div class="col-md-12 misForos">
    <div class="col-md-4 listaForos">
        <?php
            include '/var/www/proyectoWeb/trunk/php/cargarPublForos.php';
            $con = new conexion();
            $con->cargarMisForos();
        ?>
    </div>
    
    <div class="col-md-8 foroActual">
        <label id="foro-actual"> </label>
    </div>
    
</div>
