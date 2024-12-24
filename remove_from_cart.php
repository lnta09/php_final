<?php
session_start();

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giohang";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra và lọc ID sản phẩm
    if (!isset($_POST['product_id']) || empty($_POST['product_id'])) {
        $_SESSION['error'] = "Sản phẩm không hợp lệ.";
        header("Location: giohang.php");
        exit();
    }

    $product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);

    if (!$product_id || $product_id <= 0) {
        $_SESSION['error'] = "ID sản phẩm không hợp lệ.";
        header("Location: giohang.php");
        exit();
    }

    // Xóa sản phẩm khỏi session giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    } else {
        $_SESSION['error'] = "Sản phẩm không tồn tại trong giỏ hàng.";
        header("Location: giohang.php");
        exit();
    }

    // Xóa sản phẩm khỏi cơ sở dữ liệu
    $sql = "DELETE FROM product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Đã xóa sản phẩm khỏi giỏ hàng và cơ sở dữ liệu.";
    } else {
        $_SESSION['error'] = "Không thể xóa sản phẩm khỏi cơ sở dữ liệu.";
    }

    $stmt->close();
    $conn->close();

    // Quay lại giỏ hàng
    header("Location: giohang.php");
    exit();
}
