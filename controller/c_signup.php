<?php
    require('../model/m_user.php');
    session_start();
    if( isset($_POST) && $_POST['password'] == $_POST['re-password']){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(isset($_POST['firstname'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
        }else{
            $firstname = $lastname = 'default';
        }
        $role = 1;
        
        $new_user = new User();
        $new_user->create_1_user( $email, $password, $firstname, $lastname, $role );

        header("Location: ../signin.php");
    }else{
        die('Something fail!');
    }
?>