<?php 
    require('../model/m_user.php');

    $token = $_GET['token'];
    $new_user = new User();
    $this_user = $new_user->exist_token($token);
    $_SESSION['email'] = $this_user['email'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if($this_user === null){
        die('token not found');
    }
    elseif(strtotime($this_user['token_expiry']) <= time()){
        die('token has expired');
    }else{
        header("Location:../changePassword.php");
    }
?>