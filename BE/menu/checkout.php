<?php
session_start();

// Kiểm tra xem giỏ hàng có tồn tại không
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    echo "Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm trước khi thanh toán.";
    exit;
}

// Tính tổng tiền
$total = 0;
echo "<h2>Thông tin giỏ hàng</h2>";
echo "<table>";
echo "<tr><th>Tên sản phẩm</th><th>Số lượng</th><th>Giá</th><th>Tổng</th></tr>";

foreach ($_SESSION["cart"] as $item) {
    $itemTotal = $item["price"] * $item["quantity"];
    $total += $itemTotal;
    echo "<tr>
            <td>" . htmlspecialchars($item["name"]) . "</td>
            <td>" . htmlspecialchars($item["quantity"]) . "</td>
            <td>" . htmlspecialchars($item["price"]) . " VNĐ</td>
            <td>" . htmlspecialchars($itemTotal) . " VNĐ</td>
            </tr>";
}

echo "</table>";
echo "<h3>Tổng tiền: " . htmlspecialchars($total) . " VNĐ</h3>";

// Thêm nút thanh toán
echo '<form method="POST" action="process_payment.php">';
echo '<button type="submit" class="btn">Thanh toán</button>';
echo '</form>';
