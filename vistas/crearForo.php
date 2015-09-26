<div class="col-md-12"> 
    <h2>Crear foro</h2>
</div>

<form id ="box-forum" action="/php/crearForoValidate.php" method="POST">
    <div class="col-md-12 crearForo">
        <div class="col-md-6 col-md-offset-3">
            <div col-md-12>
                <p> 
                    <label class="label-size">Nombre</label>
                    <input id="box-name-forum" class="text-box" type="text" name="name-forum">
                    <h6 id="error-name-forum"></h6>
                </p>
            </div>
            <div col-md-12>
                <p> 
                    <label class="label-size">Descripción</label>
                    <textarea id="box-description-forum" class="text-area" name="description-forum"></textarea>
                    <h6 id="error-description-forum"></h6>
                </p>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <input type="button" class="button be-green white" onclick="faroValidate();" value="Crear">
            </div>
            <div class="col-md-12">
                <h6 class="text-center text-success" id="success-forum"></h6>
            </div>
        </div>
    </div>
</form>