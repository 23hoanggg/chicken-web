<?php
include_once __DIR__ . "../../connect.php";

if (isset($_GET['query']) && trim($_GET['query']) !== "") {
    $query = htmlspecialchars($_GET['query'], ENT_QUOTES, 'UTF-8'); // Bảo vệ dữ liệu đầu vào

    // Câu truy vấn SQL
    $sql = "SELECT * FROM products WHERE product_name LIKE ? OR description LIKE ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $search = "%$query%";
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productName = $row['product_name'] ?? ""; // Đảm bảo không truyền null
                $imageUrl = $row['image_url'] ?? "";       // Đảm bảo không truyền null
                $description = $row['description'] ?? ""; // Đảm bảo không truyền null

                echo '<div class="product-search">';
                echo '<h2>' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '</h2>';
                echo '<img src="' . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '" />';
                echo '<p>' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p>Giá: ' . number_format($row['price'], 0, ',', '.') . ' VNĐ</p>';
                echo "<form action='add_to_cart.php' method='POST'>
                        <input type='hidden' name='product_id' value='" . htmlspecialchars($row['product_id'] ?? "", ENT_QUOTES, 'UTF-8') . "' />
                        <button type='submit' class='add-btn'>+</button>
                      </form>";
                echo '</div>';
            }
        } else {
            echo '<p>Không tìm thấy sản phẩm phù hợp.</p>';
        }

        $stmt->close();
    } else {
        echo '<p>Đã xảy ra lỗi trong quá trình truy vấn dữ liệu.</p>';
    }
} else {
    echo '<p>Vui lòng nhập từ khóa tìm kiếm.</p>';
}

$conn->close();
?>
