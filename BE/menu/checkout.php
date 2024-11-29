<?php
session_start();
include_once __DIR__ . "../../connect.php";
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if ($user_id == null) { //
    header("Location: ../authentication-page/handle-auth/login-page.php");
    exit();
}
// Kiểm tra xem giỏ hàng có tồn tại không
if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
    echo "<p class='empty-cart'>Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm trước khi thanh toán.</p>";
    exit;
}

// Truy vấn lấy order_id gần nhất (có thể là đơn hàng mới nhất hoặc bất kỳ đơn hàng nào có trạng thái 'completed')
$sql = "
    SELECT order_id 
    FROM orders 
    WHERE status = 'Pending'  -- Hoặc điều kiện khác nếu cần
    ORDER BY order_date DESC 
    LIMIT 1
";

$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p class='empty-cart'>Không tìm thấy đơn hàng nào.</p>";
    exit;
}

$order = $result->fetch_assoc();
$order_id = $order['order_id'];

// Truy vấn lấy thông tin sản phẩm trong đơn hàng
$sql = "
    SELECT oi.order_item_id, oi.quantity, oi.price, oi.total_price, p.product_id, p.product_name, p.image_url
    FROM order_items oi
    JOIN products p ON oi.product_id = p.product_id
    WHERE oi.order_id = $order_id
";

$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p class='empty-cart'>Không tìm thấy sản phẩm trong đơn hàng.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đơn hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../fe/utils/footer.css">
    <link rel="stylesheet" href="../../fe/contact/contact.css">
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../../fe/utils/header.css">
    <style>
        body {
            font-family: "Quicksand", sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
        }

        .order-info {
            width: 100%;
        }

        h2,
        h3 {
            color: #444;
            text-align: center;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .order-table th,
        .order-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .order-table th {
            background-color: #f8f8f8;
            color: #555;
        }

        .order-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total {
            font-weight: bold;
            color: #d9534f;
            text-align: right;
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .empty-cart {
            text-align: center;
            color: #d9534f;
            font-weight: bold;
            margin: 20px;
        }

        .payment-info {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* Lớp CSS chung cho tất cả các ô input */
        .input-text {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            font-size: 16px;
            color: #333;
        }

        /* Khi focus vào ô input */
        .input-text:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Kiểu chữ trong placeholder */
        .input-text::placeholder {
            font-style: italic;
            color: #aaa;
        }

        /* Lớp CSS cho các ô input có lỗi (nếu cần) */
        .input-text.error {
            border-color: #e74c3c;
        }

        /* Lớp CSS cho các ô input hợp lệ (nếu cần) */
        .input-text.valid {
            border-color: #2ecc71;
        }


        .button-checkout {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button-checkout:hover {
            background-color: #0056b3;
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
    <div class="container">
        <div class="order-info">
            <h2>Thông tin đơn hàng</h2>
            <table class="order-table">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th>Ảnh sản phẩm</th>
                </tr>

                <?php
                $total = 0;
                while ($row = $result->fetch_assoc()) {
                    $product_name = htmlspecialchars($row["product_name"]);
                    $quantity = $row["quantity"];
                    $price = $row["price"];
                    $item_total = $row["total_price"];
                    $image_url = $row["image_url"];

                    $total += $item_total;
                    echo "<tr>
                        <td>$product_name</td>
                        <td>$quantity</td>
                        <td>" . number_format($price, 0, ",", ".") . " VNĐ</td>
                        <td>" . number_format($item_total, 0, ",", ".") . " VNĐ</td>
                        <td><img src='$image_url' alt='$product_name' class='product-image'></td>
                    </tr>";
                }
                ?>
            </table>
            <div class="back-to-cart">
                <a href="/otoke-chicken/be/menu/cart.php" class="btn">Cập nhật giỏ hàng</a>
            </div>
            <h3 class="total">Tổng tiền: <?php echo number_format($total, 0, ",", "."); ?> VNĐ</h3>
        </div>
    </div>

    <!-- Form thanh toán -->
    <div class="payment-info">
        <form action="process_payment.php" method="POST" autocomplete="off">
            <h2>Thông tin thanh toán</h2>

            <!-- Họ và tên -->
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" id="name" name="name" class="input-text" required placeholder="Nhập họ và tên" maxlength="100">
            </div>
            <!-- Địa chỉ giao hàng -->
            <div class="form-group">
                <label for="address">Địa chỉ giao hàng:</label>
                <input type="text" id="address" name="address" class="input-text" required placeholder="Nhập địa chỉ giao hàng" maxlength="200">
            </div>

            <!-- Số điện thoại -->
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" class="input-text" required placeholder="Nhập số điện thoại"
                    pattern="^\+?\d{10,15}$" title="Số điện thoại phải từ 10 đến 15 chữ số, có thể có dấu +">
            </div>
            <h3>Thông tin thẻ tín dụng</h3>

            <!-- Số thẻ -->
            <div class="form-group">
                <label for="card_number">Số thẻ:</label>
                <input type="text" id="card_number" name="card_number" class="input-text" required placeholder="Nhập số thẻ"
                    maxlength="16" pattern="\d{16}" title="Số thẻ phải gồm 16 chữ số">
            </div>

            <!-- Ngày hết hạn -->
            <div class="form-group">
                <label for="expiry_date">Ngày hết hạn (dd/mm/yyyy):</label>
                <input type="text" id="expiry_date" name="expiry_date" class="input-text" required placeholder="dd/mm/yyyy"
                    maxlength="10" pattern="^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$" title="Nhập ngày hết hạn theo định dạng DD/MM/YYYY">
            </div>
            <!-- Mã CVV -->
            <div class="form-group">
                <label for="cvv">Mã CVV:</label>
                <input type="text" id="cvv" name="cvv" class="input-text" required placeholder="Nhập mã CVV" maxlength="3"
                    pattern="\d{3}" title="Mã CVV gồm 3 chữ số">
            </div>

            <!-- Nút thanh toán -->
            <button type="submit" class="button-checkout">Thanh toán</button>
        </form>
    </div>
    <?php
    include '../../fe/utils/footer.php'
    ?>
    <script src="../../fe/contact/contact.js"></script>
    <script src="../../fe/home/final.js"></script>
    <script src="../../fe/utils/search.js"></script>
</body>

</html>