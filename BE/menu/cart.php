<?php
// error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

session_start();
include_once __DIR__ . "/../connect.php";
include 'functionProducts.php';
include 'add_to_cart.php';
include 'remove_from_cart.php';
include 'update_quantity.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
    <style>
        /* Tổng thể */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Tiêu đề */
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #555;
        }

        /* Container chính */
        .checkout {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Tổng quan giỏ hàng */
        .cart-summary {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Nút thanh toán */
        .checkout-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #45a049;
        }

        /* Thông tin sản phẩm */
        .product-details {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.3s ease;
        }

        .product-details:hover {
            background-color: #f1f1f1;
        }

        /* Ảnh sản phẩm */
        .product-image img {
            max-width: 80px;
            height: auto;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        /* Thông tin sản phẩm */
        .product-info {
            flex-grow: 2;
            padding-left: 20px;
        }

        .product-info h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        /* Điều khiển số lượng */
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .quantity-btn:hover {
            background-color: #0056b3;
        }

        input[type="text"] {
            width: 50px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }

        /* Giá sản phẩm */
        .product-price {
            text-align: right;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        /* Nút xóa sản phẩm */
        .delete-btn {
            background-color: #ff4444;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        /* Phần khoảng cách khi không có sản phẩm */
        .cart-summary p {
            text-align: center;
            font-size: 16px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="checkout">
        <h1>Giỏ Hàng Của Bạn</h1>
        <div class="cart-summary">
            <button class="checkout-btn" onclick="window.location.href='checkout.php'">THANH TOÁN</button>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $cart_ids = array_column($cart, 'id');
                if (!empty($cart_ids)) {
                    $id_list = implode(',', array_map('intval', $cart_ids));
                    $sql = "SELECT product_id, product_name, description, price, image_url FROM products WHERE product_id IN ($id_list)";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($product = $result->fetch_assoc()) {
                            foreach ($cart as $cart_item) {
                                if ($cart_item['id'] == $product['product_id']) {
            ?>
                                    <div class="product-details" data-id="<?php echo $product['product_id']; ?>">
                                        <div class="product-image">
                                            <?php if (!empty($product['image_url'])): ?>
                                                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-info">
                                            <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                                            <div class="quantity-control">
                                                <button class="quantity-btn" onclick="updateQuantity(<?php echo $product['product_id']; ?>, 'decrease')">-</button>
                                                <input type="text" id="quantity-<?php echo $product['product_id']; ?>" value="<?php echo intval($cart_item['quantity']); ?>" readonly />
                                                <button class="quantity-btn" onclick="updateQuantity(<?php echo $product['product_id']; ?>, 'increase')">+</button>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <p class="price" id="price-<?php echo $product['product_id']; ?>" data-price="<?php echo number_format($product['price'], 2, '.', ''); ?>">
                                                <?php echo number_format($product['price'] * intval($cart_item['quantity']), 2, ',', '.'); ?> VNĐ
                                            </p>
                                            <button class="delete-btn" onclick="removeFromCart(<?php echo $product['product_id']; ?>)">XÓA</button>
                                        </div>
                                    </div>
            <?php
                                }
                            }
                        }
                    } else {
                        echo "Không tìm thấy sản phẩm trong cơ sở dữ liệu.";
                    }
                } else {
                    echo "Danh sách sản phẩm trong giỏ hàng không hợp lệ.";
                }
                $conn->close();
            } else {
                echo "Giỏ hàng của bạn trống.";
            }
            ?>
        </div>
    </div>

    <script>
        function fadeOutEffect(element) {
            var fadeTarget = element;
            var fadeEffect = setInterval(function() {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.1;
                } else {
                    clearInterval(fadeEffect);
                    fadeTarget.style.display = 'none';
                }
            }, 50);
        }

        function removeFromCart(productId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "remove_from_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var productElement = document.querySelector(`.product-details[data-id='${productId}']`);
                    fadeOutEffect(productElement);
                }
            };
            xhr.send("product_id=" + productId);
        }

        function updateQuantity(productId, action) {
            var quantityInput = document.getElementById('quantity-' + productId);
            var quantity = parseInt(quantityInput.value);
            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }
            quantityInput.value = quantity;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_quantity.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var priceElement = document.getElementById('price-' + productId);
                    var pricePerUnit = parseFloat(priceElement.dataset.price);
                    priceElement.textContent = (pricePerUnit * quantity).toFixed(2).replace('.', ',') + " VNĐ";
                }
            };
            xhr.send("product_id=" + productId + "&quantity=" + quantity);
        }
    </script>
</body>

</html>