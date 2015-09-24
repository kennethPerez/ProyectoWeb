<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $nombreUsuario = "$rowUser[1] $rowUser[2]";
        
        $imageName = md5($rowUser[4]);
        $routeImage = "http://localhost/usuariosGitBook/$imageName";
?>   

<div class="col-md-12">
    <h2>Mi perfil</h2>
</div>
<div class="col-md-12 miPerfil">
    <div class="col-md-3"> 
        <div class="col-md-12">
            <div class="col-md-12">
                <p><img id="imagen" src="<?php echo $routeImage;?>" accept="image/jpeg, image/png" width="100%" height="100%"></p>
                
                <form id="form-image"method="post" action="/php/subirImagen.php" enctype="multipart/form-data">
                    <div id="input" class="button be-green white lato" onclick="getFile()">Seleccione una foto</div>
                    <div id="inputfile" style="height: 0px; width: 0px; overflow:hidden;">
                        <input name='imagen' id="upfile" type="file" value="upload" onchange="subirImagen();"/>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="col-md-12">
            <div class="col-md-6">
                <p>
                    <label class="label-size">Nombre</label>
                    <input value="<?php echo $rowUser[1];?>" id="box-name-profile" class="text-box" type="text" name="name-profile">
                    <h6 id="error-name-profile"></h6>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Apellidos</label>
                    <input value="<?php echo $rowUser[2];?>" id="box-last-name-profile" class="text-box" type="text" name="last-name-profile">
                    <h6 id="error-last-name-profile"></h6>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <p>
                    <label class="label-size">Usuario</label>
                    <input value="<?php echo $rowUser[4];?>"id="box-user-profile" class="text-box" type="text" name="user-profile">
                    <h6 id="error-user-profile"></h6>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Contraseña</label>
                    <input id="box-pass-profile" class="text-box" type="password" name="pass-profile">
                    <h6 id="error-pass-profile"></h6>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <p>
                    <label class="label-size">Fecha de ingreso al TEC</label>
                    <input value="<?php echo $rowUser[6];?>" id="box-admission-date-profile" class="text-box" type="date" name="admission-date-profile">
                    <h6 id="error-admission-date-profile"></h6>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Empresa</label>
                    <input id="box-company-profile" class="text-box" type="text" name="company-profile">
                    <h6 id="error-company-profile"></h6>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <p> 
                    <label class="label-size">Pregunta de seguridad</label>
                    <select class="combo-box" size="1" name="security-question-profile" id="select-question">
                        <option>¿Mi primera mascota?</option>
                        <option>¿Lugar de nacimiento de mi madre?</option>
                        <option>¿Profesora de primaria?</option>
                        <option>¿Canción favorita?</option>
                        <option>¿Marca de ropa favorita?</option>
                    </select>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Respuesta de seguridad</label>
                    <input id="box-security-answer-profile" class="text-box" type="text" name="security-answer-profile">
                    <h6 id="error-security-answer-profile"></h6>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-md-offset-3">
        <div class="col-md-4 col-md-offset-4">
            <input type="submit" class="button be-green white" value="Modificar">
        </div>
    </div>
</div>
<?php
    }
    else
    {
        header("location: /index.php");
    }
?>