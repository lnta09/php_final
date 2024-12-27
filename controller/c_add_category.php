<?php 
    require('../model/m_category.php');

    if(isset($_POST)){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $new_category = new Category();
        $new_category->create_1_category($name, $description);

        header('Location:../admin/list_category.php');
    }else{
        die('Something wrong!');
    }
?>