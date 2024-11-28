<?php
include_once __DIR__ . "../../connect.php";


// Hàm thực hiện truy vấn và trả về kết quả
function doQuery($conn, $sql, $params = [])
{
    $stmt = $conn->prepare($sql);

    // Nếu có tham số, bind chúng vào câu truy vấn
    if (!empty($params)) {
        $stmt->bind_param(...$params);
    }

    // Thực thi và kiểm tra lỗi
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error; // Hiển thị lỗi
        return null;
    }

    return $stmt->get_result(); // Trả về kết quả truy vấn
}

// Hàm hiển thị sản phẩm
function displayProducts($conn, $type)
{
    $output = ""; // Biến lưu trữ HTML sản phẩm

    $sql = "SELECT * FROM products WHERE Type = ?";
    $result = doQuery($conn, $sql, ["i", $type]); // Truyền tham số với kiểu 'i' (integer)

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
            <div class='product'>
                <div class='img-product'>
                    <img src='<?= htmlspecialchars($row['image_url']) ?>' alt='<?= htmlspecialchars($row['product_name']) ?>' />
                </div>
                <div class='product-info'>
                    <p><?= htmlspecialchars($row['product_name']) ?></p>
                    <span><?= number_format($row['price'], 0, ',', '.') ?>₫</span>
                </div>
                <form action='add_to_cart.php' method='POST'>
                    <input type='hidden' name='product_id' value='<?= htmlspecialchars($row['product_id']) ?>' />
                    <button type='submit' class='add-btn'>+</button>
                </form>
                <!-- <button class='add-btn' data-product-id='<?= htmlspecialchars($row['product_id']) ?>'>+</button> -->
            </div>
<?php
        }
    } else {
        echo "<p>Không có sản phẩm nào trong bảng.</p>";
    }
}
?>