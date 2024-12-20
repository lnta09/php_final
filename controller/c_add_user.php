<?php
    require('../model/m_user.php');
    session_start();
    if( isset($_POST)){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        
        $new_user = new User();
        $new_user->create_1_user( $email, $password, $firstname, $lastname, $role );

        header("Location: ../admin/list_user.php");
    }else{
        die('Something fail!');
    }
?>