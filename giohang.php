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
$total = 0; // Khởi tạo biến tổng cộng

if (!empty($cart)) {
    $product_ids = implode(',', array_keys($cart));
    $sql = "SELECT id, name, price FROM product WHERE id IN ($product_ids)";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_list[] = $row;
            $total += $row['price'] * $cart[$row['id']];
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
        margin: 0;
        background-color: #f8f8f8;
    }
    .container {
        max-width: 1200px;
        margin: 20px auto;
        display: flex;
        gap: 20px;
    }
    .cart-items {
        flex: 3;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .cart-summary {
        flex: 1;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        height: auto;
        text-align: center;
    }
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f9f9f9;
    }
    .cart-summary p {
        margin: 10px 0;
        font-size: 18px;
        color: #333;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #2ecc71;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Danh sách sản phẩm -->
        <div class="cart-items">
            <h1>Giỏ hàng</h1>
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
                    <?php if (empty($cart)): ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">Giỏ hàng của bạn đang trống.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($product_list as $product): ?>
                            <tr>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo number_format($product['price']); ?> VNĐ</td>
                                <td>
                                    <div class="quantity-control">
                                        <button>-</button>
                                        <input type="number" value="<?php echo $cart[$product['id']]; ?>" min="1">
                                        <button>+</button>
                                    </div>
                                </td>
                                <td><?php echo number_format($product['price'] * $cart[$product['id']]); ?> VNĐ</td>
                                <td>
                                    <form action="remove_from_cart.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Tóm tắt giỏ hàng -->
        <div class="cart-summary">
            <h2>Tóm tắt giỏ hàng</h2>
            <p><strong>Tạm tính:</strong> <?php echo number_format($total); ?> VNĐ</p>
            <p><strong>Giao hàng:</strong> Miễn phí</p>
            <p><strong>Tổng cộng:</strong> <?php echo number_format($total); ?> VNĐ</p>
            <a href="phuongthucthanhtoan.php" class="btn">Tiến hành thanh toán</a>
        </div>
    </div>
</body>
</html>
