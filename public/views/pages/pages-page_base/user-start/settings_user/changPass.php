<link rel="stylesheet" href="/public/css/style-settings_user_____.css">
<link rel="stylesheet" href="/public/css/Responsive/rsp_style-settings_user_.css">
<div class="container_user_settings">
    <div class="img_name changpass_name">
            <h1>Cambiar contraseña</h1>
    </div>
    <div class="body_form">
        <div class="space pass">
            <p>Contraseña anterior</p>
            <input type="password" maxlength="20" name="pass_a" id="pass_a" value="">
        </div>
        <div class="space pass">
            <p>Contraseña nueva</p>
            <input type="password" maxlength="20" name="pass_n" id="pass_n" value="">
        </div>
        <div class="space pass">
            <p>Confirmar contraseña nueva</p>
            <input class="" type="password" maxlength="20" name="pass_nn" value="" id="pass_nn">
        </div>
    </div>
    
    <input type="submit" value="Guardar Cambios" id="sub_g_c" name="sub_g_c">
    
    <script>
        $("#sub_g_c").click(function(){
            var pass_a = document.getElementById('pass_a').value;
            var pass_n = document.getElementById('pass_n').value;
            var pass_nn = document.getElementById('pass_nn').value;
            var num_new_pass = document.getElementById('pass_n').value.length;
            if(pass_a=='' || pass_n==''||pass_nn=='')messagebox_2('Hubo un problema','faltan rellenar algunos campos');
            else if(num_new_pass<8){
                messagebox_2('Hubo un problema','la contraseña tiene que tener mas de 8 digitos');
                $("#pass_n").addClass("unerror");
                $("#pass_nn").removeClass("unerror");
                $("#pass_a").removeClass("unerror");
            }
            else if(pass_n != pass_nn){
                messagebox_2('Hubo un problema','las contraseñas nuevas no coinciden');
                $("#pass_n").addClass("unerror");
                $("#pass_nn").addClass("unerror");
                $("#pass_a").removeClass("unerror");
            }
            else{
                messagebox_1('Cambiar Pass','¿Estas seguro de cambiar la contraseña?',"cahnge_pass()");
            }
            
        });
        function cahnge_pass(data){
            var pass_a = document.getElementById('pass_a').value;
            var pass_n = document.getElementById('pass_n').value;
            var pass_nn = document.getElementById('pass_nn').value;
            var data='pass_a='+pass_a+'&pass_n='+pass_n+'&pass_nn='+pass_nn;
            $.ajax({
                url: '/public/ajax/ajax_change_pass.php',
                type: 'POST',
                data: data,
                dataType: "json",
                success:function(rpt){
                    if(rpt=='fail'){
                        messagebox_2('Hubo un problema','la contraseña anterior es incorrecta.');
                        $("#pass_a").addClass("unerror");
                        $("#pass_n").removeClass("unerror");
                        $("#pass_nn").removeClass("unerror");}
                    else{closet();
                        $("#pass_a").removeClass("unerror");
                        $("#pass_n").removeClass("unerror");
                        $("#pass_nn").removeClass("unerror");
                        $("#pass_a").addClass("successful");
                        $("#pass_n").addClass("successful");
                        $("#pass_nn").addClass("successful");
                        $("#pass_a").val("");
                        $("#pass_n").val("");
                        $("#pass_nn").val("");

                        messagebox_2('Contraseña cambiada','la contraseña se cambio exitosamente');}
                }
            });
        }
        function actualizar(){location.reload(true);}
    </script>
    <script src="/public/js/warning_.js"></script>
</div>