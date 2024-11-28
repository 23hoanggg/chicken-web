<?php
session_start();  // Đảm bảo đã khởi tạo session trước khi sử dụng
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;  // Kiểm tra xem có user_id trong session không

require_once __DIR__ . "../../connect.php"; // Kết nối cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'place_order') {
    if (isset($_POST['cart']) && !empty($_POST['cart'])) {
        $cart = json_decode($_POST['cart'], true); // Giải mã JSON từ client
        if (empty($cart)) {
            echo "Giỏ hàng của bạn trống.";
            exit;  // Dừng xử lý nếu giỏ hàng trống
        }

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            die("Bạn phải đăng nhập trước khi đặt hàng.");
        }

        $total_amount = 0;
        foreach ($cart as $item) {
            if (isset($item['price'], $item['quantity'])) {
                $total_amount += floatval($item['price']) * intval($item['quantity']);
            } else {
                die("Dữ liệu giỏ hàng không hợp lệ.");
            }
        }

        // Tạo đơn hàng mới
        $stmt_order = $conn->prepare("INSERT INTO orders (user_id, total_amount, created_at) VALUES (?, ?, NOW())");
        if ($stmt_order) {
            $stmt_order->bind_param("id", $user_id, $total_amount);
            $stmt_order->execute();
            $order_id = $stmt_order->insert_id;  // Lấy ID của đơn hàng mới tạo
            $stmt_order->close();

            // Thêm chi tiết sản phẩm vào bảng order_items
            $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
            if ($stmt_item) {
                foreach ($cart as $item) {
                    $product_id = intval($item['id']);  // ID sản phẩm
                    $quantity = intval($item['quantity']);  // Số lượng sản phẩm
                    $price = floatval($item['price']);  // Giá tại thời điểm đặt hàng

                    // Thêm sản phẩm vào bảng order_items
                    $stmt_item->bind_param("iiid", $order_id, $product_id, $quantity, $price);
                    $stmt_item->execute();
                }
                $stmt_item->close();

                echo "Đơn hàng đã được tạo thành công. Hãy kiểm tra giỏ hàng của bạn!";
            } else {
                die("Lỗi khi chèn vào bảng order_items: " . $conn->error);
            }
        } else {
            die("Lỗi khi chèn vào bảng orders: " . $conn->error);
        }
    } else {
        echo "Giỏ hàng của bạn trống.";
    }
}
