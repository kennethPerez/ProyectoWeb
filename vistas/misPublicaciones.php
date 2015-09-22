<div class="col-lg-12 misPublicaciones">
    
    <div class="col-md-6 nuevaPublicacion">
        
        <h3> Publicación </h3>

        <p> 
            <label> Descripción </label>
            <input type="text">
        </p>
        
        <p> 
            <label> Lenguaje </label>
            <input type="text">
        </p>
        
        <p> 
            <label> Modo del código </label>
            <input type="radio" name="modo" onclick="ocultarTextArea()">
            <label> Archivo </label>
            <input type="radio"  name="modo" onclick="mostrarTextArea()">
            <label> Escrito </label>
        </p>
        
        <p> 
            <textarea id="txtCodigo" name="txtCodigo" style="display: none;"> </textarea>
        </p>
        
        <p> 
            <input type="submit" id="btnPublicar" value="Publicar">
        </p>
        
        
        
    </div>
    
    <div class="col-md-6 miMuro">
        
        <p>
            <h3> Mi muro </h3>
        </p>
        
        <div class="col-md-12 listaPublicaciones">
            todas las publicaciones
        </div>
        
    </div>
    
</div>