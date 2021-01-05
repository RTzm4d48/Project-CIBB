<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style-admin.css">
</head>
<body>
    <?php
    if(isset($_COOKIE['admin_id'])){
        if($_COOKIE['admin_id']!='2y$10$22ooV20m8BVwy')echo"<script>window.location.href = '/views/pages/admin';</script>";
    }else echo"<script>window.location.href = '/views/pages/admin';</script>";
    ?>
    <div class="container_start">
        <img src="/public/img/edgaraggre.png" alt="">
        <h4 class="title">CIBB - admin System</h4>
        <div class="container_header">
            <a href="">Usuarios : 100</a>
            <br>
            <a href="">Fuerzas Operativas : 89</a>
            <br>
            <a href="">usuarios premim: 80</a>
            <br>
            <a href="">fuerzas operativas premium: 50</a>
        </div>
        <center>
        <form action="" method="POST">
            <input type="submit" name='btn_salir' value="Salir">
        </form>
        </center>
        <?php
        if(isset($_POST['btn_salir'])){
            echo"
            <script>window.location.href = '/views/pages/admin';</script>
            var expiry = new Date();
            expiry.setTime(expiry.getTime()-3600);
            document.cookie='admin_id'+'=; expires='+expiry.toGMTString()+'; path=/';
            ";
        }
        ?>
    </div>
</body>
</html>