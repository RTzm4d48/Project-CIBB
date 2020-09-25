<h1>trait_exists</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div></div>
<div></div>
<div>

<form action="" method="POST" enctype="multipart/form-data">
<div>
    <input type="text" name="bitch" id="cdcd">
    <input type="file" name="inpFile" id="sssw">
    <input type="submit" value="enviar">
    </div>

</div>

    <br>
    <?php
    if(isset($_FILES['dededesds'])){
        echo 'si';
        echo 'si <pre>';
            print_r($_FILES['deddax']);
            echo '</pre>';
    }else{
        echo 'no';
    }
    if(isset($_POST['bitch'])){
        echo 'si';
    }else{
        echo 'no';
    }
    ?>
    </form>
</body>
</html>