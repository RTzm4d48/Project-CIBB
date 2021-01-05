<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style-admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="name">
            <p class="p1">Other...</p>
            <h4>Edgar Aggre</h4>
            <p class="p2">Password:</p>
        </div>
        <input class="text_pass" type="password" name="" value="" id="pss">
        <br>
        <input class="btn_sub" onclick="login();" type="submit" value="Submit">
    </div>
    <script>
        function login(){
            var pass = document.getElementById('pss').value;
            $.ajax({
                url: '/public/ajax/admin/ajax_login.php',
                type: 'POST',
                data: 'p='+pass,
                dataType: "json",
                success:function(rpt){
                    if(rpt != 'error'){
                        window.location.href = "/public/views/pages/admin/inicio.php";
                        //CREACION DE COOKIE -----
                        var cname='admin_id';
                        var exdays=360;
                        var cvalue=rpt;
                        var d = new Date();
                        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                        var expires = 'expires=' + d.toUTCString();
                        document.cookie = cname + '=' + cvalue + ';' + expires +'; path=/';

                    }else alert('password incorrect');
                }
            });
        }
    </script>
</body>
</html>