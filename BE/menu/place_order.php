<?php
// session_start();
// include 'db_connection.php'; // Kết nối đến cơ sở dữ liệu

// // Nhận dữ liệu từ yêu cầu
// $data = json_decode(file_get_contents('php://input'), true);
// $cart = $data['cart'];
// $user_id = $_SESSION['user_id']; // Giả sử bạn đã lưu ID người dùng trong session

// if (!empty($cart) && $user_id) {
//     // 1. Tính tổng số tiền cho đơn hàng
//     $total_amount = 0;
//     foreach ($cart as $item) {
//         $total_amount += $item['quantity'] * $item['price']; // Tính tổng tiền
//     }

//     // 2. Thêm đơn hàng vào bảng orders
//     $sql_order = "INSERT INTO orders (user_id, total_amount) VALUES ($user_id, $total_amount)";
//     if ($conn->query($sql_order) === TRUE) {
//         $order_id = $conn->insert_id; // Lấy ID của đơn hàng vừa tạo

//         // 3. Thêm các sản phẩm vào bảng order_items
//         foreach ($cart as $item) {
//             $product_id = intval($item['id']);
//             $quantity = intval($item['quantity']);
//             $price = floatval($item['price']);

//             // Thêm sản phẩm vào bảng order_items
//             $sql_order_item = "INSERT INTO order_items (order_id, product_id, quantity, price) 
//                                 VALUES ($order_id, $product_id, $quantity, $price)";
//             $conn->query($sql_order_item);
//         }

//         // Trả về kết quả thành công
//         echo json_encode(['success' => true, 'order_id' => $order_id]);
//     } else {
//         echo json_encode(['success' => false, 'message' => 'Lỗi khi tạo đơn hàng.']);
//     }
// } else {
//     echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống hoặc người dùng không hợp lệ.']);
// }

// // Đóng kết nối
// $conn->close();
?>

<?php
session_start();
include_once __DIR__ . "/../connect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'place_order') {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $total_amount = 0;

        // Lấy danh sách product_id từ giỏ hàng
        $product_ids = array_column($cart, 'id');

        // Chuyển danh sách ID thành chuỗi để sử dụng trong SQL
        $id_list = implode(',', array_map('intval', $product_ids));

        // Truy vấn cơ sở dữ liệu để lấy giá sản phẩm
        $sql = "SELECT product_id, price FROM products WHERE product_id IN ($id_list)";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $prices = [];
            while ($row = $result->fetch_assoc()) {
                $prices[$row['product_id']] = $row['price'];
            }

            // Tính tổng tiền từ giỏ hàng
            foreach ($cart as $item) {
                if (isset($prices[$item['id']])) {
                    $total_amount += $prices[$item['id']] * $item['quantity'];
                } else {
                    die("Không tìm thấy sản phẩm ID: " . $item['id']);
                }
            }

            // Chèn dữ liệu vào bảng orders
            $stmt = $conn->prepare("INSERT INTO orders (user_id, total_amount) VALUES (?, ?)");
            if ($stmt) {
                $user_id = null; // Nếu chưa có user, đặt NULL
                $stmt->bind_param("id", $user_id, $total_amount);
                $stmt->execute();
                $order_id = $stmt->insert_id; // Lấy ID đơn hàng vừa tạo
                $stmt->close();

                echo "Đơn hàng đã được tạo thành công. Mã đơn hàng: $order_id";

                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);
            } else {
                die("Lỗi khi chèn vào bảng orders: " . $conn->error);
            }
        } else {
            die("Không tìm thấy sản phẩm nào trong cơ sở dữ liệu.");
        }
    } else {
        echo "Giỏ hàng của bạn trống.";
    }
}
?>




