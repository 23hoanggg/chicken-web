<?php
session_start();

// Kiểm tra giỏ hàng
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    echo "Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm trước khi thanh toán.";
    exit;
}

// Nhận thông tin thanh toán từ form
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];

// Xác thực thông tin (cần thêm logic kiểm tra)
if (empty($name) || empty($address) || empty($phone) || empty($card_number) || empty($expiry_date) || empty($cvv)) {
    echo "Vui lòng điền đầy đủ thông tin.";
    exit;
}

// Gọi API của cổng thanh toán để xử lý giao dịch
// Đây là một ví dụ giả định, bạn cần thay thế bằng API thực tế của cổng thanh toán
$payment_success = true; // Giả sử thanh toán thành công

if ($payment_success) {
    echo "<script>
            alert('Thanh toán thành công!');
            window.location.href = '/otoke-chicken/fe/home/index.php'; 
            </script>";
    unset($_SESSION["cart"]); // Xóa giỏ hàng
} else {
    echo "Thanh toán không thành công. Vui lòng thử lại.";
}
