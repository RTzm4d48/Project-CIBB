function user_box(data){
    $("#id_warning_").removeClass("no");
    if(data['its_premium']=='yes'){
        $("#id_warning_").html
        (
        "<link rel='stylesheet' href='/public/css/style-perfil_user_.css'>"+
        "<div class='advert' style='background-image: linear-gradient(180deg, #36393F, #5E008F38); border: 1px solid #6E6CAB;'>"+
        "<img src='/public/tmp/all_img_users/big_img_users/big_user_"+data['id_user']+"_img.jpg'></img>"+
            "<div style='display:flex;justify-content:center'><h4>"+data['name_user']+"</h4><img style='width:auto;height:15px;margin:auto 2px;' src='/public/img/img04.png'></div>"+
            "<p>"+data['state']+"</p>"+
            "<div class='container_box_atribute'>"+
            "<div style='background:#6E6CAB;' class='box_atribute numeric'><h5>"+data['point']+"</h5><p>puntos</p></div>"+
            "<div style='background:#6E6CAB;' class='box_atribute lable'><h5>"+data['rank']+"</h5><p>rank</p></div>"+
            "<div style='background:#6E6CAB;' class='box_atribute numeric'><h5>"+data['participation']+"</h5><p>fo part.</p></div>"+
            "</div>"+
            "<button id='id_p_u_cerrar_btn' onclick='closet();'>Cerrar</button>"+
        "</div>"
        );
    }else{
        $("#id_warning_").html
        (
        "<link rel='stylesheet' href='/public/css/style-perfil_user_.css'>"+
        "<div class='advert'>"+
        "<img src='/public/tmp/all_img_users/big_img_users/big_user_"+data['id_user']+"_img.jpg'></img>"+
            "<div style='display:flex;justify-content:center'><h4>"+data['name_user']+"</h4></div>"+
            "<p>"+data['state']+"</p>"+
            "<div class='container_box_atribute'>"+
            "<div class='box_atribute numeric'><h5>"+data['point']+"</h5><p>puntos</p></div>"+
            "<div class='box_atribute lable'><h5>"+data['rank']+"</h5><p>rank</p></div>"+
            "<div class='box_atribute numeric'><h5>"+data['participation']+"</h5><p>fo part.</p></div>"+
            "</div>"+
            "<button id='id_p_u_cerrar_btn' onclick='closet();'>Cerrar</button>"+
        "</div>"
        );
    }
    }
function closet(){
$("#id_warning_").addClass("no");
}