function readCookie(name) {
    return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + name.replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
    }
    $('#go').click(function(){
        var text_seach=document.getElementById('search').value;
        var ruta="txtSearch="+text_seach;
        $.ajax({
            url: '/public/ajax/ctr_search.php',
            type: 'POST',
            data: ruta,
            dataType: "json",
            success:function(data){
                search_for_name(data);
            }
        });
    });
    search_all();
    function search_all(){
        var text_seach=document.getElementById('search').value;
        var ruta="txtSearch="+text_seach+"&all=true";
        $.ajax({
            url: '/public/ajax/ctr_search.php',
            type: 'POST',
            data: ruta,
            dataType: "json",
            success:function(data){
                search_for_name(data);
            }
        });
    }
    function search_for_name(data){
        var text_seach=document.getElementById('search').value;
        $('#conteiner_fo').html("");
        if(data[4]==0){   
            $('#conteiner_fo').append("<div class='without_results'>"+
            "<label for=''>Sin Resultados</label>"+
            "<p>lo sentimos, no existe ninguna fuerza operativa llamada '"+text_seach+"'.</p>"+
            "</div>");
        }
        for(var i=0;i<=data[4]-1;i++){
        var ii=i+1;
        var id_user = readCookie("id_user");
        $('#conteiner_fo').append("<div class='wraper_fo'>"+
        "<div class='cont_fo'>"+
                "<div class='badge'>"+
                    "<img src='/public/tmp/users/directori_"+id_user+"/search_fo/img_all_"+data[1][i]+".jpg' class='badge-img' alt=''>"+
                    "<img src='/img/F-O.png' class='badge-ornaments' alt=''>"+
                "</div>"+
                "<div class='properties'>"+
                    "<h1>"+data[0][i]+"</h1>"+
                    "<p>"+data[3][i]+"...</p>"+
                    "<span>"+
                        "<p class='activity'>Actividad: "+data[2][i]+"%</p>"+
                        "<a href='/h?C="+data[1][i]+"'>Visitar</a>"+
                    "</span>"+
                "</div>"+
            "</div>"+
            "</div>"+
        "</div>");
        }
        
    }
    $('input[type=search]').on('search',function(){
        search_all();
    });
            