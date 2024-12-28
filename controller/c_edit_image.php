<?php 
    require('../model/m_image.php');

    if(isset($_POST)){
        $id = $_POST['id'];
        $product_id = $_POST['product_id'];

        $this_image = new Image();
        $this_image->edit_image($id, $product_id);
        header('Location: ../admin/list_image.php');
    }else{
        die('something fail');
    }
?>