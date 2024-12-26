<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f8f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .payment-container {
            width: 100%;
            max-width: 800px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            overflow: hidden;
            margin: 20px;
        }

        .price-section {
            background: #67B7D1;
            color: white;
            padding: 40px;
            width: 40%;
            position: relative;
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0 100%);
        }

        .price-section h2 {
            font-size: 2em;
            margin: 0;
        }

        .price-section p {
            margin: 10px 0;
            opacity: 0.9;
        }

        .form-section {
            padding: 40px;
            width: 60%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #666;
            margin-bottom: 5px;
            font-size: 0.9em;
            text-transform: uppercase;
        }

        .bank-info {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .bank-info p {
            margin: 10px 0;
            color: #333;
            font-size: 1.1em;
        }

        .bank-info strong {
            color: #2c3e50;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            margin-bottom: 15px;
        }

        .copy-button {
            background: #3498db;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            margin-left: 10px;
        }

        .copy-button:hover {
            background: #2980b9;
        }

        .submit-button {
            background: #2ecc71;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 6px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 20px;
        }

        .submit-button:hover {
            background: #27ae60;
        }

        .note {
            font-size: 0.9em;
            color: #666;
            margin-top: 15px;
            text-align: center;
        }
    </style>
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Đã sao chép!');
            });
        }

        function updatePaymentMethod() {
            var method = document.getElementById('payment_method').value;
            var bankInfo = document.getElementById('bank-info');
            var cardInfo = document.getElementById('card-info');

            if (method === 'direct_transfer') {
                bankInfo.style.display = 'block';
                cardInfo.style.display = 'none';
            } else {
                bankInfo.style.display = 'none';
                cardInfo.style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <div class="payment-container">
        <div class="price-section">
            <h2>Tổng thanh toán</h2>
            <?php
            session_start();
            $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
            ?>
            <div class="total-amount"><?php echo number_format($total); ?> VNĐ</div>
            <p>Thanh toán an toàn & bảo mật</p>
        </div>

        <div class="form-section">
            <form action="handle_payment.php" method="POST">
                <div class="form-group">
                    <label>Phương thức thanh toán</label>
                    <select id="payment_method" name="payment_method" onchange="updatePaymentMethod()">
                        <option value="direct_transfer" selected>Chuyển khoản trực tiếp</option>
                        <option value="card">Thẻ tín dụng/ghi nợ</option>
                        <option value="momo">Ví MoMo</option>
                    </select>
                </div>

                <div id="bank-info" class="bank-info">
                    <h3>Thông tin chuyển khoản</h3>
                    <p><strong>Ngân hàng:</strong> Agribank</p>
                    <p>
                        <strong>Số tài khoản:</strong> 123456789
                        <button type="button" class="copy-button" onclick="copyToClipboard('123456789')">
                            Sao chép
                        </button>
                    </p>
                    <p>
                        <strong>Chủ tài khoản:</strong> HOAI AN
                        <button type="button" class="copy-button" onclick="copyToClipboard('HOAI AN')">
                            Sao chép
                        </button>
                    </p>
                    <p><strong>Nội dung chuyển khoản:</strong> Thanh toan don hang #<?php echo rand(10000, 99999); ?></p>
                    <div class="note">
                        * Vui lòng chuyển khoản đúng số tiền và nội dung để đơn hàng được xử lý nhanh nhất
                    </div>
                </div>

                <div id="card-info" style="display: none;">
                    <!-- Form thông tin thẻ ở đây -->
                </div>

                <button type="submit" class="submit-button">XÁC NHẬN THANH TOÁN</button>
            </form>
        </div>
    </div>
</body>
</html>