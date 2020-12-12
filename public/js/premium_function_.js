//default
$('#btn_r_03').css('opacity','0.5');
$('#btn_r_02').css('background','#fdc20041');

//function to buttons primiry
$('#btn_r_01').click(function(){
    $('#btn_r_02').css('background','#313131');
    $('#btn_r_01').css('background','#fdc20041');
    $('#btn_r_03').css('opacity','0.5');
    only_one_screen();
});
$('#btn_r_02').click(function(){
    $('#btn_r_01').css('background','#313131');
    $('#btn_r_02').css('background','#fdc20041');
    $('#btn_r_03').css('opacity','0.5');
    only_two_screen();
});
$('#btn_r_03').click(function(){
    /* empty */
});
function only_one_screen(){
    $('#screen_02').addClass('no');
    $('#screen_01').removeClass('no');
    $('#view').css('height','200px');
    $('#screen_01').css('transform','scale(1.2)');
}
function only_two_screen(){
    $('#screen_01').addClass('no');
    $('#screen_02').removeClass('no');
    $('#view').css('height','auto');
    $('#screen_01').css('transform','scale(1)');
}
/* $('#id_btn_design_buttons').click(function(){
    $('#id_cnt_2').addClass('no');
    $('#id_cont_2_design_btn').removeClass('no');
});
$('.design_btn_return').click(function(){
    $('#id_cnt_2').removeClass('no');
    $('#id_cont_2_design_btn').addClass('no');
}); */

//library
$('#id_btn_bookstore').click(function(){
    $('#id_cnt_2').addClass('no');
    $('#id_cont_2_bookstore').removeClass('no');
    data_color();
});
$('.bookstore_return').click(function(){
    $('#id_cnt_2').removeClass('no');
    $('#id_cont_2_bookstore').addClass('no');
    colors_firsh();
});
//btns acpet cancel
$('#btn_acept').click(function(){
    messagebox_3('Guardar','¿Estas seguro de guardar este estilo?');
});
$('#btn_apply').click(function(){
    messagebox_1('Aplicar','¿Estas seguro de aplicar este estilo?','apply_style_fo();');
});
function apply_style_fo(){
    closet_();
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_apply_style_fo.php',
    type: 'POST',
    /* data: data, */
    /* dataType: "json", */
    success:function(rpt){
        /* alert(rpt); */
    }
    });
}
//PART 2
//WRITING COLOR
colors_firsh();
function colors_firsh(){
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_tmp_colors_2.php',
    type: 'POST',
    /* data: data, */
    dataType: "json",
    success:function(rpt){
        firsh_function(rpt);
    }
    });
}
function firsh_function(data){
        
    $(".c1").spectrum({
        replacerClassName: 'awesome',
        containerClassName: 'awesome',
        chooseText: "Aceptar",
        showInput: true,
        showPalette: true,
        showPalette: true,
        palette:[['#36393F'],['#A4DF4A'],['#5693DB']],
        color: data['c1'],
    change: function(color){
        $('.fondo').css('background-color',color.toHexString());
        save_colors(color.toHexString(),1);
    }
    });
    $(".c2").spectrum({
        replacerClassName: 'awesome',
        containerClassName: 'awesome',
        chooseText: "Aceptar",
        showInput: true,
        showPalette: true,
        showPalette: true,
        palette:[['#36393F'],['#A4DF4A'],['#5693DB']],
        color: data['c2'],
    change: function(color){
        $('.buttons').css('background-color',color.toHexString());
        save_colors(color.toHexString(),2);
    }
    });
    $(".c3").spectrum({
        replacerClassName: 'awesome',
        containerClassName: 'awesome',
        chooseText: "Aceptar",
        showInput: true,
        showPalette: true,
        showPalette: true,
        palette:[['#36393F'],['#A4DF4A'],['#5693DB']],
        color: data['c3'],
    change: function(color){
        $('.line').css('background','linear-gradient(to right,#ffffff00, '+color.toHexString()+'35, #ffffff00)');
        save_colors(color.toHexString(),3);
    }
    });
    $(".c4").spectrum({
        replacerClassName: 'awesome',
        containerClassName: 'awesome',
        chooseText: "Aceptar",
        showInput: true,
        showPalette: true,
        showPalette: true,
        palette:[['#36393F'],['#A4DF4A'],['#5693DB']],
        color: data['c4'],
    change: function(color){
        $('.conteinn').css('background-color',color.toHexString());
        $('.op-conteinn').css('background-color',color.toHexString()+'98');
        $('.d-op-conteinn').css('background-color',color.toHexString()+'b4');
        $('.es-op-conteinn').css('background-color',color.toHexString()+'27');
        save_colors(color.toHexString(),4);
    }
    });
    $(".c5").spectrum({
        replacerClassName: 'awesome',
        containerClassName: 'awesome',
        chooseText: "Aceptar",
        showInput: true,
        showPalette: true,
        showPalette: true,
        palette:[['#36393F'],['#A4DF4A'],['#5693DB']],
        color: data['c5'],
    change: function(color){
        $('.join').css('background-color',color.toHexString());
        save_colors(color.toHexString(),5);
    }
    });
    $(".c6").spectrum({
        replacerClassName: 'awesome',
        containerClassName: 'awesome',
        chooseText: "Aceptar",
        showInput: true,
        showPalette: true,
        showPalette: true,
        palette:[['#36393F'],['#A4DF4A'],['#5693DB']],
        color: data['c6'],
    change: function(color){
        $('.op-conteinn_p').css('background-color',color.toHexString()+'98');
        save_colors(color.toHexString(),6); 
    }
    });
}

//TEMPORAL SAVE COLOR
function save_colors(color, position){
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_save_colors.php',
    type: 'POST',
    data: 'color='+color+'&position='+position,
    /* dataType: "json", */
    success:function(rpt){
    }
});
}
function insert_colors(){
    var name = document.getElementById('name_style').value;
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_insert_colors.php',
    type: 'POST',
    data: 'name='+name,
    /* dataType: "json", */
    success:function(rpt){
        closet_();
    }
});
}
function data_color(){
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_select_color_library.php',
    type: 'POST',
    /* data: 'name='+name, */
    dataType: "json",
    success:function(data){
        select_styles(data);
    }
});
}
function data_color_02(i){
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_select_color_library.php',
    type: 'POST',
    data: 'deleted=true',
    dataType: "json",
    success:function(data){
        apply(i,data);
        apply_warning(data[i]['name'],data[i]['color_01'],data[i]['color_02'],data[i]['color_03'],data[i]['color_04'],data[i]['color_05'],data[i]['color_06']);
    }
});
}
function deleted_warning(id){
    messagebox_1('Eliminar','¿estas seguro de eliminar este estilo?','deleted('+id+');');
}
function apply_warning(name,c1,c2,c3,c4,c5,c6){
    var data = 'c1='+c1+'&c2='+c2+'&c3='+c3+'&c4='+c4+'&c5='+c5+'&c6='+c6;
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_tmp_colors.php',
    type: 'POST',
    data: data,
    dataType: "json",
    success:function(rpt){
        messagebox_2(name,'Estilo implementado exitosamente');
    }
});
}
function deleted(id){
    $.ajax({
    url: '/public/ajax/premium_ctr/ajax_deleted_colors.php',
    type: 'POST',
    data: 'id='+id,
    dataType: "json",
    success:function(rpt){
        /* if(rpt == true)$('#id_color_space_'+id).css('display','none'); */
        data_color();
        closet_();
    }
});
}
function apply(i,data){
    //fondo -1-
    $('.fondo').css('background-color',data[i]['color_01']);
    //buttons -2-
    $('.buttons').css('background-color',data[i]['color_02']);
    //line -3-
    $('.line').css('background','linear-gradient(to right,#ffffff00, '+data[i]['color_03']+'35, #ffffff00)');
    //content -4-
    $('.conteinn').css('background-color',data[i]['color_04']);
    $('.op-conteinn').css('background-color',data[i]['color_04']+'98');
    $('.d-op-conteinn').css('background-color',data[i]['color_04']+'b4');
    $('.es-op-conteinn').css('background-color',data[i]['color_04']+'27');
    //join -5-
    $('.join').css('background-color',data[i]['color_05']);
    //content -6-
    $('.op-conteinn_p').css('background-color',data[i]['color_06']+'98');
    //colores primcipales
}
function actualizar(){location.reload(true);}
function select_styles(data){
    $("#id_cont_cont").html('');
    /* alert(data[0]['num']); */
    try{var Row = data[0]['num'];}catch{var Row = 0}
    for(var i = 0; i<Row; i++){
    
    var content = "<div id='id_color_space_"+data[i]['id']+"' class='color_space'>"+
                    "<div class='icon_name'>"+
                        "<img src='/public/svg/premium/palette-solid.svg' alt=''>"+
                        "<p>"+data[i]['name']+"</p>"+
                    "</div>"+
                    "<div class='cont_p_color'>"+
                        "<div style='background:"+data[i]['color_01']+"' class='c'></div>"+
                        "<div style='background:"+data[i]['color_02']+"' class='c'></div>"+
                        "<div style='background:"+data[i]['color_03']+"' class='c'></div>"+
                        "<div style='background:"+data[i]['color_04']+"' class='c'></div>"+
                        "<div style='background:"+data[i]['color_05']+"' class='c'></div>"+
                        "<div style='background:"+data[i]['color_06']+"' class='c'></div>"+
                    "</div>"+
                    "<ul class='nav'>"+
                        "<li><img src='/public/svg/premium/ellipsis-h-solid.svg'>"+
                            "<ul>"+
                            "<li><p onclick='deleted_warning("+data[i]['id']+");'>Eliminar</p></li>"+
                            "<li><p onclick='data_color_02("+i+");'>Implementar</p></li>"+
                            "</ul>"+
                        "</li>"+
                    "</ul>"+
                "</div>";
    $("#id_cont_cont").append(content);
    }
}
//PART 3
//WARNING FOR SAVE COLOR 
function messagebox_3(title,description){
    $("#id_warning_").removeClass("no");
    $("#id_warning_").html
    (
        "<div class='advert'>"+
            "<h4>"+title+"</h4>"+
            "<p>"+description+"</p>"+
            "<hr>"+
            "<input id='name_style' class='text' maxlength='15' placeholder='nombre del estilo' type='text' name='' id=''>"+
            "<hr>"+
            "<div class='buttons'>"+
                "<input type='submit'value='Cancelar'onclick='closet_();'class='cancel'>"+
                "<input type='submit' value='Guardar' onclick='insert_colors();' class='acept'>"+
            "</div>"+
        "</div>"
    );
}
function closet_(){
$("#id_warning_").addClass("no");
}
