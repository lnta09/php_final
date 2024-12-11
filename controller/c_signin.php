<?php
    require('../model/m_user.php');
    session_start();
    if( isset( $_POST ) ){
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $role = 1;
        
        $new_user = new User();
        $this_user = $new_user->signin_user($email, $password);
        if ($this_user == null)
        {           
            $error = 'Sai mật khẩu hoặc tài khoản';
            header("Location: ../signin.php?valid=$error");
        }
        else
        {
            if($_SESSION["roleUSER"] == 1){
                header("Location: ../index.php");
            }
            else{
                header('Location: ../admin/admin_user.php');
            }
        }
    }
?>