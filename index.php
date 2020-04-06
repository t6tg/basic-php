<?php 
    $input_password = "b4cc344d25a2efe540adbf2678e2304c";
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    if($password != null){
        if(md5($password) == $input_password){
            echo "Password is valid";
        }else {
            echo "Password is Invalid";
        }
    }
?>