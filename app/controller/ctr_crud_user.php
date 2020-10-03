<?php
class VALIDATIONS{

    function __construct(){
        /* $this->val_register_user(); */
    }

    static function val_register_user(){
        echo 'hola';
        echo '<br>';
        if(isset($_POST['gmail'])) echo $_POST['gmail'];
        echo '<br>';
        if(isset($_POST['user'])) echo $_POST['user']; 
        echo '<br>';
        if(isset($_POST['password'])) echo $_POST['password']; 
    }
}