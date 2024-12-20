<?php
    require('../model/m_user.php');
    if(isset($_POST)){
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $role = $_POST['role'];
        
        $new_user = new User();
        $new_user->edit_user($email, $firstname, $lastname, $role );

        //echo "$email - $firstname - $lastname - $role";
        header("Location: ../admin/list_user.php");
    }else{
        die('Something fail!');
    }
?>