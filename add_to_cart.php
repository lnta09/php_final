<?php
session_start();
require_once("model/m_product.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    
    // Kiểm tra session giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Thêm hoặc tăng số lượng sản phẩm
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
    
    // Chuyển hướng về trang giỏ hàng
    header('Location: giohang.php');
    exit();
}
?>