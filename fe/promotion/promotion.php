<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../utils/footer.css">
    <link rel="stylesheet" href="../utils/header.css" />
    <link rel="stylesheet" href="../contact/contact.css">
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./promotion.css" />
    <title>Khuyến Mãi - Gà rán Otoké</title>
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
                        <a href="/otoke-chicken/fe/introduce/introduce.php" title="GIỚI THIỆU" class="menu-link">
                            <img src="https://theme.hstatic.net/1000242782/1000838257/14/no_image.jpg?v=596" alt="">
                            Tuyển Dụng
                        </a>
                    </div>
                </li>
                <li class="party-service-li">
                    <div>
                        <a href="/otoke-chicken/be/menu/menu.php" title="MENU" class="menu-link">
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

    <div class="breadcrumb">
        <a href="#">Trang chủ</a>
        <span>/</span>
        <span class="current-page">KHUYẾN MÃI</span>
    </div>

    <div class="main">
        <div class="left-main">
            <div class="sidebar-blog">
                <div class="news-lastest">
                    <div class="title-news">
                        <h2>BÀI VIẾT MỚI NHẤT</h2>
                    </div>
                    <div class="list-news">
                        <div class="item-artical">
                            <div class="post-img">
                                <a href="#" alt="">
                                    <img src="https://file.hstatic.net/1000242782/article/453492522_519809900566181_4588755424522411314_n_43f8f2b8abfe4a87894f7bb5a197dd65_large.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="#">ĂN TRƯA ĐỦ CHẤT - VỊ NGON NGÂY NGẤT</a>
                                </h3>
                                <span class="author">
                                    <a href="#">
                                        OTOKE ADMIN
                                    </a>
                                </span>
                                <span class="date">
                                    06.08.2024
                                </span>
                            </div>
                        </div>
                        <div class="item-artical">
                            <div class="post-img">
                                <a href="#" alt="">
                                    <img src="https://file.hstatic.net/1000242782/article/449103979_498486709365167_6920412968863905167_n_fdec68f81e4949198e56cd52011e514c_large.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="#">ĐÓN HÈ “SO CHILL” - CHỌN COMBO “SO IU”</a>
                                </h3>
                                <span class="author">
                                    <a href="#">
                                        OTOKE ADMIN
                                    </a>
                                </span>
                                <span class="date">
                                    06.08.2024
                                </span>
                            </div>
                        </div>
                        <div class="item-artical">
                            <div class="post-img">
                                <a href="#" alt="">
                                    <img src="https://file.hstatic.net/1000242782/article/444484752_481661587714346_249704380472723947_n__1__7e72d92dbf204e5badb32a849711bbb5_large.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="#">MUA 1 TẶNG 1 - THỨ 3 HÀNG TUẦN</a>
                                </h3>
                                <span class="author">
                                    <a href="#">
                                        OTOKE ADMIN
                                    </a>
                                </span>
                                <span class="date">
                                    06.08.2024
                                </span>
                            </div>
                        </div>
                        <div class="item-artical">
                            <div class="post-img">
                                <a href="#" alt="">
                                    <img src="https://file.hstatic.net/1000242782/article/444484752_481661587714346_249704380472723947_n__1__7e72d92dbf204e5badb32a849711bbb5_large.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="#">PHẤN KHỞI CHỜ LƯƠNG - RINH NGAY DEAL HỜI</a>
                                </h3>
                                <span class="author">
                                    <a href="#">
                                        OTOKE ADMIN
                                    </a>
                                </span>
                                <span class="date">
                                    06.08.2024
                                </span>
                            </div>
                        </div>
                        <div class="item-artical">
                            <div class="post-img">
                                <a href="#" alt="">
                                    <img src="https://file.hstatic.net/1000242782/article/banner_web_bogo_1920x760pixel_60192091705a49dd813a6f34f7b2344b_large.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="#">MUA 1 TẶNG 1 - THỨ 3 HÀNG TUẦN</a>
                                </h3>
                                <span class="author">
                                    <a href="#">
                                        OTOKE ADMIN
                                    </a>
                                </span>
                                <span class="date">
                                    06.08.2024
                                </span>
                            </div>
                        </div>
                        <div class="item-artical">
                            <div class="post-img">
                                <a href="#" alt="">
                                    <img src="https://file.hstatic.net/1000242782/article/441288125_472185308661974_8375906130657942437_n_9f67b01fab7a44f8a04aaa3d8b6ff341_large.jpg"
                                        alt="">
                                </a>
                            </div>
                            <div class="post-content">
                                <h3>
                                    <a href="#">MỪNG HÀNH TRÌNH MỚI CỦA GÀ RÁN OTOKÉ</a>
                                </h3>
                                <span class="author">
                                    <a href="#">
                                        OTOKE ADMIN
                                    </a>
                                </span>
                                <span class="date">
                                    06.08.2024
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-blog">
                    <div class="title-news">
                        <h2>DANH MỤC BLOG</h2>
                    </div>
                    <div class="list-blog">
                        <div class="layered layered-category" style="display: block;">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <li class="">
                                        <span></span>
                                        <a class="" href="/" title="TRANG CHỦ" target="_self">
                                            TRANG CHỦ
                                        </a>
                                    </li>
                                    <li class="">
                                        <span></span>
                                        <a class="" href="/pages/gioithieuotokechicken" title="GIỚI THIỆU"
                                            target="_self">
                                            GIỚI THIỆU
                                        </a>
                                    </li>
                                    <li class="">
                                        <span></span>
                                        <a class="" href="/pages/dat-mon" title="MENU" target="_self">
                                            MENU
                                        </a>
                                    </li>
                                    <li class="active">
                                        <span></span>
                                        <a class=" current" href="/blogs/khuyen-mai" title="KHUYẾN MÃI" target="_self">
                                            KHUYẾN MÃI
                                        </a>
                                    </li>
                                    <li class="tree-menu-lv1 has-child  menu-collap ">
                                        <a class="" href="javascript:void(0)" title="LIÊN HỆ" target="_self">
                                            <span class="">LIÊN HỆ</span>
                                            <span class="icon-control"><i class="fa fa-minus"></i></span>
                                        </a>
                                        <ul class="tree-menu-sub">

                                            <li>
                                                <span></span>
                                                <a href="/blogs/tin-tuc" title="Tin Tức">Tin Tức</a>
                                            </li>

                                            <li>
                                                <span></span>
                                                <a href="/blogs/tuyen-dung" title="Tuyển Dụng">Tuyển Dụng</a>
                                            </li>

                                            <li>
                                                <span></span>
                                                <a href="/pages/dich-vu-tiec" title="Dịch Vụ Tiệc">Dịch Vụ Tiệc</a>
                                            </li>

                                            <li>
                                                <span></span>
                                                <a href="/pages/he-thong-cua-hang-otoke-chicken"
                                                    title="Hệ Thống Cửa Hàng">Hệ Thống Cửa Hàng</a>
                                            </li>

                                            <li>
                                                <span></span>
                                                <a href="https://www.otokechickenfranchise.com/"
                                                    title="Nhượng Quyền Thương Hiệu">Nhượng Quyền Thương Hiệu</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right-main">
            <div class="heading-page">
                <h1>KHUYẾN MÃI</h1>
            </div>
            <div class="blog-content">
                <div class="list-artical-content">
                    <!-- Nội dung blog -->
                    <article class="blog-loop">
                        <div class="row-blog">
                            <div class="image-blog">
                                <a href="#">
                                    <img src="https://file.hstatic.net/1000242782/article/453492522_519809900566181_4588755424522411314_n_43f8f2b8abfe4a87894f7bb5a197dd65_grande.jpg" alt="">
                                </a>
                            </div>
                            <div class="content-blogs">
                                <div class="blog-post-title">
                                    <h3 class="blog-post-title">
                                        <a href="#">ĂN TRƯA ĐỦ CHẤT - VỊ NGON NGÂY NGẤT</a>
                                    </h3>
                                </div>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: OTOKE ADMIN</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2024-08-06">06.08.2024</time>
                                    </span>
                                </div>
                                <div>
                                    <p class="entry-content"> Otoké không nói: Có cơm trưa ở Gà Rán Otoké. Otoké nói: Otoké khao mời bữa trưa giá hời vừa đủ chất vừa tiết kiệm với...</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="row-blog">
                            <div class="image-blog">
                                <a href="#">
                                    <img src="https://file.hstatic.net/1000242782/article/449103979_498486709365167_6920412968863905167_n_fdec68f81e4949198e56cd52011e514c_grande.jpg" alt="">
                                </a>
                            </div>
                            <div class="content-blogs">
                                <div class="blog-post-title">
                                    <h3 class="blog-post-title">
                                        <a href="#">ĂN TRƯA ĐỦ CHẤT - VỊ NGON NGÂY NGẤT</a>
                                    </h3>
                                </div>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: OTOKE ADMIN</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2024-08-06">06.08.2024</time>
                                    </span>
                                </div>
                                <div>
                                    <p class="entry-content">Otoké không nói: Có cơm trưa ở Gà Rán Otoké.&nbsp;Otoké nói: Otoké khao mời bữa trưa giá hời vừa đủ chất vừa tiết kiệm với...</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="row-blog">
                            <div class="image-blog">
                                <a href="#">
                                    <img src="https://file.hstatic.net/1000242782/article/6104deec6440c41e9d51_adff8b7b9c6c456f9bb0cbddd27e137b_grande.jpg" alt="">
                                </a>
                            </div>
                            <div class="content-blogs">
                                <div class="blog-post-title">
                                    <h3 class="blog-post-title">
                                        <a href="#">MUA 1 TẶNG 1 - THỨ 3 HÀNG TUẦN</a>
                                    </h3>
                                </div>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: OTOKE ADMIN</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2024-08-06">06.08.2024</time>
                                    </span>
                                </div>
                                <div>
                                    <p class="entry-content">Khởi động tuần mới tràn đầy năng lượng, ghé Gà rán Otoké thưởng thức gà vô tư với siêu ưu đãi MUA 1 TẶNG 1...</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="row-blog">
                            <div class="image-blog">
                                <a href="#">
                                    <img src="https://file.hstatic.net/1000242782/article/444484752_481661587714346_249704380472723947_n__1__7e72d92dbf204e5badb32a849711bbb5_grande.jpg" alt="">
                                </a>
                            </div>
                            <div class="content-blogs">
                                <div class="blog-post-title">
                                    <h3 class="blog-post-title">
                                        <a href="#">PHẤN KHỞI CHỜ LƯƠNG - RINH NGAY DEAL HỜI</a>
                                    </h3>
                                </div>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: OTOKE ADMIN</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2024-08-06">06.08.2024</time>
                                    </span>
                                </div>
                                <div>
                                    <p class="entry-content">Cuối tháng chờ lương nhưng vẫn no căng bụng vì đã có Gà rán Otoké khao bạn deal cực hời, tiết kiệm đến 90k khi...</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="row-blog">
                            <div class="image-blog">
                                <a href="#">
                                    <img src="https://file.hstatic.net/1000242782/article/banner_web_bogo_1920x760pixel_60192091705a49dd813a6f34f7b2344b_grande.jpg" alt="">
                                </a>
                            </div>
                            <div class="content-blogs">
                                <div class="blog-post-title">
                                    <h3 class="blog-post-title">
                                        <a href="#">MUA 1 TẶNG 1 - THỨ 3 HÀNG TUẦN</a>
                                    </h3>
                                </div>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: OTOKE ADMIN</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2024-08-06">06.08.2024</time>
                                    </span>
                                </div>
                                <div>
                                    <p class="entry-content">Chương trình Thứ Ba - Mua 1 Tặng 1, cụ thể như sau: · Mua 2 miếng gà tặng 2 miếng gà khi khách gọi cùng...</p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="blog-loop">
                        <div class="row-blog">
                            <div class="image-blog">
                                <a href="#">
                                    <img src="https://file.hstatic.net/1000242782/article/441288125_472185308661974_8375906130657942437_n_9f67b01fab7a44f8a04aaa3d8b6ff341_grande.jpg" alt="">
                                </a>
                            </div>
                            <div class="content-blogs">
                                <div class="blog-post-title">
                                    <h3 class="blog-post-title">
                                        <a href="#">MỪNG HÀNH TRÌNH MỚI CỦA GÀ RÁN OTOKÉ</a>
                                    </h3>
                                </div>
                                <div class="blog-post-meta">
                                    <span class="author vcard">Người viết: OTOKE ADMIN</span>
                                    <span class="date">
                                        <time pubdate="" datetime="2024-08-06">06.08.2024</time>
                                    </span>
                                </div>
                                <div>
                                    <p class="entry-content">“CƠN MƯA” COMBO 99K - THƯỞNG THỨC NGAY KẺO LỠ!!! Tưới mát những cơn nóng mùa hè của Sài Gòn bằng “cơn mưa” combo ưu đãi...</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../utils/footer.php';
    ?>
    <script src="../utils/search.js"></script>
    <script src="../contact/contact.js"></script>
    <script src="../home/final.js"></script>
</body>

</html>