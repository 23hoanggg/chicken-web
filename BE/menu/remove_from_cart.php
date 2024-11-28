<?php
// session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Kiểm tra xem giỏ hàng có tồn tại không
    if (isset($_SESSION['cart'])) {
        // Lặp qua giỏ hàng và tìm sản phẩm để xóa
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $product_id) {
                unset($_SESSION['cart'][$key]); // Xóa sản phẩm khỏi giỏ hàng
                break;
            }
        }
    }
}
