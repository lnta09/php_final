<?php
    require('../model/m_user.php');
    session_start();

    if(!isset($_POST['old-password'])){
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
    }else{
        $email = $_POST['email'];
        $old_pass = $_POST['old-password'];
        $new_pass = $_POST['new-password'];
        $re_pass = $_POST['re-password'];

        $new_user = new User();
        $this_user = $new_user->select_user($email);

        if($old_pass != $this_user['password']){
            die('Old password is not correct');
        }
        else if($new_pass != $re_pass){
            die('New password is not confirm');
        }else{
            $new_user->change_password($email, $new_pass);
            header('Location: ../user_profile.php');
        }
        
    }

?>