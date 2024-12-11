<?php
    require('../model/m_user.php');
    session_start();

    if(isset($_POST)){
        $password = $_POST['password'];
        $re_password = $_POST['re-password'];
        $email = $_SESSION['email'];
        
        if($password == $re_password){
            $new_user = new User();
            $new_user->change_password($email, $password);
            header('Location:../signin.php');
        }
        else{
            die('Password confirm fail');
        }
    }

?>