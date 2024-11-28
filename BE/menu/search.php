<?php
include_once __DIR__ . "../../connect.php";


if (isset($_GET['query']) && !empty(trim($_GET['query']))) {
    $query = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8'); // Bảo vệ dữ liệu đầu vào

    // Câu truy vấn SQL
    $sql = "SELECT * FROM products WHERE product_name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);
    $search = "%$query%";
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    // Trả về kết quả
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-search">';
            echo '<h2>' . htmlspecialchars($row['product_name']) . '</h2>';
            echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['product_name']) . '" />';
            echo '<p>' . htmlspecialchars($row['description']) . '</p>';
            echo '<p>Giá: ' . number_format($row['price'], 2, ',', '.') . ' VNĐ</p>';
            // echo '<button onclick="addToCart(' . $row['product_id'] . ')">Thêm vào giỏ hàng</button>';
            echo "<form action='add_to_cart.php' method='POST'>
        <input type='hidden' name='product_id' value='" . htmlspecialchars($row['product_id']) . "' />
        <button type='submit' class='add-btn'>+</button>
        </form>";
            echo '</div>';
        }
    } else {
        echo '<p>Không tìm thấy sản phẩm phù hợp.</p>';
    }
} else {
    echo '<p>Vui lòng nhập từ khóa tìm kiếm.</p>';
}
