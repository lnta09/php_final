<?php
    require('../model/m_product.php');

    session_start();

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];

    $new_product = new Product();
    $new_product->create_1_product($name, $description, $price, $category_id, $quantity);

    header("Location: ../admin/list_product.php");
?>

