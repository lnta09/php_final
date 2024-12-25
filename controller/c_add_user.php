<?php
    require('../model/m_user.php');
    session_start();
    if( isset($_POST)){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        
        $new_user = new User();
        $new_user->create_1_user( $email, $password, $username, $phone, $role );

        header("Location: ../admin/list_user.php");
    }else{
        die('Something fail!');
    }
?>