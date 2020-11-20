<a href="/h?access=G52157c215&members=get">
        <div class="container_integrantes">
            <samp><h1>⚔INTEGRANTES BOSTERS</h1></samp>
            <span>
                <img id="img1"src="/public/img/user-img.jpg" alt="">
                <img id="img2"src="/public/img/user-img.jpg" alt="">
                <img id="img3"src="/public/img/user-img.jpg" alt="">
                <div class="container_marcador">
                    <p>+12</p>
                </div>
            </span>
        </div>
        </a>
        <a href="">
        <div class="container_reglas">
            <samp><h1>📋REGLAS DE LA FUERZA OPERATIVA📋</h1></samp>
        </div>
        </a>
        <hr>
        <div class="container_commentary">
        <?php for($i=0;$i<3;$i++):?>
            <div class="commentary">
                <img src="/public/img/user-img.jpg" alt="">
                <div class="name_commentary">
                    <h1>NAME_USER</h1>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipi suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        <?php endfor;?>
        </div>
        <form action="" method="POST">
            <?php
            $ex=CTR_QUERYS_USER::ctr_valid_fo_user();if($ex):?>
        <input class="unirse_false" type="submit" name="warning_unirse_false" value="Unirse">
            <?php endif;if(!$ex):?>
        <input class="unirse_true" type="submit" name="warning_unirse" value="Unirse">
            <?php endif;?>
        </form>
        <?php
        if(isset($_POST['warning_unirse'])){
            $ex=CTR_QUERYS_F_O::ctr_obtain_id_fo();
            $_SESSION['fo_id']=$ex;
        }
        if(isset($_POST['sb_unirse'])){
            if(!isset($_COOKIE['id_user'])){
                echo"<script>window.open('https://link.boombeach.com/en?url=boombeach%3A%2F%2FViewTaskforce%3Ftag%3D%23PY82C9VG','_blank');</script>";
                echo"<script>location.href='/h?C=".$_SESSION['code_f_o']."';</script>";
            }else{
                $ex=CTR_QUERYS_USER::ctr_join_to_fo();
                if($ex==true){
                    echo"<script>href='https://link.boombeach.com/en?url=boombeach%3A%2F%2FViewTaskforce%3Ftag%3D%23PY82C9VG';</script>";
                    echo"<script>location.href='/h?C=".$_SESSION['code_f_o']."';</script>";
                }else{
                    echo'Ocurrio un error, buelve a intentarlo mas tarde';
                }
            }
        }?>