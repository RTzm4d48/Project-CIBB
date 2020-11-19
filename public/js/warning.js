function messagebox_1(title,description,run){
    $("#id_warning_").removeClass("no");
    $("#id_warning_").html
    (
        "<div class='advert'>"+
            "<h4>"+title+"</h4>"+
            "<p>"+description+"</p>"+
            "<hr>"+
            "<div class='buttons'>"+
                "<input type='submit'value='Cancelar'onclick='closet();'class='cancel'>"+
                "<input type='submit' value='Aceptar' onclick='"+run+"();' class='acept'>"+
            "</div>"+
        "</div>"
    );
}
function messagebox_2(title,description){
$("#id_warning_").removeClass("no");
$("#id_warning_").html
(
"<div class='advert'>"+
    "<h4>"+title+"</h4>"+
    "<p>"+description+"</p>"+
    "<hr>"+
    "<div class='buttons'>"+
        "<input type='submit' value='Aceptar'onclick='closet();' class='acept'>"+
    "</div>"+
"</div>"
);
}
function closet(){
$("#id_warning_").addClass("no");
}