<?php
class Resize_photo{
function photo_big($temporal,$name,$type){
    $nombre="$name.jpg";
            if($type=='image/jpeg'){
                //abrir la foto original
                $original=imagecreatefromjpeg($temporal);
            }else if($type=='image/png'){
                //abrir la foto original
                $original=imagecreatefrompng($temporal);
            }else{
                die('<center>
                    <br>
                    <p>Ocurrio un error desconocido</p>
                    <a href="/views/pages/template.php?new_fo=start">Recargar</a></center>');
            }
    //abrir la foto original
    $ancho_original=imagesx($original);
    $alto_original=imagesy($original);
    if($ancho_original>$alto_original*2&&$alto_original>900){
        $alto_nuevo=300;
        $ancho_nuevo=round($alto_nuevo*$ancho_original/$alto_original);//422
    
        $ancho = $alto_nuevo*1.79;//358
        //crear una lienzo vacio (foto destino 750400)
        $copia=imagecreatetruecolor($ancho,$alto_nuevo);
        
        $c=$ancho_nuevo-$ancho;//64
        $centrador=$c*2.5;//32
    }else if($ancho_original>$alto_original*2){
        $alto_nuevo=300;
        $ancho_nuevo=round($alto_nuevo*$ancho_original/$alto_original);//422
    
        $ancho = $alto_nuevo*1.79;//358
        //crear una lienzo vacio (foto destino 750400)
        $copia=imagecreatetruecolor($ancho,$alto_nuevo);
        $c=$ancho_nuevo-$ancho;//64
        $centrador=$c/2;//32
    }else{
        $ancho_nuevo=300;
        $alto_nuevo=round($ancho_nuevo*$alto_original/$ancho_original);

        $alto=$ancho_nuevo / 1.777;
        //crear una lienzo vacio (foto destino 750400)
        $copia = imagecreatetruecolor($ancho_nuevo, $alto);
        $c=$alto_nuevo-$alto;//64
        $centrador=$c/2;//32
    }
    //copia original -> copia
    //1-2 destino-original
    //3-4 eje X-Y pegado --> 0,0
    //5-6 eje X-Y original --> 0,0
    //7-8 encho-alto destino --> WIDTH -HEIGHT
    //9-10 ancho-alto original --> WIDTH -HEIGHT
    if($ancho_original>$alto_original*2){
        imagecopyresampled($copia, $original,0,0,$centrador,0, $ancho_nuevo, $alto_nuevo,
        $ancho_original,$alto_original);
    }else{
        imagecopyresampled($copia, $original,0,0,0,$centrador, $ancho_nuevo, $alto_nuevo,
        $ancho_original,$alto_original);
    }
    //exportar/guardar imagen
    imagejpeg($copia,$_SERVER['DOCUMENT_ROOT']."/public/tmp/tmp/".$nombre,81);
}
}?>
