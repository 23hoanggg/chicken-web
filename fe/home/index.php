<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../utils/search.css">
    <link rel="stylesheet" href="../contact/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="../utils/header.css" />
    <link rel="stylesheet" href="../utils/footer.css" />
    <title>Gà rán Otoké - Đậm vị Hàn Quốc!</title>
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
    <div class="main-index">
        <div class="slider-container">
            <div class="slider-item active">
                <img src="https://theme.hstatic.net/1000242782/1000838257/14/slideshow_1.jpg?v=590" alt="Slider 1">
            </div>
            <div class="slider-item">
                <img src="https://theme.hstatic.net/1000242782/1000838257/14/slideshow_2.jpg?v=590" alt="Slider 2">
            </div>
        </div>

        <!-- Nhóm danh mục -->
        <!-- Support hỗ trợ -->
        <section class="section-support">
            <div class="flex-container">
                <div class="column-wrap active-ani">
                    <div class="support-inner">
                        <div class="inner-icon">
                            <img src="//theme.hstatic.net/1000242782/1000838257/14/support_1_ic.png?v=590"
                                alt="Nhiều ưu đãi hấp dẫn" />
                        </div>
                        <div class="inner-content">
                            <h3><span>Nhiều ưu đãi hấp dẫn</span></h3>
                            <p>Hotline : 19009480</p>
                        </div>
                    </div>
                </div>
                <div class="column-wrap active-ani">
                    <div class="support-inner">
                        <div class="inner-icon">
                            <img src="//theme.hstatic.net/1000242782/1000838257/14/support_2_ic.png?v=590"
                                alt="Gà Rán Otoké" />
                        </div>
                        <div class="inner-content">
                            <h3><span>Gà Rán Otoké</span></h3>
                            <p>Đậm Vị Hàn Quốc</p>
                        </div>
                    </div>
                </div>
                <div class="column-wrap active-ani">
                    <div class="support-inner">
                        <div class="inner-icon">
                            <img src="//theme.hstatic.net/1000242782/1000838257/14/support_3_ic.png?v=590"
                                alt="Đặt hàng trực tuyến" />
                        </div>
                        <div class="inner-content">
                            <h3><span>Đặt hàng trực tuyến</span></h3>
                            <p>Thanh toán Online</p>
                        </div>
                    </div>
                </div>
                <div class="column-wrap active-ani">
                    <div class="support-inner">
                        <div class="inner-icon">
                            <img src="//theme.hstatic.net/1000242782/1000838257/14/support_4_ic.png?v=590"
                                alt="Hỗ trợ nhanh chóng" />
                        </div>
                        <div class="inner-content">
                            <h3><span>Hỗ trợ nhanh chóng</span></h3>
                            <p>Từ 8:00 đến 20:00 tất cả các ngày trong tuần</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nhóm sản phẩm 1 -->
        <section class="section-collection">
            <div class="wrapper-heading-home">
                <div class="container-fluid">
                    <div class="site-animation">
                        <h2>
                            <a href="/collections/cac-phan-combo"> COMBO OTOKÉ </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="wrapper-collection-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="banner">
                                <a href="#">
                                    <img src="https://theme.hstatic.net/1000242782/1000838257/14/collection_one_img.jpg?v=590"
                                        alt="Banner" />
                                </a>
                            </div>

                            <div class="product">
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-12_cb08b6105cc04389ad87d5bbbf755f7c_grande.jpg"
                                        alt="Product 1" />
                                    <a href="#">
                                        <h3>Otoké Combo - Small</h3>
                                    </a>
                                    <p>79,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-13_de65781e2c5c426f8798253244df8586_grande.jpg"
                                        alt="Product 2" />
                                    <a href="#">
                                        <h3>Otoké Combo - Medium</h3>
                                    </a>
                                    <p>99,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-14_d713f18b880941fd9001f1aea97bb1bf_grande.jpg"
                                        alt="Product 3" />
                                    <a href="#">
                                        <h3>Otoké Combo - Large</h3>
                                    </a>
                                    <p>149,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-15_117f4103aa174ddeacd21dd6a6d40e55_grande.jpg"
                                        alt="Product 4" />
                                    <a href="#">
                                        <h3>Funny Combo</h3>
                                    </a>
                                    <p>499,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-16_31333b4ef72847d3b0d3c73a7a1ed38a_grande.jpg"
                                        alt="Product 5" />
                                    <a href="#">
                                        <h3>Yummy Combo</h3>
                                    </a>
                                    <p>649,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-17_77d020f848134547b53204757e007b88_grande.jpg"
                                        alt="Product 6" />
                                    <a href="#">
                                        <h3>Combo Cơm Gà Rán Phủ Sốt + Nước</h3>
                                    </a>
                                    <p>
                                        <span class="sale-price">59,000đ</span>
                                        <span class="discount">68,000đ</span>
                                    </p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-19_f7f369bb6fa24d0baf6dd00913b5fcf7_grande.jpg"
                                        alt="Product 7" />
                                    <a href="#">
                                        <h3>Combo Cơm Gà Teriyaki + Nước</h3>
                                    </a>
                                    <p>
                                        <span class="sale-price">59,000đ</span>
                                        <span class="discount">68,000đ</span>
                                    </p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-18_3a7ce6a0fcb642c39e1c0f4364402c70_grande.jpg"
                                        alt="Product 8" />
                                    <a href="#">
                                        <h3>Combo Cơm Phi Lê + Nước</h3>
                                    </a>
                                    <p>
                                        <span class="sale-price">59,000đ</span>
                                        <span class="discount">68,000đ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nhóm sản phẩm 2 -->
        <section class="section-collection">
            <div class="wrapper-heading-home">
                <div class="container-fluid">
                    <div class="site-animation">
                        <h2>
                            <a href="/collections/cac-phan-combo"> THỨC ĂN KÈM </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="wrapper-collection-1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="banner">
                                <a href="#">
                                    <img src="https://theme.hstatic.net/1000242782/1000838257/14/collection_two_img.jpg?v=590"
                                        alt="Banner" />
                                </a>
                            </div>

                            <div class="product">
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-30_45c8be7d4b0c4385be5818c9bd49efe2_grande.jpg"
                                        alt="Product 1" />
                                    <a href="#">
                                        <h3>Gà Viên Sốt Phô Mai</h3>
                                    </a>
                                    <p>49,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-31_fe1363dc440148ba8b2a0db17d9482db_grande.jpg"
                                        alt="Product 2" />
                                    <a href="#">
                                        <h3>Mỳ Ý Sốt Bằm</h3>
                                    </a>
                                    <p>39,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-33_ce0d45e27ad9467ea2f7a7a45bf28643_grande.jpg"
                                        alt="Product 3" />
                                    <a href="#">
                                        <h3>Sụn Gà Lắc</h3>
                                    </a>
                                    <p>39,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-32_35a177068bd145fe964b5c120d24d540_grande.jpg"
                                        alt="Product 4" />
                                    <a href="#">
                                        <h3>Tobokki</h3>
                                    </a>
                                    <p>39,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-34_0b9c09f83c334f47856bec9675e79ea7_grande.jpg"
                                        alt="Product 5" />
                                    <a href="#">
                                        <h3>Cơm Gạo Nhật</h3>
                                    </a>
                                    <p>15,000đ</p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-36_7c45177f31cc41c6b8be9059a4545f6f_grande.jpg"
                                        alt="Product 6" />
                                    <a href="#">
                                        <h3>Canh Kim Chi</h3>
                                    </a>
                                    <p>
                                        <span class="sale-price">59,000đ</span>
                                        <span class="discount">68,000đ</span>
                                    </p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-35_a83ee0802c0c4e429b9c1dd4656b3ae6_grande.jpg"
                                        alt="Product 7" />
                                    <a href="#">
                                        <h3>Canh Gà Rau Củ</h3>
                                    </a>
                                    <p>
                                        <span class="sale-price">59,000đ</span>
                                        <span class="discount">68,000đ</span>
                                    </p>
                                </div>
                                <div class="product-list">
                                    <img src="https://product.hstatic.net/1000242782/product/web_480x480px_otoke_menu-37_7d27110c936f42308f2533438a14796f_grande.jpg"
                                        alt="Product 8" />
                                    <a href="#">
                                        <h3>Set 3 Bánh Gà Rau Củ</h3>
                                    </a>
                                    <p>
                                        <span class="sale-price">59,000đ</span>
                                        <span class="discount">68,000đ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Về chúng tôi -->
    <footer class="footer">
        <div class="top-footer">
            <div class="left-news">
                <div class="news-tit">
                    <h4>Đăng kí nhận tin</h4>
                </div>
                <div class="form-news">
                    <form accept-charset="UTF-8" action="/account/contact" method="post">
                        <div class="input-group">
                            <input type="email" placeholder="Nhập email của bạn" required />
                            <button type="submit">Đăng kí</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="area_phone_contact">
                <p class="number_phone">
                    <i class="fa fa-phone"></i>
                    <span>Đặt hàng/ Hỗ trợ:</span>
                    <a href="tel:19009480"> 1900 9480 </a>
                </p>
            </div>
        </div>

        <div class="main-footer">
            <div class="footer-col1">
                <h4>VỀ CHÚNG TÔI</h4>
                <p>
                    Khởi nguồn từ sự đam mê với những miếng gà giòn ngon đậm vị của
                    Hàn Quốc, Gà rán Otoké ra đời với mong muốn mang đến cho thực
                    khách Việt những trải nghiệm thật “wow” về ẩm thực gà rán của xứ
                    sở Kim Chi. <br />
                    <br />
                    DA GIÒN ĐẬM VỊ - miếng gà mềm mọng nước bên trong, giòn đậm vị
                    bên ngoài là tiêu chí Gà rán Otoké lựa chọn để tạo ra món ăn,
                    với 05 vị xốt được nghiên cứu làm từ 100% đậu nành tươi, ủ lên
                    men thủ công tạo nên miếng gà thơm ngon đậm đà không đâu có
                    được.<br />
                </p>
                <div class="logo-footer">
                    <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=57123">
                        <img src="https://theme.hstatic.net/1000242782/1000838257/14/logo-bct.png?v=590"
                            alt="Bộ Công Thương" />
                    </a>
                </div>
            </div>

            <div class="footer-col2">
                <h4>CÁC CHÍNH SÁCH</h4>
                <div class="foot-col2-content">
                    <ul>
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Hướng dẫn thanh toán</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                        <li><a href="#">Các điều khoản chung</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-col3">
                <h4>THÔNG TIN LIÊN HỆ</h4>
                <ul>
                    <li class="contact-1">
                        CÔNG TY TNHH OTOKE VIỆT NAM <br />

                        Địa chỉ: 665 Quốc lộ 13, Khu phố 3, Phường Hiệp Bình Phước,
                        TP. Thủ Đức, Việt Nam <br />
                        Mã số doanh nghiệp: 0318255183 do Phòng Đăng ký kinh doanh -
                        Sở Kế hoạch và Đầu tư Thành phố Hồ Chí Minh cấp ngày
                        15/01/2024<br />
                        Hotline: 1900 9480
                    </li>
                    <li class="contact-2">19009480</li>
                    <li class="contact-3"></li>
                    <li class="contact-4">callcenter@otokechicken.vn</li>
                </ul>
            </div>

            <div class="footer-col4">
                <h4>Fanpage</h4>
                <div class="fb-page" data-href="https://www.facebook.com/otokechicken?ref=embed_page"
                    data-tabs="" data-width="" data-height="" data-small-header="false"
                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/otokechicken?ref=embed_page"
                        class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/otokechicken?ref=embed_page">Facebook Page Name</a>
                    </blockquote>
                </div>
            </div>

            <!-- Facebook SDK for JavaScript -->
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0" nonce="ABCD1234"></script>
    </footer>

    <div class="bottom-footer">
        <hr>
        <p>
            Copyright © 2024
            <a href="https://otokechicken.vn">Gà Rán Otoké</a>. Powered by
            <a href="https://www.haravan.com">Haravan</a>.
        </p>
    </div>
    <script src="../utils/search.js"></script>
    <script src="final.js"></script>
    <script src="../contact/contact.js"></script>
</body>

</html>