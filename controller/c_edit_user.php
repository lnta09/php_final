<?php
    require('../model/m_user.php');
    if(isset($_POST)){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        if(isset($_POST['role'])){
            $role = $_POST['role'];
        }else{
            $role = 1;
        }
        
        $new_user = new User();
        $new_user->edit_user($email, $username, $phone, $gender, $birthday, $role );

        if(isset($_POST['role'])){
            header("Location: ../admin/list_user.php");
        }else{
            header("Location: ../user_profile.php");
        }
    }else{
        die('Something fail!');
    }
?>