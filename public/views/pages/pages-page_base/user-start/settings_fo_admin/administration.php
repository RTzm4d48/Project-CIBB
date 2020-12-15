<?php
require_once(URL_PROJECT.'/app/controller/ctr_administration.php');
$data=CTR_ADMINISTRATION::ctr_select_user();
/* echo'<pre>';
print_r($data);
echo'</pre>'; */

?>
<link rel="stylesheet" href="css/style-administration.css">
<div class="container_administration">
<?php
if($data['Row'] == 0){
    echo"<div style='color: white;font-family:Arial;text-align:center;width:100%; transform: scale(0.7)'>";
    echo('<h1>Listado de miembros de la Fuerza Operativa vacio <br> :(</h1>');
    echo "</div>";
}
?>
    <?php for($i=0;$i<$data['Row'];$i++):?>
    <div class="container_user">
        <img src="/public/tmp/all_img_users/big_img_users/big_user_<?php echo$data['user'][$i][0]?>_img.jpg">
        <h4><?php echo$data['user'][$i][1]?></h4>
        <p maxlength="5"><?php echo$data['user'][$i][2]?></p>
        <div class="buttons_area">
            <?php if($data['user'][$i][2]=='Leyenda')echo"<button class='ascend'  onclick='admin_alert(".$data['user'][$i][0].",`del`)'>Acender</button>";?>
            <button class="<?php if($data['user'][$i][2]=='Oficial')echo'ascend';else echo'degrade';?>"
            onclick="admin_alert(<?php echo$data['user'][$i][0]?>,<?php echo'`'.$data['user'][$i][2].'`';?>);"><?php if($data['user'][$i][2]=='Oficial')echo'Acender';else echo'Degradar'?></button>
            <button class="expel" onclick="admin_alert(<?php echo$data['user'][$i][0]?>,'expel')">Expulsar</button>
        </div>
    </div>
    <?php endfor;?>
</div>
<script>
    function admin_alert(id_user,rank){
        if(rank=='Oficial')messagebox_1('Ascender','¿Estas seguro de ascender a este usuario?',"administration("+id_user+",`ascend`)");
        else if(rank=='Leyenda')messagebox_1('Degradar','¿Estas seguro de degradar a este usuario?',"administration("+id_user+",`degrade`)");
        else if(rank=='expel')messagebox_1('Expulsar','¿Estas seguro de expulsar a este usuario? <br> perdera todo el progreso que tiene en esta F.O',"administration("+id_user+",`expel`)");
        else if(rank=='del')messagebox_1('Delegar','¿Estas seguro de delegar tu liderazgo a este usuario? <br> dejaras de tener control del la F.O',"administration("+id_user+",`expel`)");
    }
    function administration(id_user,action){
        $.ajax({
        url: '/public/ajax/ajax_administration.php',
        type: 'POST',
        data: 'id_user='+id_user+'&action='+action,
        /* dataType: "json", */
        success:function(rpt){
            actualizar(); 
        }
    });
    closet();
    }
    function actualizar(){location.reload(true);}

</script>
<script src="/js/warning_.js"></script>