<?php
    require('../model/m_user.php');
    session_start();
    if( isset($_POST) && $_POST['password'] == $_POST['re-password']){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $role = 1;
        
        $new_user = new User();
        $new_user->create_1_user( $email, $password, $username, $phone, $role );

        header("Location: ../signin.php");
    }else{
        die('Something fail!');
    }
?>