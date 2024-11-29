<?php
// error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

session_start();
include_once __DIR__ . "/../connect.php";
include 'functionProducts.php';
include 'add_to_cart.php';
include 'remove_from_cart.php';
include 'update_quantity.php';
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Bạn phải đăng nhập trước khi đặt hàng.');
          </script>";
    exit; // Ngăn người dùng chưa đăng nhập truy cập trang
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../fe/utils/footer.css">
    <link rel="stylesheet" href="../../fe/utils/header.css">
    <link rel="stylesheet" href="../../fe/utils/search.js">
    <link rel="stylesheet" href="../../fe/utils/search.css">
    <!-- <link rel="stylesheet" href="../../fe/utils/search.css"> -->
    <link rel="stylesheet" href="../../fe/contact/contact.css">
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">

    <style>
        body {
            font-family: "Quicksand", sans-serif;
            margin: 0;
            padding: 0;
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
            background-color: red;
            color: white;
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            /* border-radius: 5px; */
            transition: background-color 0.3s ease;
            /* float: right; */
            /* position: absolute; */
            /* left: 50%; */
            /* transform: translateX(-50%); */
            margin: 30px;
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
            /* border-radius: 5px; */
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
            /* align-items: center;
            gap: 10px; */
        }

        .quantity-btn {
            /* background-color: #007bff; */
            background-color: #ccc;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 16px;
            /* border-radius: 5px; */
            transition: background-color 0.3s ease;
        }

        .quantity-btn:hover {
            background-color: #ff4444;
        }

        input[type="text"] {
            width: 30px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #ccc;
            /* border-radius: 5px; */
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
    <div id="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-content">
                    <p></p>
                </div>
                <div class="topbar-hotline">
                    <a class="phone-num" href="tel:19009480">
                        <span class="circle-phone">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="text-phone">Hotline: 19009480</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <header id="site-header" class="main-header">
        <div class="header-mid">
            <div class="left-head"></div>
            <div class="wrap-logo">
                <a href="/otoke-chicken/fe/home/index.php">
                    <img src="https://theme.hstatic.net/1000242782/1000838257/14/logo.png?v=590" alt="" />
                </a>
            </div>
            <div class="header-wrap-icon">
                <?php
                // Kiểm tra trạng thái đăng nhập
                if (isset($_SESSION['email'])) {
                    // Nếu người dùng đã đăng nhập, cho phép truy cập thông tin tài khoản
                    echo '<button class="icon-account" aria-label="Tài khoản" title="Tài khoản">
                            <a href="/otoke-chicken/be/information-page/information/information.php">
                                <span class="account-menu" aria-hidden="true">
                                    <svg class="svg-account" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="510px"
                                        height="510px" viewBox="0 0 510 510" style="enable-background: new 0 0 510 510"
                                        xml:space="preserve">
                                        <g>
                                            <g id="account-circle">
                                                <path
                                                    d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                          </button>';
                } else {
                    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                    echo '<button class="icon-account" aria-label="Tài khoản" title="Tài khoản">
                            <a href="/otoke-chicken/be/authentication-page/handle-auth/login-page.php">
                                <span class="account-menu" aria-hidden="true">
                                    <svg class="svg-account" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="510px"
                                        height="510px" viewBox="0 0 510 510" style="enable-background: new 0 0 510 510"
                                        xml:space="preserve">
                                        <g>
                                            <g id="account-circle">
                                                <path
                                                    d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z">
                                                </path>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                          </button>';
                }
                ?>
                <button id="site-search-handle" class="icon-search" aria-label="Tìm kiếm" title="Tìm kiếm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                        <path fill="currentColor"
                            d="M23.957 41.77a18.02 18.02 0 0 0 10.477-3.376l11.109 11.11a2.658 2.658 0 0 0 1.898.773c1.524 0 2.625-1.172 2.625-2.672c0-.703-.234-1.359-.75-1.874L38.277 34.668c2.32-3.047 3.703-6.82 3.703-10.922c0-9.914-8.109-18.023-18.023-18.023c-9.937 0-18.023 8.109-18.023 18.023S14.02 41.77 23.957 41.77m0-3.891c-7.758 0-14.133-6.398-14.133-14.133c0-7.734 6.375-14.133 14.133-14.133c7.734 0 14.133 6.399 14.133 14.133c0 7.735-6.399 14.133-14.133 14.133" />
                    </svg>
                </button>
                <button id="site-cart-handle" class="icon-cart" aria-label="Open cart" title="Giỏ hàng">
                    <a href="/otoke-chicken/be/menu/cart.php">
                        <span class="cart-menu" aria-hidden="true">
                            <svg version="1.1" class="svg-cart" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                style="enable-background: new 0 0 64 64" xml:space="preserve">
                                <g>
                                    <g id="icon-cart">
                                        <path fill="currentColor"
                                            d="M58,8c-0.5,0-0.9,0.3-1,0.8l-8,33.2c-0.1,0.3-0.3,0.5-0.6,0.5H21.6c-0.3,0-0.5-0.2-0.6-0.5L12,8.8C11.9,8.3,11.5,8,11,8H4c-0.6,0-1,0.4-1,1s0.4,1,1,1h5l9.3,36.5c0.1,0.6,0.6,1,1.2,1h27.4c0.6,0,1.1-0.4,1.2-1L54,10h5c0.6,0,1-0.4,1-1S58.6,8,58,8z M16.5,45.5h31c0.6,0,1.1,0.4,1.2,1l1.9,7.6c0.1,0.6-0.3,1.2-0.9,1.2H47c-0.5,0-1-0.3-1.2-0.8l-1.9-7.6c-0.1-0.6,0.3-1.2,0.9-1.2z M16.5,51.5c0.6,0,1,0.4,1,1c0,0.6-0.4,1-1,1s-1-0.4-1-1C15.5,51.9,15.9,51.5,16.5,51.5z M47.5,51.5c0.6,0,1,0.4,1,1c0,0.6-0.4,1-1,1s-1-0.4-1-1C46.5,51.9,46.9,51.5,47.5,51.5z" />
                                    </g>
                                </g>
                            </svg>
                        </span>
                    </a>
                </button>
            </div>
        </div>
        <div class="menu">
            <div id="nav">
                <nav class="main-nav text-center">
                    <ul class="clearfix">
                        <li class="active">
                            <a href="/otoke-chicken/fe/home/index.php" title="TRANG CHỦ" class="menu-link"> TRANG CHỦ </a>
                        </li>
                        <li class="">
                            <a href="/otoke-chicken/fe/introduce/introduce.php" title="GIỚI THIỆU" class="menu-link">
                                GIỚI THIỆU
                            </a>
                        </li>
                        <li class="">
                            <a href="/otoke-chicken/be/menu/menu.php" title="MENU" class="menu-link"> MENU </a>
                        </li>
                        <li class="">
                            <a href="/otoke-chicken/fe/promotion/promotion.php" title="KHUYẾN MÃI" class="menu-link">
                                KHUYẾN MÃI
                            </a>
                        </li>
                        <li class="">
                            <a title="KHUYẾN MÃI" class="menu-link contact-button" id="contact-button">
                                LIÊN HỆ
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="contact-container">
        <ul class="list-contact">
                <li class="news-li">
                    <div>
                        <a href="/otoke-chicken/fe/contact/news/news.php" title="TRANG CHỦ" class="menu-link">
                            <img src="https://theme.hstatic.net/1000242782/1000838257/14/no_image.jpg?v=596" alt="">
                            Tin Tức
                        </a>
                    </div>
                </li>
                <li class="recruitment-li">
                    <div>
                        <a href="/otoke-chicken/fe/contact/recruitment/recruitment.php" title="TUYỂN DỤNG" class="menu-link">
                            <img src="https://theme.hstatic.net/1000242782/1000838257/14/no_image.jpg?v=596" alt="">
                            Tuyển Dụng
                        </a>
                    </div>
                </li>
                <li class="party-service-li">
                    <div>
                        <a href="/otoke-chicken/fe/contact/party-service/party-service.php" title="DỊCH VỤ TIỆC" class="menu-link">
                            <img src="https://theme.hstatic.net/1000242782/1000838257/14/no_image.jpg?v=596" alt="">
                            Dịch Vụ Tiệc
                        </a>
                    </div>
                </li>
                <li class="store-system-li">
                    <div>
                        <a href="/otoke-chicken/fe/promotion/promotion.php" title="KHUYẾN MÃI" class="menu-link">
                            <img src="https://theme.hstatic.net/1000242782/1000838257/14/no_image.jpg?v=596" alt="">
                            Hệ Thống Cửa Hàng
                        </a>
                    </div>
                </li>
                <li class="franchise-cooperation-li">
                    <div>
                        <a href="/otoke-chicken/fe/contact/franchise-cooperation/franchise-cooperation.php" title="Nhượng quyền thương hiệu" class="menu-link contact-button" id="contact-button">
                            <img src="https://theme.hstatic.net/1000242782/1000838257/14/no_image.jpg?v=596" alt="">
                            Nhượng Quyền Thương Hiệu
                        </a>
                    </div>

                </li>
            </ul>
        </div>
        <div class="search-container">
            <div class="search-text">
                <h1>Tìm kiếm sản phẩm</h1>
            </div>
            <div class="input-search-bar">
                <input type="text" placeholder="Nhập tên sản phẩm..." class="input-search-menu">
            </div>
        </div>
    </header>
    <div class="checkout">
        <h1>Giỏ Hàng Của Bạn</h1>
        <div class="cart-summary">
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
        <button class="checkout-btn" onclick="window.location.href='checkout.php'">THANH TOÁN</button>
        <button class="checkout-btn" onclick="placeOrder()">CẬP NHẬT</button>
        <a href="../menu/menu.php">Chọn sản phẩm trong menu</a>
    </div>
    <?php
    include '../../fe/utils/footer.php'
    ?>
    <script>
        // Các hàm JavaScript tương tự như bạn đã dùng
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
            // Gửi yêu cầu AJAX để xóa sản phẩm
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "remove_from_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Làm mới trang để cập nhật giỏ hàng
                    document.location.reload(); // Tự động làm mới trang
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
            xhr.open(" POST", "update_quantity.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var priceElement = document.getElementById('price-' + productId);
                    var pricePerUnit = parseFloat(priceElement.dataset.price);
                    priceElement.textContent = (pricePerUnit * quantity).toFixed(2).replace('.', ',') + " VNĐ";
                }
            };
            xhr.send("product_id=" + productId + " &quantity=" + quantity);
        }

        function placeOrder() {
            const cart = [];

            // Lặp qua các sản phẩm trong giỏ hàng
            document.querySelectorAll('.product-details').forEach((product) => {
                const productId = product.querySelector('.price').id.split('-')[1];
                const price = parseFloat(product.querySelector('.price').getAttribute('data-price'));
                const quantity = parseInt(product.querySelector(`#quantity-${productId}`).value);

                // Thêm sản phẩm vào giỏ hàng
                if (quantity > 0) { // Chỉ thêm sản phẩm có số lượng lớn hơn 0
                    cart.push({
                        id: productId,
                        price: price,
                        quantity: quantity
                    });
                }
            });

            // Kiểm tra nếu giỏ hàng trống
            if (cart.length === 0) {
                alert("Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm để đặt hàng.");
                return; // Dừng thực hiện nếu giỏ hàng trống
            }

            // Gửi dữ liệu qua AJAX nếu giỏ hàng không trống
            fetch('place_order.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `action=place_order&cart=${encodeURIComponent(JSON.stringify(cart))}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Thông báo kết quả
                    window.location.href = '/otoke-chicken/be/menu/checkout.php'; // Chuyển đến trang thanh toán
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
    <script src="../../fe/contact/contact.js"></script>
    <script src="../../fe/utils/search.js"></script>
    <script src="../../fe/home/final.js"></script>
</body>

</html>