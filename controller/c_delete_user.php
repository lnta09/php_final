<?php
    require('../model/m_user.php');

    if(isset($_POST['email'])){
        $email = $_POST['email'];

        $new_user = new User();
        $this_user = $new_user->delete_user($email);
        header('Location: ../admin/list_user.php');
    }else{
        die('Something fail!');
    }
?>