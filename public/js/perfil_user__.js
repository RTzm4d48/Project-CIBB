function user_box(data){
    $("#id_warning_").removeClass("no");
    $("#id_warning_").html
    (
    "<link rel='stylesheet' href='/public/css/style-perfil_user_.css'>"+
    "<div class='advert'>"+
    "<img src='/public/tmp/all_img_users/big_img_users/big_user_"+data['id_user']+"_img.jpg'></img>"+
        "<h4>"+data['name_user']+"</h4>"+
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
function closet(){
$("#id_warning_").addClass("no");
}