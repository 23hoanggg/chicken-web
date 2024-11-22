<?php
include_once __DIR__ . "/../connect.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// session_destroy();
// echo "<pre>";
// echo "Session trước khi thêm:";
// print_r($_SESSION);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $product_id = $_POST["product_id"];
    $quantity = isset($_POST["quantity"]) ? (int)$_POST["quantity"] : 1;

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($item); // Giải phóng tham chiếu

    // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
    if (!$found) {
        $_SESSION['cart'][] =
            [
                "id" => $product_id,
                "quantity" => $quantity
            ];
    }

    // echo "Session sau khi thêm:";
    // print_r($_SESSION);

    header("Location: menu.php");
    exit;
} else {
    // echo "Không có sản phẩm hợp lệ để thêm vào giỏ hàng.";
}
