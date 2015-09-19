<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Página web</title>
        <link rel="stylesheet" type="text/css" href="css/flexboxgrid.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/sliderman.1.3.8.js"></script>
        <script type="text/javascript" src="js/registrationValidate.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sliderman.css" />
    </head>
    <body>
        <div class="ancho-encabezado be-green col-md-12">
            <div class="col-md-7">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <br>
                    <h1 class="pacific tamano-titulo">GitBook</h1>
                    <br>
                </div>
            </div>
            <br>
            <div class="col-md-5">
                <div class="col-md-4 col-md-offset-1">
                    <p>
                        <label class="label-size">Usuario</label>
                        <input class="text-box" type="text" name="login-user">
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        <label class="label-size">Contraseña</label>
                        <input class="text-box" type="password" name="login-pass">
                    </p>
                </div>
                <br>
                <div class="col-md-3">
                    <button class="button be-blue white">Entrar</button>
                </div>
                <div class="col-md-6 col-md-offset-4 text-center">
                    <a>¿Olvidaste tu contraseña?</a>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-12">
            <br>
            <!-- INICIO DIV REGISTRO -->
            <div class="col-md-5 col-md-offset-1" id="box-registration">
                <form action="php/registrationValidate.php" method="POST">
                    <h2 class="text-center pacific">Registro</h2>
                    <div class="col-md-6">
                        <p>
                            <label class="label-size">Nombre</label>
                            <input id="box-name" class="text-box" type="text" name="name">
                        </p>
                        <p>
                            <label class="label-size">Email</label>
                            <input id="box-email" class="text-box" type="text" name="email">
                        </p>
                        <p>
                            <label class="label-size">Usuario</label>
                            <input id="box-user" class="text-box" type="text" name="user">
                        </p>
                        <p>
                            <label class="label-size">Contraseña</label>
                            <input id="box-pass" class="text-box" type="password" name="pass">
                        </p>
                        <p>
                            <label class="label-size">Confirmar contraseña</label>
                            <input id="box-pass-confirm" class="text-box" type="password" name="pass-confirm">
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <label class="label-size">Apellidos</label>
                            <input id="box-last-name" class="text-box" type="text" name="last-name">
                        </p>
                        <p>
                            <label class="label-size">Fecha de ingreso al TEC</label>
                            <input id="box-admission-date" class="text-box" type="date" name="admission-date">
                        </p>
                        <p>
                            <label class="label-size">Sexo</label><br>
                            <input type="radio" class="form-control-radio" name="sex" value="1">
                            <label class="form-control-radio">Masculino</label>
                            <input type="radio" class="form-control-radio" name="sex" value="2">
                            <label class="form-control-radio">Femenino</label>
                        </p>
                        <p>
                            <label class="label-size">Pregunta de seguridad</label>
                            <select class="combo-box" size="1" name="security-question">
                                <option>¿Mi primera mascota?</option>
                                <option>¿Lugar de nacimiento de mi madre?</option>
                                <option>¿Profesora de primaria?</option>
                                <option>¿Canción favorita?</option>
                                <option>¿Marca de ropa favorita?</option>
                            </select>
                        </p>
                        <p>
                            <label id="box-security-answer" class="label-size">Respuesta de seguridad</label>
                            <input class="text-box" type="text" name="security-answer">
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4 col-md-offset-4">
                            <button class="button be-blue white" onclick="dataValidate()">Registrar</button>
                            <div id="status"></div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FIN DIV REGISTRO -->
            <!-- INICIO CARRUSEL -->
            <br>
            <div class="col-md-5">
                <div id="wrapper">
                    <div id="slider_container_2">
                        <div id="SliderName_2">
                            <img src="img/1.jpg" width="100%" height="390" alt="Demo2 first" title="Demo2 first" />
                            <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
                            <img src="img/2.jpg" width="100%" height="390" alt="Demo2 second" title="Demo2 second" />
                            <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
                            <img src="img/3.jpg" width="100%" height="390" alt="Demo2 third" title="Demo2 third" />
                            <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
                            <img src="img/4.jpg" width="100%" height="390" alt="Demo2 fourth" title="Demo2 fourth" />
                            <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
                        </div>
                        <div class="c"></div>
                        <center><div id="SliderNameNavigation_2"></div></center>
                        <div class="c"></div>
                        <script type="text/javascript">
                            effectsDemo2 = 'rain, stairs, fade';
                            var demoSlider_2 = Sliderman.slider({container: 'SliderName_2', width: "100%", height: 390, effects: effectsDemo2,
                                display: {
                                    autoplay: 3000,
                                    loading: {background: '#000000', opacity: 0.5, image: 'img/loading.gif'},
                                    buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}},
                                    description: {hide: true, background: '#000000', opacity: 0.4, height: 50, position: 'bottom'},
                                    navigation: {container: 'SliderNameNavigation_2', label: '<img src="img/clear.gif" />'}
                                }
                            });
                        </script>
                    </div>
                </div>
                <br><br>
            </div>
            <!-- FIN CARRUSEL -->
        </div>
        
        <footer class="be-gray white">
            <div class="define">
                <h2>Creadores</h2>
                <label>Jose Ricardo Chacón Vargas | </label>
                <label>Kenneth Pérez Alfaro | </label>
                <label>Fauricio Rojas Hernández</label>
            </div>
        </footer>
    </body>
</html>
