<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);

    if (!$product_id || $product_id <= 0) {
        $_SESSION['error'] = "Dữ liệu không hợp lệ.";
        header("Location: giohang.php");
        exit();
    }

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['success'] = "Đã xóa sản phẩm khỏi giỏ hàng.";
    } else {
        $_SESSION['error'] = "Sản phẩm không tồn tại trong giỏ hàng.";
    }

    header("Location: giohang.php");
    exit();
}
?>
