<div class="formBody">


    <h1>Crear una Fuerza Operativa</h1>
    <p class="description">¡los cimientos de una buena fuerza operativa comienza aquí!</p>

    
    <!-- /views/pages/pages-template/create-fo.php -->
<form action="" method="POST" enctype="multipart/form-data">

        <div class="contImg">
            <img src="/img/img-fo.jpg" id="imagePreview" alt="">
            <div class="semi-circulo">
                <input type="file" name="imgFO" id="inpFile" hidden>
                <label for="inpFile">Cambiar</label>
            
            </div>
        </div>
    
        <div class="section">
            <p>Nombre*</p>
            <input type="text" maxlength="15" name="namefok" id="txtName" required>  
        </div>
        <div class="section">
            <p class="p2">Descripcion*</p>
            <textarea name="description" maxlength="250" rows="3" cols="5" required></textarea>
        </div>
        <div class="section">
            <p>Tag</p>
            <input type="text" maxlength="5" name="tag" id="txtTag">
        </div>
        <div class="explication">
            <p>abrebieaturas representativas de la F.O que se deveran de poner los integrantes mas comprometidos.</p>
        </div>
        <div class="section">
            <p>URL de web<br>alternativa</p>
            <input type="text" maxlength="60" name="UrlWebAlternative" id="txtUrlWebAlternative">
        </div>
        <div class="explication">
            <p>si se tiene un sitio web adicional no estaria nada mal, y si no es el caso esta opcion no es obligatoria.</p>
        </div>
        <div class="section">
            <p>URL direccion<br>boom beach F.O*</p>
            <input type="text" maxlength="60" name="UrlFo" id="txtUrlFo" required>
        </div>
        <div class="explication">
            <p>Para que la gente pueda acceder a traves de esta web a el juego, comcretamente a la F.O.<br>
            La URL se encuentra en la opcion (compartir)  dentro de la interfaz de la F.O.</p>
        </div>
        <div class="section">
            <p>URL musica o <br>audio</p>
            <input type="text" maxlength="60" name="UrlMusic" id="txtUrlMusic">
        </div>
        <div class="explication">
            <p>Esta opcion no es obligatoria, pero si tienes un audio o musica que quieres que la gente pueda escuchar al visitar tu F.O, puedes hacerlo</p>
        </div>

        <div class="alert"><p></p></div>

        <input type="submit" value="Siguiente" id="" >
    


<script>
        const inpFile = document.getElementById("inpFile");
        const previewImage = document.getElementById("imagePreview");

        inpFile.addEventListener("change", function(){
            const file = this.files[0];

            if(file){
                const reader = new FileReader();

                reader.addEventListener("load", function(){
                    console.log(this);
                    previewImage.setAttribute("src", this.result);
                });
                reader.readAsDataURL(file);
                }
        });

    </script>
</form>

</div>