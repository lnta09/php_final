<?php
    require('../model/m_image.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $this_image = new Image();
        $this_image->delete_image($id);
        header('Location: ../admin/list_image.php');
    }else{
        die('Something fail!');
    }
?>