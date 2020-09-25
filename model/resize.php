<?php
function console2($date){
    echo "<script> console.log('Debug Objects: ". $date ."')</script>";
}

console2("Acces successful to resize.php");

class Resize{
    function resized_img_fo_big($temporal, $name, $type){

        $nombre   = "size-$name-big.jpg";

            if($type == 'image/jpeg'){
                //abrir la foto original
                $original = imagecreatefromjpeg($temporal);
            }else if($type == 'image/png'){
                //abrir la foto original
                $original = imagecreatefrompng($temporal);
            }else{
                die('<center>
                    <br><br><br><br><br><br>
                    <p>Ocurrio un error desconocido</p>
                    <a href="/views/pages/template.php?new_fo=start">Recargar</a>       
                    </center>');
            }
        $ancho_original = imagesx($original);
        $alto_original = imagesy($original);

        if($ancho_original > $alto_original){
            $c = $ancho_original - $alto_original;
            $centrador = $c / 2;

            $ancho_nuevo = 400;
            $alto_nuevo = round($ancho_nuevo * $alto_original / $ancho_original);

            //crear una lienzo vacio (foto destino 750400)
            $copia = imagecreatetruecolor($alto_nuevo, $alto_nuevo);
            echo "imagen ancha";
            
        }else{
            $c = $alto_original - $ancho_original;
            $centrador = $c / 2;

            $alto_nuevo = 400;
            $ancho_nuevo = round($alto_nuevo * $ancho_original / $alto_original);
            //crear una lienzo vacio (foto destino 750400)
            $copia = imagecreatetruecolor($ancho_nuevo, $ancho_nuevo);
            echo "imagen alta";
            
        }
    
        //copia original -> copia
        //1-2 destino-original
        //3-4 eje X-Y pegado --> 0,0
        //5-6 eje X-Y original --> 0,0
        //7-8 encho-alto destino --> WIDTH -HEIGHT
        //9-10 ancho-alto original --> WIDTH -HEIGHT
        if($ancho_original > $alto_original){
            imagecopyresampled($copia, $original,0,0,$centrador,0, $ancho_nuevo,$alto_nuevo,
            $ancho_original,$alto_original);
        }else{
            imagecopyresampled($copia, $original,0,0,0,$centrador, $ancho_nuevo,$alto_nuevo,
            $ancho_original,$alto_original);
        }
    
        //exportar/guardar imagen
        imagejpeg($copia, $_SERVER['DOCUMENT_ROOT']."/model/tmp/".$nombre,81);
    }

    function resized_img_fo_little($temporal, $name, $type){

        $nombre   = "size-$name-little.jpg";

            if($type == 'image/jpeg'){
                //abrir la foto original
                $original = imagecreatefromjpeg($temporal);
            }else if($type == 'image/png'){
                //abrir la foto original
                $original = imagecreatefrompng($temporal);
            }else{
                die('<center>
                    <br><br><br><br><br><br>
                    <p>Ocurrio un error desconocido</p>
                    <a href="/views/pages/template.php?new_fo=start">Recargar</a>       
                    </center>');
            }
        
        $ancho_original = imagesx($original);
        $alto_original = imagesy($original);

        if($ancho_original > $alto_original){
            $c = $ancho_original - $alto_original;
            $centrador = $c / 2;

            $ancho_nuevo = 100;
            $alto_nuevo = round($ancho_nuevo * $alto_original / $ancho_original);

            //crear una lienzo vacio (foto destino 750400)
            $copia = imagecreatetruecolor($alto_nuevo, $alto_nuevo);
            echo "imagen ancha";
            
        }else{
            $c = $alto_original - $ancho_original;
            $centrador = $c / 2;

            $alto_nuevo = 100;
            $ancho_nuevo = round($alto_nuevo * $ancho_original / $alto_original);
            //crear una lienzo vacio (foto destino 750400)
            $copia = imagecreatetruecolor($ancho_nuevo, $ancho_nuevo);
            echo "imagen alta";
            
        }
    
        //copia original -> copia
        //1-2 destino-original
        //3-4 eje X-Y pegado --> 0,0
        //5-6 eje X-Y original --> 0,0
        //7-8 encho-alto destino --> WIDTH -HEIGHT
        //9-10 ancho-alto original --> WIDTH -HEIGHT
        if($ancho_original > $alto_original){
            imagecopyresampled($copia, $original,0,0,$centrador,0, $ancho_nuevo,$alto_nuevo,
            $ancho_original,$alto_original);
        }else{
            imagecopyresampled($copia, $original,0,0,0,$centrador, $ancho_nuevo,$alto_nuevo,
            $ancho_original,$alto_original);
        }
    
        //exportar/guardar imagen
        imagejpeg($copia, $_SERVER['DOCUMENT_ROOT']."/model/tmp/".$nombre,81);
    }
}

?>