<?php
session_start();

// Kiểm tra nếu giỏ hàng tồn tại và có nhận product_id và quantity
if (isset($_SESSION['cart']) && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        echo "Cập nhật thành công!";
    } else {
        echo "Sản phẩm không có trong giỏ hàng!";
    }
} else {
    // echo "Giỏ hàng không tồn tại hoặc dữ liệu không hợp lệ!";
}
