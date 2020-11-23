<?php
require_once(URL_PROJECT.'/app/controller/ctr_querys_event.php');
$data=CTR_QUERYS_EVENT::ctr_consult_exist_event();
?>
<link rel="stylesheet" href="/css/style-event_________.css">
<div class="container_event">
    <img src="/public/svg/event.svg" alt="">
    <button class="button_public_event <?php if($data!=false)echo'no';?>" onclick="open_create_container();">Publicar un evento</button>
    
    <!-- CREATE EVENT CONATONER -->

    <?php
    if($data!=false)require_once (URL_PROJECT.'/public/views/pages/pages-page_base/user-start/settings_fo_admin/create_event/course_event.php');
    else require_once (URL_PROJECT.'/public/views/pages/pages-page_base/user-start/settings_fo_admin/create_event/create_container.php');
    if($data!=false)require_once (URL_PROJECT.'/public/views/pages/pages-page_base/user-start/settings_fo_admin/create_event/admin_event_finished.php');
    ?>

    <!-- ADMIN EVENT FINISHED -->

</div>
<script>

function end(){
$("#container_borrar").addClass("no");
$("#admin_event").removeClass("no");
}
function open_create_container(){
    $("#create_event_container").removeClass("no");
}
</script>
<script src="/js/warning_.js"></script>