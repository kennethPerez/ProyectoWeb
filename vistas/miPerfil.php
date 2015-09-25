<?php
    session_start();
    if (isset( $_SESSION["rowUser"]))
    {
        $rowUser = $_SESSION["rowUser"];
        $nombreUsuario = "$rowUser[1] $rowUser[2]";
        
        $imageName = md5($rowUser[4]);
        $routeImage = "http://localhost/usuariosGitBook/$imageName";
        
        $company = "";
        if (isset($_SESSION["rowCompany"]))
        {
            $company = $_SESSION["rowCompany"][1];
        }
?>   
<div class="col-md-12">
    <h2 class="lato">Mi perfil</h2>
</div>
<div class="col-md-12 miPerfil">
    <div class="col-md-12 box-buttons-profile">
        <div class="col-md-1 col-md-offset-11">
            <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" style="font-family: 'Lato', sans-serif;" type="button" data-toggle="dropdown">Cambiar  
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#change-pass">Contraseña</a></li>
                    <li><a href="#change-answer">Pregunta</a></li>
                </ul>
            </div>
        </div>
    </div>  
    
    
    
    <div class="box-profile">
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
        <form id="form-profile" action="/php/updateUser.php" method="POST">
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
                            <input value="<?php echo $rowUser[4];?>"id="box-user-profile" class="text-box not-editable" type="text" name="user-profile" readonly>
                            <h6 id="error-user-profile"></h6>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="label-size">Empresa</label>
                        <div class="row col-md-11">
                            <input value="<?php echo $company; ?>" id="box-company-profile" onkeyup="autocomplet()" class="text-box not-editable" type="text" name="company-profile" readonly>
                            <div class="list_container row col-md-12">        
                                <ul id="element_list_id"></ul>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <input name="check-company" value="Egresado" type="checkbox" id="check-company" onclick="enableDisableCompany()">
                        </div>
                        <h6 id="error-company-profile"></h6>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p>
                            <label class="label-size">Fecha de ingreso al TEC</label>
                            <input value="<?php echo $rowUser[6];?>" id="box-admission-date-profile" class="text-box not-editable" type="text" name="admission-date-profile" readonly>
                            <h6 id="error-admission-date-profile"></h6>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p> 
                            <label class="label-size">Pregunta de seguridad</label>
                            <input value="<?php echo $rowUser[8];?>" class="text-box not-editable" name="security-question-profile" id="select-question" readonly>
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p>
                            <label class="label-size">Email</label>
                            <input value="<?php echo $rowUser[3];?>" id="box-email-profile" class="text-box" type="text" name="email-profile">
                            <h6 id="error-email-profile"></h6>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-md-offset-3">
                <div class="col-md-4 col-md-offset-4">
                    <input class="button be-green white" value="Modificar" type="button" onclick="dataProfileValidate();">
                    <h6 id="notification-user-profile" class="text-center text-success"></h6>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="change-pass" class="modal-mask">
    <div class="modal-box move-down">
        <a href="#close" title="Close" class="close">X</a>
        <div class="box-change-pass">
            <div style="border-bottom: 1px solid black">
                <label class="label-size">Cambiar contraseña</label>
            </div>
            <br>
            <form id="form-pass" action="/php/updatePass.php" method="POST">
                <div class="col-md-12">
                    <label class="label-size">Escriba su contraseña actual</label>
                    <input id="box-pass-profile" class="text-box" type="password" name="pass-profile">
                    <h6 id="error-pass-profile"></h6>
                </div>
                <div class="col-md-12">
                    <label class="label-size">Escriba su nueva contraseña</label>
                    <input id="box-new-pass-profile" class="text-box" type="password" name="new-pass-profile">
                    <h6 id="error-new-pass-profile"></h6>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                        <input class="button be-green white" value="Cambiar" type="button" onclick="dataPassValidate();">
                        <h6 id="notification-pass-profile" class="text-center text-success"></h6>
                    </div>
                </div>
             </form>
        </div>
    </div>
</div>

<div id="change-answer" class="modal-mask">
    <div class="modal-box move-down">
        <a href="#close" title="Close" class="close">X</a>
        <div class="box-change-pass">
            <div style="border-bottom: 1px solid black">
                <label class="label-size">Cambiar respuesta de seguridad</label>
            </div>
            <br>
            <form id="form-answer" action="/php/updateAnswer.php" method="POST">
                <div class="col-md-12">
                    <label class="label-size">Escriba su respuesta actual</label>
                    <input id="box-answer-profile" class="text-box" type="text" name="answer-profile">
                    <h6 id="error-answer-profile"></h6>
                </div>
                <div class="col-md-12">
                    <label class="label-size">Escriba su nueva respuesta</label>
                    <input id="box-new-answer-profile" class="text-box" type="text" name="new-answer-profile">
                    <h6 id="error-new-answer-profile"></h6>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                        <input class="button be-green white" value="Cambiar" type="button" onclick="dataAnswerValidate();">
                        <h6 id="notification-answer-profile" class="text-center text-success"></h6>
                    </div>
                </div>
             </form>
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