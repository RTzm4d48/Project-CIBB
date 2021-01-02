<?php
session_destroy();

?>
<link rel="stylesheet" href="/public/css/style-settings_fo_premium_.css">
<link rel="stylesheet" href="/public/css/spectrum_.css">

<div class="container_sett_premium">
    <div class="header"><img src="/public/svg/premium_icon.svg" alt=""></div>
    <div class="line"></div>
    <div class="container_base">
        <div class="container_1">
            
            <div class="space_view">
                <div id="view" class="view" >
                    <div id="screen_01" class="screen_01 fondo">
                        <div class="es00 line">
                            <div class="es01 d-op-conteinn">
                                <div class="es02 op-conteinn"><img src="/public/img/premium/v5.png" alt=""></div>
                                <img src="" alt="">
                            </div>
                            <div class="es03">
                                <div class="es04 conteinn">
                                    <div class="es04_01">
                                    <div class="es04_02 buttons"><p>Login</p></div>
                                    <div class="es04_02 buttons"><p>Register</p></div>
                                    </div>
                                </div>
                                <div class="es05">
                                    <img src="/public/tmp/f_o/directori_<?php echo $_COOKIE['user_id_fo'];?>/fo_img_little.jpg" alt="">
                                    <div class="es06"></div>
                                    <div class="es07">
                                        <div class="es08"></div>
                                        <div class="es09 join"><p>Acceder a la F.O</p></div>
                                    </div>
                                </div>
                                <div class="es10 op-conteinn_p">
                                    <div class="es11"></div>
                                    <div class="es12">
                                        <div class="es13"></div>
                                        <div class="es13"></div>
                                        <div class="es13"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="screen_02" class="screen_02 fondo">
                        <div class="mo00 line">
                            <div class="mo01 conteinn">
                                <div class="mo01_01"></div>
                                <div class="mo01_02">
                                        <div class="mo01_02_01 buttons"><p>Login</p></div>
                                        <div class="mo01_02_01 buttons"><p>Register</p></div>
                                </div>
                            </div>
                            <div class="mo02">
                                <img class="mo02_1" src="/public/tmp/f_o/directori_<?php echo $_COOKIE['user_id_fo'];?>/fo_img_little.jpg" alt="">
                                <img class="mo02_2" src="/public/tmp/f_o/directori_<?php echo $_COOKIE['user_id_fo'];?>/fo_img_little.jpg" alt="">
                            </div>
                            <div class="mo03">
                            </div>
                            <div class="mo04 es-op-conteinn">
                                <div class="mo04_1"></div>
                                <div class="mo04_2 join"><p>Acceder a la F.O</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="controller_bottons">
                <div id="btn_r_01" class="btn btn_color"><img src="/public/svg/premium/i05.svg" alt=""></div>
                <div id="btn_r_02" class="btn btn_color"><img src="/public/svg/premium/i06.svg" alt=""></div>
                <div id="btn_r_03" class="btn btn_color"><img src="/public/svg/premium/i07.svg" alt=""></div>
            </div>
        </div>
        <div id="id_cnt_2" class="container_2">
            <div id="id_btn_design_buttons" class="secction" style='display:none'>
                <div class="icon_name">
                    <img src="/public/svg/premium/i02.svg" alt="">
                    <samp>Diseño de botones</samp>
                </div>
                <img class="re" src="/public/svg/premium/i01.svg" alt="">
            </div>
            <div id="id_btn_bookstore" class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i03.svg" alt="">
                    <samp>Biblioteca</samp>
                </div>
                <img class="re" src="/public/svg/premium/i01.svg" alt="">
            </div>
            <!--  -->
            <div class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i04.svg" alt="">
                    <samp>Color fondo</samp>
                </div>
                <div class="nn">
                <input type='text' class="colors c1" />
                </div>
            </div>
            <!--  -->
            <div class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i04.svg" alt="">
                    <samp>Color de botones</samp>
                </div>
                <div class="nn">
                <input type='text' class="colors c2" />
                </div>
            </div>
            <!--  -->
            <div class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i04.svg" alt="">
                    <samp>Color Linea central</samp>
                </div>
                <div class="nn">
                <input type='text' class="colors c3" />
                </div>
            </div>
            <!--  -->
            <div class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i04.svg" alt="">
                    <samp>Color Toolbars</samp>
                </div>
                <div class="nn">
                <input type='text' class="colors c4" />
                </div>
            </div>
            <!--  -->
            <div class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i04.svg" alt="">
                    <samp>Color btn unirse</samp>
                </div>
                <div class="nn">
                <input type='text' class="colors c5" />
                </div>
            </div>
             <!--  -->
             <div class="secction">
                <div class="icon_name">
                    <img src="/public/svg/premium/i04.svg" alt="">
                    <samp>Color containers</samp>
                </div>
                <div class="nn">
                <input type='text' class="colors c6" />
                </div>
            </div>
            <!--  -->
            <div class="btn_acept_cancel">
                <button id="btn_acept">Guardar</button>
                <button id="btn_apply">Aplicar</button>
            </div>
        </div>
        <!-- Container diseño de botones -->
        <div id="id_cont_2_design_btn" class="container_2_design_buttons no">
            <div class="cont_title">
                <img class="design_btn_return" src="public/svg/premium/chevron-left-solid.svg" alt="">
                <p>Diseño de botones</p>
                <img class="check design_btn_return" src="/public/svg/premium/check-circle-regular.svg" alt="">
            </div>
            <div class="cont_cont">

            </div>
        </div>
        <!-- Container Biblioteca -->
        <div id="id_cont_2_bookstore" class="container_2_boockstore no">
        <div class="cont_title">
                <img class="bookstore_return" src="public/svg/premium/chevron-left-solid.svg" alt="">
                <p>Libreria</p>
                <img class="check bookstore_return" src="/public/svg/premium/check-circle-regular.svg" alt="">
            </div>
            <div id="id_cont_cont" class="cont_cont">
                <!-- Content stace colors -->
            </div>
        </div>
    </div>
</div>
<script src="/public/js/spectrum_.js"></script>
<script src="/public/js/premium_function__.js"></script>
<style>
    .awesome{
    background: #434544;
    border: none;
    margin: auto;
    }
    .text{
        width: 95%;
        padding: 0px 5px;
        margin: auto;
        color: white;
        background: #434544;
    }
</style>
<script src="/public/js/warning_.js"></script>