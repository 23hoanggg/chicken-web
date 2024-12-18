<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ tiệc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- nhúng file reset -->
    <link rel="stylesheet" href="../../utils/header.css">
    <link rel="stylesheet" href="../../utils/footer.css">
    <link rel="stylesheet" href="./../../contact/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="party-service.css">
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
    <div class="content-party">
        <!-- Begin: section-heading -->
        <div class="section-heading">
            <div class="section-heading-content">
                <div class="section-heading-inner__texts">
                    <div class="section-heading-inner__text">
                        <p>Cùng Gà rán Otoké mang đến một bữa tiệc sinh nhật thật đáng nhớ và nhiều kỷ niệm dành cho các bé yêu.</p>
                        <p>Mời bố mẹ khám phá những ưu đãi bên dưới và nhấc máy liên hệ Gà rán Otoké qua Hotline <strong>19009480</strong> để chọn cửa hàng, gói trang trí tiệc và phần ăn phù hợp cho các bé.</p>
                        <p>Mọi thứ hãy để Otoké lo!</p>
                    </div>
                </div>
                <div class="section-heading-inner__img">
                    <img src="./assets/img/section_1_order_image.png" alt="Image">
                </div>
            </div>
        </div>
        <!-- End: section-heading -->


        <!-- Begin: section-body -->
        <div class="section-body">
            <div class="section-body-row-1">
                <img src="./assets/img/section_2_order_1_img.jpg" alt="Image">
            </div>

            <div class="section-body-row-2">
                <div class="section-body-row-2__item-left">
                    <div class="section-body-row-2__item-left-img-container">
                        <div class="section-body-row-2__item-left-imgs ">
                            <img class="slide" src="./assets/img/section_3_order_1_img.jpg" alt="Image">
                            <img class="slide" src="./assets/img/section_3_order_2_img.jpg" alt="Image">
                            <img class="slide" src="./assets/img/section_3_order_3_img.jpg" alt="Image">
                            <img class="slide" src="./assets/img/section_3_order_4_img.jpg" alt="Image">
                        </div>
                    </div>

                    <div class="section-body-row-2__item-left-btn">
                        <div class="section-body-row-2__item-left-btn--prev" onclick="goPrev()">
                            <i class="section-body-row-2__item-left-icon fa-solid fa-angle-left "></i>
                        </div>
                        <div class="section-body-row-2__item-left-btn--next " onclick="goNext()">
                            <i class="section-body-row-2__item-left-icon fa-solid fa-angle-right "></i>

                        </div>
                    </div>
                </div>

                <div class="section-body-row-2__item-right">
                    <img src="./assets/img/section_3_order_image_left.jpg" alt="Image">
                </div>
            </div>
        </div>
        <!-- End : section body -->



        <!-- Begin: section footer -->
        <div class="section-footer">
            <div class="section-footer-row">
                <div class="section-footer-row__heading">
                    <h3>Tiệc vui thả ga - Ưu đãi nhận quà</h3>
                </div>
                <div class="section-footer-row__item">
                    <div class="section-footer-row__item-imgs">
                        <img class="img" src="./assets/img/section_4_order_1_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_2_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_3_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_4_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_5_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_6_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_8_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_9_img.jpg" alt="Image">
                        <img class="img" src="./assets/img/section_4_order_10_img.jpg" alt="Image">
                    </div>
                </div>
            </div>


            <div class="section-footer-btn">
                <div class="section-footer-btn__prev" onclick="Prev()">
                    <i class="section-footer-icon fa-solid fa-angle-left"></i>
                </div>
                <div class="section-footer-btn__next" onclick="Next()">
                    <i class="section-footer-icon fa-solid fa-angle-right"></i>
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

    <!-- Slide show section body -->
    <script>
        const slides = document.querySelectorAll('.slide'); // lấy ra danh sách ảnh
        var counter = 0;

        slides.forEach((slide, index) => { // duyệt qua từng ảnh
            slide.style.left = `${index * 100}%`
        })

        const goPrev = () => {
            counter--
            if (counter < 0) counter = slides.length - 1;
            slideImage()

        }

        const goNext = () => {
            counter++
            if (counter == slides.length) counter = 0;
            slideImage()

        }

        const slideImage = () => {
            slides.forEach((slide) => {
                slide.style.transform = `translateX(-${counter * 100}%)`
            })
        }
    </script>



    <!-- Slide show section footer -->
    <script>
        const imgs = document.querySelectorAll('.img');
        var current = 0;

        imgs.forEach((img, index) => {
            img.style.left = `${index * 1140}px`
        })

        const Prev = () => {
            current--
            if (current < 0) current = imgs.length - 1
            slideImg()
        }

        const Next = () => {
            current++
            if (current == imgs.length) current = 0
            slideImg()
        }

        const slideImg = () => {
            imgs.forEach((img) => {
                img.style.transform = `translateX(-${current * 1140}px)`
            })
        }
    </script>

</body>

</html>