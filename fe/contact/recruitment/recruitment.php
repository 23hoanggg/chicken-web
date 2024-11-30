<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuyển dụng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- nhúng file reset -->
    <link rel="stylesheet" href="../../utils/header.css">
    <link rel="stylesheet" href="../../utils/footer.css">
    <link rel="stylesheet" href="./../../contact/contact.css">
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="recruitment.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.6.0-web/css/all.min.css">
    <link rel="icon" href="../../../icon.svg" type="image/svg+xml">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
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
    <div class=" main">
        <div class="row">
            <!-- sidebar -->
            <div class="col l-3">
                <div class="sidebar-blog">
                    <div class="sidebar-blog-news">
                        <div class="sidebar-blog-news-title">
                            <h2 class="sidebar-blog-news__heading">Bài viết mới nhất</h2>
                        </div>

                        <div class="sidebar-blog-news-content">
                            <div class="sidebar-blog-news__link-img">
                                <a href="/otoke-chicken/fe/contact/recruitment/recruitment-detail.php"><img src="./assets/img/tuyen_dung_otoke.jpg" alt="Image"></a>
                            </div>
                            <div class="sidebar-blog-news__link-content">
                                <h3 class=""><a href="/otoke-chicken/fe/contact/recruitment/recruitment-detail.php">Tuyển dụng nhân viên hệ thống cửa hàng</a></h3>
                                <span class="author"><a href="/otoke-chicken/fe/contact/recruitment/recruitment-detail.php">Otoke admin</a></span>
                                <span class="date">17.04.2024</span>
                            </div>
                        </div>
                    </div>


                    <div class="sidebar-blog-menu">
                        <div class="sidebar-blog-menu-title">
                            <h2 class="sidebar-blog-menu__heading">Danh mục Blog</h2>
                        </div>

                        <div class="sidebar-blog-menu-body">
                            <ul class="sidebar-blog-menu-body__nav">
                                <li><a href="/otoke-chicken/fe/home/index.php">Trang chủ</a></li>
                                <li><a href="/otoke-chicken/fe/introduce/introduce.php">Giới thiệu</a></li>
                                <li><a href="/otoke-chicken/be/menu/menu.php">Menu</a></li>
                                <li><a href="/otoke-chicken/fe/promotion/promotion.php">Khuyến mãi</a></li>
                                <li><a href="" class="dropdown-link">
                                        Liên hệ
                                        <i class="sidebar-blog-menu-body__nav-icon fa-solid fa-minus"></i>
                                    </a>
                                    <ul class="sidebar-blog-menu-body__subnav">
                                        <li><a href="">Tin Tức</a></li>
                                        <li><a href="/otoke-chicken/fe/contact/recruitment/recruitment.php">Tuyển Dụng</a></li>
                                        <li><a href="/otoke-chicken/fe/contact/party-service/party-service.php">Dịch Vụ Tiệc</a></li>
                                        <li><a href="">Hệ Thống Cửa Hàng</a></li>
                                        <li><a href="/otoke-chicken/fe/contact/franchise-cooperation/franchise-cooperation.php">Nhượng Quyền Thương Hiệu</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- content -->
            <div class="col l-9">
                <div class="content-blog">
                    <div class="content-blog__heading">
                        <h1>Tuyển Dụng</h1>
                    </div>

                    <div class="content-blog-wrapper">
                        <div class="content-blog__body row">
                            <div class="col l-4">
                                <div class="content-blog__body-img-link">
                                    <a href="/otoke-chicken/fe/contact/recruitment/recruitment-detail.php" title="TUYỂN DỤNG NHÂN VIÊN HỆ THỐNG CỬA HÀNG"><img src="./assets/img/tuyen_dung_otoke.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="col l-8">
                                <div class="content-blog__body-title">
                                    <h3 class="content-blog__body-title-link"><a href="/otoke-chicken/fe/contact/recruitment/recruitment-detail.php" title="TUYỂN DỤNG NHÂN VIÊN HỆ THỐNG CỬA HÀNG">Tuyển dụng nhân viên hệ thống cửa hàng</a></h3>
                                </div>

                                <div class="content-blog__body-meta">
                                    <span class="content-blog__body-meta-author">Người viết: OTOKE ADMIN</span>
                                    <span class="content-blog__body-meta-date">17.04.2024</span>
                                </div>

                                <p class="content-blog__body-entry">
                                    OTOKE CHICKEN TUYỂN DỤNG NHÂN VIÊN HỆ THỐNG CỬA HÀNG📝Công việc1. Nhân viên thu ngân- Đón tiếp và phục vụ khách hàng trong khu vực...
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <?php
    include '../../utils/footer.php'
    ?>
    <script src="../contact.js"></script>
    <script src="../../utils/search.js"></script>
    <script src="../../home/final.js"></script>

    <script>
        document.querySelector('.dropdown-link').addEventListener('click', function(event) {
            event.preventDefault();
            const subnav = this.nextElementSibling;

            if (subnav.style.display == 'block') {
                subnav.style.display = 'none';
            } else {
                subnav.style.display = 'block';
            }
        });
    </script>
</body>

</html>