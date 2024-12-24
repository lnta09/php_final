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

// Kiểm tra session giỏ hàng
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Lấy danh sách sản phẩm
$cart = $_SESSION['cart'];
$product_list = [];

if (!empty($cart)) {
    $product_ids = implode(',', array_keys($cart));
    $sql = "SELECT id, name, price FROM product WHERE id IN ($product_ids)";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_list[] = $row;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f9f9f9;
    }
    .cart-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        gap: 20px;
    }
    .cart-items {
        flex: 3;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .cart-summary {
        flex: 1;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        height: auto;
        min-height: 400px;
    }
    h1 {
        color: #333;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f4f4f4;
        text-align: left;
    }
    td {
        text-align: center;
    }
    .quantity-control {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .quantity-control input {
        width: 40px;
        text-align: center;
    }
    .cart-summary p {
        margin: 20px 0;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        color: #fff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-home {
        background-color: #f9f9f9;
        color: #333;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .btn-home img {
        width: 30px;
        height: 30px;
    }
    .btn-primary {
        background-color: #3498db;
    }
    .btn-primary:hover {
        background-color: #2980b9;
    }
    .btn-danger {
        background-color: #e74c3c;
    }
    .btn-danger:hover {
        background-color: #c0392b;
    }
</style>
</head>
<body>
    <!-- Hiển thị icon trang chủ -->
    <a href="index.php" class="btn">
        <img src="https://cdn-icons-png.flaticon.com/128/10740/10740594.png" width="30" height="30" alt="Trang chủ">
    </a>

    <h1>Giỏ hàng</h1>
    <div class="cart-container">
        <!-- Danh sách sản phẩm -->
        <div class="cart-items">
            <?php if (empty($cart)): ?>
                <p>Giỏ hàng của bạn đang trống.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($product_list as $product):
                            $id = $product['id'];
                            $quantity = $cart[$id];
                            $subtotal = $product['price'] * $quantity;
                            $total += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo number_format($product['price']); ?> VNĐ</td>
                                <td>
                                    <div class="quantity-control">
                                        <button>-</button>
                                        <input type="number" value="<?php echo $quantity; ?>" min="1">
                                        <button>+</button>
                                    </div>
                                </td>
                                <td><?php echo number_format($subtotal); ?> VNĐ</td>
                                <td>
                                    <form action="remove_from_cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Tổng cộng -->
        <div class="cart-summary">
            <h2>Tóm tắt giỏ hàng</h2>
            <p><strong>Tạm tính:</strong> <?php echo number_format($total); ?> VNĐ</p>
            <p><strong>Giao hàng:</strong> Miễn phí</p>
            <p><strong>Tổng cộng:</strong> <?php echo number_format($total); ?> VNĐ</p>
            <a href="phuongthucthanhtoan.php" class="btn btn-primary">Tiến hành thanh toán</a>
        </div>
    </div>
</body>
</html>
