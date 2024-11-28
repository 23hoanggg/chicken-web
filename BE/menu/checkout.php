<?php
session_start();
include_once __DIR__ . "../../connect.php";

// Kiểm tra xem giỏ hàng có tồn tại không
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    echo "<p class='empty-cart'>Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm trước khi thanh toán.</p>";
    exit;
}

// Truy vấn lấy order_id gần nhất (có thể là đơn hàng mới nhất hoặc bất kỳ đơn hàng nào có trạng thái 'completed')
$sql = "
    SELECT order_id 
    FROM orders 
    WHERE status = 'Pending'  -- Hoặc điều kiện khác nếu cần
    ORDER BY order_date DESC 
    LIMIT 1
";

$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p class='empty-cart'>Không tìm thấy đơn hàng nào.</p>";
    exit;
}

$order = $result->fetch_assoc();
$order_id = $order['order_id'];

// Truy vấn lấy thông tin sản phẩm trong đơn hàng
$sql = "
    SELECT oi.order_item_id, oi.quantity, oi.price, oi.total_price, p.product_id, p.product_name, p.image_url
    FROM order_items oi
    JOIN products p ON oi.product_id = p.product_id
    WHERE oi.order_id = $order_id
";

$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p class='empty-cart'>Không tìm thấy sản phẩm trong đơn hàng.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../fe/utils/footer.css">
    <link rel="stylesheet" href="../../fe/contact/contact.css">
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../../fe/utils/header.css">
    <style>
        body {
            font-family: "Quicksand", sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }

        .order-info {
            width: 100%;
        }

        h2,
        h3 {
            color: #444;
            text-align: center;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .order-table th,
        .order-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .order-table th {
            background-color: #f8f8f8;
            color: #555;
        }

        .order-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total {
            font-weight: bold;
            color: #d9534f;
            text-align: right;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .empty-cart {
            text-align: center;
            color: #d9534f;
            font-weight: bold;
            margin: 20px;
        }

        .payment-info {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* Lớp CSS chung cho tất cả các ô input */
        .input-text {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            font-size: 16px;
            color: #333;
        }

        /* Khi focus vào ô input */
        .input-text:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Kiểu chữ trong placeholder */
        .input-text::placeholder {
            font-style: italic;
            color: #aaa;
        }

        /* Lớp CSS cho các ô input có lỗi (nếu cần) */
        .input-text.error {
            border-color: #e74c3c;
        }

        /* Lớp CSS cho các ô input hợp lệ (nếu cần) */
        .input-text.valid {
            border-color: #2ecc71;
        }


        .button-checkout {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button-checkout:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include '../../fe/utils/header.php'
    ?>
    <div class="container">
        <div class="order-info">
            <h2>Thông tin đơn hàng</h2>
            <table class="order-table">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th>Ảnh sản phẩm</th>
                </tr>

                <?php
                $total = 0;
                while ($row = $result->fetch_assoc()) {
                    $product_name = htmlspecialchars($row["product_name"]);
                    $quantity = $row["quantity"];
                    $price = $row["price"];
                    $item_total = $row["total_price"];
                    $image_url = $row["image_url"];

                    $total += $item_total;
                    echo "<tr>
                        <td>$product_name</td>
                        <td>$quantity</td>
                        <td>" . number_format($price, 0, ",", ".") . " VNĐ</td>
                        <td>" . number_format($item_total, 0, ",", ".") . " VNĐ</td>
                        <td><img src='$image_url' alt='$product_name' class='product-image'></td>
                    </tr>";
                }
                ?>
            </table>
            <div class="back-to-cart">
                <a href="/otoke-chicken/be/menu/cart.php" class="btn">Cập nhật giỏ hàng</a>
            </div>
            <h3 class="total">Tổng tiền: <?php echo number_format($total, 0, ",", "."); ?> VNĐ</h3>
        </div>
    </div>

    <!-- Form thanh toán -->
    <div class="payment-info">
        <form action="process_payment.php" method="POST" autocomplete="off">
            <h2>Thông tin thanh toán</h2>

            <!-- Họ và tên -->
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" class="input-text" required placeholder="Nhập họ và tên" maxlength="100">
            </div>
            <!-- Địa chỉ giao hàng -->
            <div class="form-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" id="address" name="address" class="input-text" required placeholder="Nhập địa chỉ giao hàng" maxlength="200">
            </div>

            <!-- Số điện thoại -->
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" class="input-text" required placeholder="Nhập số điện thoại"
                    pattern="^\+?\d{10,15}$" title="Số điện thoại phải từ 10 đến 15 chữ số, có thể có dấu +">
            </div>
            <h3>Thông tin thẻ tín dụng</h3>

            <!-- Số thẻ -->
            <div class="form-group">
                <label for="card_number">Số thẻ:</label>
                <input type="text" id="card_number" name="card_number" class="input-text" required placeholder="Nhập số thẻ"
                    maxlength="16" pattern="\d{16}" title="Số thẻ phải gồm 16 chữ số">
            </div>

            <!-- Ngày hết hạn -->
            <div class="form-group">
                <label for="expiry_date">Ngày hết hạn (dd/mm/yyyy):</label>
                <input type="text" id="expiry_date" name="expiry_date" class="input-text" required placeholder="dd/mm/yyyy"
                    maxlength="7" pattern="^(0[1-9]|1[0-2])\/\d{4}$" title="Nhập ngày hết hạn theo định dạng MM/YYYY">
            </div>
            <!-- Mã CVV -->
            <div class="form-group">
                <label for="cvv">Mã CVV:</label>
                <input type="text" id="cvv" name="cvv" class="input-text" required placeholder="Nhập mã CVV" maxlength="3"
                    pattern="\d{3}" title="Mã CVV gồm 3 chữ số">
            </div>

            <!-- Nút thanh toán -->
            <button type="submit" class="button-checkout">Thanh toán</button>
        </form>
    </div>
    <?php
    include '../../fe/utils/footer.php'
    ?>
    <script src="../../fe/contact/contact.js"></script>
    <script src="../../fe/home/final.js"></script>
    <script src="../../fe/utils/search.js"></script>
</body>

</html>