<!-- phươngthucthanhtoan.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phương thức thanh toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .payment-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        select, input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }
        .details {
            display: none; /* Hidden by default */
            margin-top: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
    <script>
        // JavaScript để hiển thị thông tin chi tiết khi chọn phương thức thanh toán
        function showDetails() {
            var method = document.getElementById("payment_method").value;
            var details = document.querySelectorAll('.details');

            // Ẩn tất cả chi tiết
            details.forEach(function(detail) {
                detail.style.display = 'none';
            });

            // Hiển thị thông tin chi tiết tương ứng
            if (method) {
                document.getElementById(method).style.display = 'block';
            }
        }
    </script>
</head>
<body>

    <h1>Phương thức thanh toán</h1>
    <div class="payment-container">
        <form action="handle_payment.php" method="POST">
            <div class="form-group">
                <label for="payment_method">Chọn phương thức thanh toán</label>
                <select id="payment_method" name="payment_method" onchange="showDetails()">
                    <option value="">-- Chọn phương thức --</option>
                    <option value="direct_transfer">Chuyển khoản trực tiếp</option>
                    <option value="atm">Thanh toán ATM</option>
                    <option value="cash_on_delivery">Sau khi nhận hàng</option>
                    <option value="installment">Mua trả góp</option>
                </select>
            </div>

            <!-- Details for Direct Transfer -->
            <div id="direct_transfer" class="details">
                <label for="stk">Số tài khoản của shop:</label>
                <input type="text" id="stk" value="1234567890" readonly>
            </div>

            <!-- Details for ATM -->
            <div id="atm" class="details">
                <label for="atm_info">Hướng dẫn thanh toán qua ATM:</label>
                <input type="text" value="Chọn ngân hàng và thực hiện thanh toán qua ATM" readonly>
            </div>

            <!-- Details for Cash on Delivery -->
            <div id="cash_on_delivery" class="details">
                <label for="cash_info">Giao hàng và thanh toán khi nhận hàng</label>
                <input type="text" value="Thanh toán khi nhận hàng tại địa chỉ giao hàng" readonly>
            </div>

            <!-- Details for Installment -->
            <div id="installment" class="details">
                <label for="installment_info">Hướng dẫn mua trả góp:</label>
                <input type="text" value="Liên hệ bộ phận hỗ trợ để biết chi tiết trả góp" readonly>
            </div>

            <button type="submit" class="btn">Thanh toán</button>
        </form>
    </div>

</body>
</html>
