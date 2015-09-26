<div class="col-md-12">
    <h2>Crear publicación</h2>
</div>

<form id="box-publicacion" action="/php/crearPublicacionValidate.php" method="POST">
    <div class="col-md-12 nuevaPublicacion">
        <div class="col-md-6 col-md-offset-3">
            <div col-md-12>
                <p> 
                    <label class="label-size">Descripción</label>
                    <input id="box-description-publication" class="text-box" type="text" name="description-publication">
                    <h6 id="error-description-publication"></h6>
                </p>
            </div>
            <div col-md-12>
                <p> 
                    <label class="label-size">Lenguaje</label>
                    <input id="box-language-forum" class="text-box" type="text" name="language-publication">
                    <h6 id="error-language-publication"></h6>
                </p>
            </div>
            <div col-md-12>
                <p> 
                    <label class="label-size">Modo del código</label><br>
                    <input type="radio" id="radio-modo" class="form-control-radio" checked name="modo" onclick="ocultarTextArea()">
                    <label class="form-control-radio">Archivo</label>
                    <input type="radio" id="radio-modo" class="form-control-radio" name="modo" onclick="mostrarTextArea()">
                    <label class="form-control-radio">Escrito</label>
                </p>
                <p>
                    <label id="label-code" class="label-size" style="display: none;">Código</label>
                    <textarea id="box-code-publication" class="text-area" name="code-publication" style="display: none;"></textarea>
                    <h6 id="error-code-publication"></h6>
                </p>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <input type="button" class="button be-green white" onclick="publicacionValidate();" value="Crear">
            </div>
            <div class="col-md-12">
                <h6 class="text-center text-success" id="success-publication"></h6>
            </div>
        </div>
    </div>
</form>