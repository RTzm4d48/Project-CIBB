
<link rel="stylesheet" href="/css/style-toolbar-right__.css">
<?php
//funciones de toolbar
$no_fo = true;



//validation
if($no_fo == true){
    user_without_fo();
}else{
    user_with_fo();
}




function user_without_fo(){
?>
<div class="toolbar_right">
            <div class="toolbar_right-menu">
                <img src="/svg/menu-icon.svg" alt="">
            </div>
            
            <div class="toolbar_right-user">
                <img src="/img/user-img.jpg" class="img-user" alt="">
                <img src="/svg/setings.svg" class="setings-user" alt="">
            </div>
        </div>
<?php
}
function user_with_fo(){
?>
<div class="toolbar_right">
            <div class="toolbar_right-menu">
                <img src="/svg/menu-icon.svg" alt="">
            </div>
            <div class="toolbar_right-fo">
                <img src="/img/img-fo.jpg" class="toolbar_right-fo-img" alt="">
                <img src="/img/F-O.png" class="toolbar_right-fo-ornaments" alt=""> 
            </div>
            <div class="toolbar_right-user">
                <img src="/img/user-img.jpg" class="img-user" alt="">
                <img src="/svg/setings.svg" class="setings-user" alt="">
            </div>
        </div>
<?php 
}
?>