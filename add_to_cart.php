<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Khởi tạo giỏ hàng nếu chưa có
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    // Thêm hoặc cập nhật số lượng sản phẩm trong giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++; // Tăng số lượng nếu sản phẩm đã có trong giỏ
    } else {
        $_SESSION['cart'][$product_id] = 1; // Thêm sản phẩm mới với số lượng là 1
    }
}

// Chuyển hướng về trang trước
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>