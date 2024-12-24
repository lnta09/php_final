<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra đăng nhập
    if (!isset($_SESSION['loginUSER'])) {
        $_SESSION['error'] = "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng";
        header("Location: signin.php");
        exit();
    }

    // Validate input
    if (!isset($_POST['product_id']) || empty($_POST['product_id'])) {
        $_SESSION['error'] = "Sản phẩm không hợp lệ";
        header("Location: index.php");
        exit();
    }

    $product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);
    $quantity = isset($_POST['quantity']) ? filter_var($_POST['quantity'], FILTER_VALIDATE_INT) : 1;

    // Kiểm tra product_id và quantity hợp lệ
    if (!$product_id || $product_id <= 0) {
        $_SESSION['error'] = "ID sản phẩm không hợp lệ";
        header("Location: index.php");
        exit();
    }

    if (!$quantity || $quantity <= 0) {
        $_SESSION['error'] = "Số lượng phải lớn hơn 0";
        header("Location: index.php");
        exit();
    }

    // Khởi tạo giỏ hàng nếu chưa có
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Thêm hoặc cập nhật sản phẩm trong giỏ
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    $_SESSION['success'] = "Đã thêm sản phẩm vào giỏ hàng";
    header("Location: giohang.php");
    exit();
}
?>