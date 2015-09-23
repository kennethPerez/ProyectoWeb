<div class="col-md-12">
    <h2>Mi perfil</h2>
</div>
<div class="col-md-12 miPerfil">
    <div class="col-md-3"> 
        <div class="col-md-12">
            <div class="col-md-12">
                <p><img src="/img/a.png" width="100%" height="100%"></p>
                <p><input type="file"></p>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="col-md-12">
            <div class="col-md-6">
                <p>
                    <label class="label-size">Nombre</label>
                    <input id="box-name" class="text-box" type="text" name="name-profile">
                    <h6 id="error-name"></h6>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Apellidos</label>
                    <input id="box-last-name" class="text-box" type="text" name="last-name-profile">
                    <h6 id="error-last-name"></h6>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <p>
                    <label class="label-size">Usuario</label>
                    <input id="box-user" class="text-box" type="text" name="user-profile">
                    <h6 id="error-pass"></h6>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Contraseña</label>
                    <input id="box-pass" class="text-box" type="password" name="pass-profile">
                    <h6 id="error-pass"></h6>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <p>
                    <label class="label-size">Fecha de ingreso al TEC</label>
                    <input id="box-admission-date" class="text-box" type="date" name="admission-date-profile">
                    <h6 id="error-admission-date"></h6>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <label class="label-size">Sexo</label><br>
                    <input type="radio" class="form-control-radio" name="sex-profile" value="Masculino" id="radio-sex">
                    <label class="form-control-radio">Masculino</label>
                    <input type="radio" class="form-control-radio" name="sex-profile" value="Femenino" id="radio-sex">
                    <label class="form-control-radio">Femenino</label>
                    <h6 id="error-sex"></h6>
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
                    <input id="box-security-answer" class="text-box" type="text" name="security-answer-profile">
                    <h6 id="error-security-answer"></h6>
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