<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="icon" href="../../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="../home/home.css">
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
                <a href="/otoke-chicken/fe/home//home.php">
                    <img src="https://theme.hstatic.net/1000242782/1000838257/14/logo.png?v=590" alt="" />
                </a>
            </div>
            <div class="header-wrap-icon">
                <span class="icon-account" aria-label="Tài khoản" title="Tài khoản">
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
                </span>
                <span id="site-search-handle" class="icon-search" aria-label="Tìm kiếm" title="Tìm kiếm">
                    <button class="button-search">
                        <span class="search-menu" aria-hidden="true">
                            <svg version="1.1" class="svg-search" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27"
                                style="enable-background: new 0 0 24 27" xml:space="preserve">
                                <path
                                    d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                </path>
                                <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                    width="4" height="8"></rect>
                            </svg>
                        </span>
                    </button>
                </span>
                <span id="site-cart-handle" class="icon-cart" aria-label="Open cart" title="Giỏ hàng">
                    <a href="/Demo/Menu/cart.php">
                        <span class="cart-menu" aria-hidden="true">
                            <svg version="1.1" class="svg-cart" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27"
                                style="enable-background: new 0 0 24 27" xml:space="preserve">
                                <g>
                                    <path d="M0,6v21h24V6H0z M22,25H2V8h20V25z"></path>
                                </g>
                                <g>
                                    <path d="M12,2c3,0,3,2.3,3,4h2c0-2.8-1-6-5-6S7,3.2,7,6h2C9,4.3,9,2,12,2z">
                                    </path>
                                </g>
                            </svg>
                            <!-- <span class="count-holder"><span class="count">0</span></span> -->
                        </span>
                    </a>
                </span>
                <span id="site-menu-handle" class="hamburger-menu visible-sm visible-xs" aria-hidden="true"><span
                        class="bar"></span></span>
            </div>
        </div>
        <div class="menu">
            <div id="nav">
                <nav class="main-nav text-center">
                    <ul class="clearfix">
                        <li class="active">
                            <a href="/otoke-chicken/fe/home//home.php" title="TRANG CHỦ" class="menu-link"> TRANG CHỦ </a>
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
                    </ul>
                </nav>
            </div>
        </div>
        <div class="search-container">
            <h1>ok</h1>
        </div>
    </header>
    <script src="search.js"></script>
</body>

</html>