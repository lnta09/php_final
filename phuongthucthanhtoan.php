<?php
session_start();

// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "giohang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Khởi tạo biến để lưu thông báo
$message = '';

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'] ?? '';
    $order_id = 'DH' . time(); // Tạo mã đơn hàng unique
    
    // Lưu thông tin đơn hàng vào session
    $_SESSION['order_id'] = $order_id;
    $_SESSION['payment_method'] = $payment_method;
    
    // Hiển thị thông tin thanh toán tương ứng
    $show_payment_info = true;
}

// Lấy thông tin giỏ hàng từ session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$product_list = [];
$total = 0;

if (!empty($cart)) {
    $product_ids = implode(',', array_keys($cart));
    $sql = "SELECT id, name, price FROM product WHERE id IN ($product_ids)";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $quantity = $cart[$row['id']];
            $subtotal = $row['price'] * $quantity;
            $row['quantity'] = $quantity;
            $row['subtotal'] = $subtotal;
            $product_list[] = $row;
            $total += $subtotal;
        }
    }
}

$_SESSION['total'] = $total;

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .order-summary {
            margin-bottom: 30px;
        }
        .product-list {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .product-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .product-item:last-child {
            border-bottom: none;
        }
        .total-section {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .payment-methods {
            margin-top: 30px;
        }
        .payment-option {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .payment-option:hover {
            background: #f5f5f5;
        }
        .payment-option.selected {
            border-color: #2ecc71;
            background: #f7fff9;
        }
        .btn-proceed {
            background: #2ecc71;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
        }
        .btn-proceed:hover {
            background: #27ae60;
        }
        .payment-info {
            background: #f5f5f5;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .payment-info p {
            margin: 10px 0;
        }
        .copy-btn {
            background: #3498db;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 10px;
        }
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .bank-details {
            margin-top: 20px;
            background: white;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Xác nhận đơn hàng</h1>
        
        <?php if (isset($show_payment_info) && $show_payment_info): ?>
            <div class="success-message">
                <h3>Đơn hàng #<?php echo $_SESSION['order_id']; ?> đã được xác nhận!</h3>
                <p>Vui lòng thanh toán theo thông tin bên dưới</p>
            </div>
        <?php endif; ?>

        <!-- Phần tóm tắt đơn hàng -->
        <div class="order-summary">
            <h2>Sản phẩm đã chọn</h2>
            <div class="product-list">
                <?php foreach ($product_list as $product): ?>
                <div class="product-item">
                    <div class="product-info">
                        <strong><?php echo $product['name']; ?></strong>
                        <span>x <?php echo $product['quantity']; ?></span>
                    </div>
                    <div class="product-price">
                        <?php echo number_format($product['subtotal']); ?> VNĐ
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="total-section">
                <div class="total-row">
                    <span>Tạm tính:</span>
                    <strong><?php echo number_format($total); ?> VNĐ</strong>
                </div>
                <div class="total-row">
                    <span>Phí vận chuyển:</span>
                    <strong>Miễn phí</strong>
                </div>
                <div class="total-row">
                    <span>Tổng cộng:</span>
                    <strong><?php echo number_format($total); ?> VNĐ</strong>
                </div>
            </div>
        </div>

        <?php if (!isset($show_payment_info)): ?>
            <!-- Phần chọn phương thức thanh toán -->
            <div class="payment-methods">
                <h2>Chọn phương thức thanh toán</h2>
                <form method="POST" action="">
                    <div class="payment-option" onclick="selectPayment('bank')">
                        <input type="radio" name="payment_method" value="bank" id="bank">
                        <label for="bank">Chuyển khoản ngân hàng</label>
                    </div>
                    
                    <div class="payment-option" onclick="selectPayment('momo')">
                        <input type="radio" name="payment_method" value="momo" id="momo">
                        <label for="momo">Ví điện tử MoMo</label>
                    </div>
                    
                    <div class="payment-option" onclick="selectPayment('cod')">
                        <input type="radio" name="payment_method" value="cod" id="cod">
                        <label for="cod">Thanh toán khi nhận hàng (COD)</label>
                    </div>

                    <button type="submit" class="btn-proceed">Xác nhận đơn hàng</button>
                </form>
            </div>
        <?php else: ?>
            <!-- Hiển thị thông tin thanh toán -->
            <div class="payment-info">
                <h2>Thông tin thanh toán</h2>
                <?php if ($_SESSION['payment_method'] == 'bank'): ?>
                    <div class="bank-details">
                        <p><strong>Ngân hàng:</strong> Vietcombank</p>
                        <p>
                            <strong>Số tài khoản:</strong> 1234567890
                            <button class="copy-btn" onclick="copyToClipboard('1234567890')">Sao chép</button>
                        </p>
                        <p>
                            <strong>Chủ tài khoản:</strong> NGUYEN VAN A
                            <button class="copy-btn" onclick="copyToClipboard('NGUYEN VAN A')">Sao chép</button>
                        </p>
                        <p>
                            <strong>Số tiền:</strong> <?php echo number_format($total); ?> VNĐ
                            <button class="copy-btn" onclick="copyToClipboard('<?php echo $total; ?>')">Sao chép</button>
                        </p>
                        <p>
                            <strong>Nội dung chuyển khoản:</strong> <?php echo $_SESSION['order_id']; ?>
                            <button class="copy-btn" onclick="copyToClipboard('<?php echo $_SESSION['order_id']; ?>')">Sao chép</button>
                        </p>
                    </div>
                <?php elseif ($_SESSION['payment_method'] == 'momo'): ?>
                    <div class="qr-code">
                        <p>Quét mã QR để thanh toán qua Momo</p>
                        <img src="/api/placeholder/200/200" alt="Mã QR MoMo">
                        <p>Hoặc chuyển khoản đến số điện thoại: 0123456789</p>
                    </div>
                <?php else: ?>
                    <p>Bạn đã chọn thanh toán khi nhận hàng (COD)</p>
                    <p>Vui lòng chuẩn bị số tiền <?php echo number_format($total); ?> VNĐ khi nhận hàng</p>
                <?php endif; ?>
            </div>

            <button onclick="window.location.href='index.php'" class="btn-proceed">Quay về trang chủ</button>
        <?php endif; ?>
    </div>

    <script>
        function selectPayment(method) {
            document.querySelectorAll('.payment-option').forEach(option => {
                option.classList.remove('selected');
            });
            document.querySelector(`#${method}`).closest('.payment-option').classList.add('selected');
            document.querySelector(`#${method}`).checked = true;
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Đã sao chép vào clipboard!');
            }).catch(err => {
                console.error('Không thể sao chép: ', err);
            });
        }
    </script>
</body>
</html>