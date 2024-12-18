<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Otoke</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../utils/header.css">
  <link rel="stylesheet" href="../../utils/footer.css">
  <link rel="stylesheet" href="./../../contact/contact.css">
  <link rel="stylesheet" href="btl.css">
  <link rel="icon" href="../../../icon.svg" type="image/svg+xml">
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
    <div class="overlay">
      <img src="./img/logo1.png" alt="9Hot Chicken Logo" class="logo">
      <h1>HỢP TÁC NHƯỢNG QUYỀN</h1>
      <hr width="30%" size="2px" align="center" color="white" />
      <p>THƯƠNG HIỆU GÀ RÁN 100% CỦA NGƯỜI VIỆT</p>
      <hr width="30%" size="2px" align="center" color="white" />
      <p class="subtitle">Da giòn đậm vị</p>
      <button class="button-click">XEM THÔNG TIN NGAY</button>
    </div>
  </div>

  <div class="about-section">
    <div class="about-content">
      <h2>VỀ CHÚNG TÔI</h2>
      <p>
        <span style="font-weight: bold; color: rgb(247, 38, 48);">
          Otoké Chicken
        </span> là một thương hiệu
        <span style="font-weight: bold;">
          gà rán mang phong cách Hàn Quốc
        </span> ra mắt vào năm 2017. Trải qua 6 năm phát triển,
        <span style="font-weight: bold; color: rgb(247, 38, 48);">
          Otoké Chicken
        </span> hiện có 12 cửa hàng tại TP.HCM, Đồng Nai, Phan Thiết được đông đảo khách hàng, đặc biệt là các bạn trẻ gen z yêu thích.
        <br>
        <br>
        <span style="font-weight: bold; color: rgb(247, 38, 48);">
          Otoké Chicken
        </span> được đầu tư và trực tiếp quản lý bởi Quỹ đầu tư VI
        <span style="font-weight: bold;">
          (VIGroup)
        </span> - một công ty quản lý quỹ chuyên nghiệp, có kinh nghiệm nhiều năm trong việc phát triển cũng như tư vấn chiến lược cho nhiều thương hiệu F&B tại Việt Nam, như: The Pizza Company, Dairy Queen, Toco Toco,...
        <br>
      </p>
    </div>
    <div class="about-image">
      <img src="https://w.ladicdn.com/s850x850/5eb62ec26b12637b2bd34008/otoke-franchise-bg2-20220815064015.png" alt="Otoké Chicken">
    </div>
  </div>

  <div class="why-choose-section">
    <h2 class="section-title">TẠI SAO CHỌN <span>OTOKÉ CHICKEN</span></h2>
    <div class="why-choose-content">
      <div class="image-container">
        <img src="https://w.ladicdn.com/s800x800/5eb62ec26b12637b2bd34008/_mg_2045-20200514045426.jpg" alt="Khách hàng tại Otoké Chicken">
        <div class="logo-img">
          <img src="https://w.ladicdn.com/s500x500/5eb62ec26b12637b2bd34008/logo-otoke-chicken-pantone-new-vesion-pdf-04-20200513031529.png" alt="Otoké Chicken Logo">
        </div>
      </div>
      <div class="reasons">
        <div class="reason-1">
          <div class="reason-number">1</div>
          <div class="reason-content">
            <h3>Sản phẩm chất lượng</h3>
            <p>
              Thương hiệu gà rán đã có vị trí trên thị trường.<br>
              Sản phẩm được yêu thích bởi nhiều khách hàng, từ người lớn đến trẻ em.<br>
              Chất lượng sản phẩm luôn được nâng cao.
            </p>
          </div>
        </div>
        <div class="reason-2">
          <div class="reason-number">2</div>
          <div class="reason-content">
            <h3>Kênh bán hàng đa dạng</h3>
            <p>
              Có mặt trên tất cả ứng dụng đặt đồ ăn: Baemin, Grabfood, Shopeefood, Gojek, Be.<br>
              Ngoài ra, Otoké Chicken còn có bộ phận tiếp nhận các đơn hàng đặt online trên website, hotline, Facebook và Zalo.
            </p>
          </div>
        </div>
        <div class="reason-3">
          <div class="reason-number">3</div>
          <div class="reason-content">
            <h3>Hệ thống vận hành được chuẩn hóa</h3>
            <p>
              Trong 6 năm hoạt động, Otoké Chicken đã chuẩn hóa quy trình thu mua, vận hành, phục vụ.<br>
              Công thức giúp tất cả các cửa hàng tối ưu nhất. Thời gian hoàn vốn chỉ từ 2 - 3 năm.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="highlight-products-section">
    <h2 class="section-title">SẢN PHẨM <span>NỔI BẬT</span></h2>
    <p class="section-description">
      Otoké Chicken mang đến sản phẩm gà rán phủ sốt kiểu Hàn, một sản phẩm trẻ trung mang tính biểu tượng của xứ sở kim chi.
      Gà rán da giòn cùng 5 loại sốt độc đáo đã làm nên nét độc đáo cho thương hiệu Otoké Chicken trong 6 năm qua.
    </p>
    <div class="products-container">
      <div class="product-card">
        <img src="https://w.ladicdn.com/s500x500/5eb62ec26b12637b2bd34008/landing-page-otoke-franchise-30-20220806053241.jpg" alt="Gà rán phủ sốt">
        <h3>Gà rán phủ sốt</h3>
        <p>Gà rán phủ sốt, da giòn đậm vị với công nghệ chiên tách dầu tốt cho sức khỏe.</p>
      </div>
      <div class="product-card">
        <img src="https://w.ladicdn.com/s500x500/5eb62ec26b12637b2bd34008/landing-page-otoke-franchise-28-20220807143024.jpg" alt="Cơm gà rán phủ sốt">
        <h3>Cơm gà rán phủ sốt</h3>
        <p>Cơm gà rán kèm rong biển, kim chi rưới đều sốt teriyaki hấp dẫn.</p>
      </div>
      <div class="product-card">
        <img src="https://w.ladicdn.com/s500x500/5eb62ec26b12637b2bd34008/landing-page-otoke-franchise-31-20220806054254.jpg" alt="Burger">
        <h3>Burger</h3>
        <p>Burger đa dạng, nhiều sự lựa chọn.</p>
      </div>
      <div class="product-card">
        <img src="https://w.ladicdn.com/s600x600/5eb62ec26b12637b2bd34008/d8a344fd14e6c8b891f7-20230404031722-7qdhp.jpg" alt="Món ăn khác">
        <h3>Món ăn khác</h3>
        <p>Khoai tây lắc, bánh gà, mì Ý góp phần giúp khách hàng có thêm nhiều sự lựa chọn.</p>
      </div>
    </div>
  </div>

  <div class="customer">
    <div class="customer-overview-section">
      <h2 class="section-title">TỔNG QUAN <span>KHÁCH HÀNG</span></h2>
      <div class="customer-section">
        <div class="customer-box">
          <img src="./img/anh1.png" alt="Khách hàng ổn định">
          <h3>Lượng khách ổn định</h3>
          <p>Hơn <strong>40.000</strong> khách hàng mỗi tháng và hơn <strong>500.000</strong> khách hàng mỗi năm.</p>
        </div>
        <div class="customer-box">
          <img src="https://w.ladicdn.com/s600x600/5eb62ec26b12637b2bd34008/img_2658-20200514072921.jpg" alt="Tập khách hàng đông đảo">
          <h3>Tập khách hàng đông đảo</h3>
          <p>Khách hàng đa số là học sinh, sinh viên và dân văn phòng hiện đại, có điều kiện chi tiêu và trung thành với thương hiệu.</p>
        </div>
        <div class="customer-box">
          <img src="https://w.ladicdn.com/s650x600/5eb62ec26b12637b2bd34008/147b0c743976df288667-20200514065547.png" alt="Được trẻ em ưa chuộng">
          <h3>Được trẻ em ưa chuộng</h3>
          <p>Các cửa hàng của Otoké Chicken là địa điểm được nhiều gia đình lựa chọn để tổ chức tiệc sinh nhật cho các bé.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="model-otoke">
    <h2 class="section-title">MÔ HÌNH <span>OTOKÉ CHICKEN</span></h2>
    <div class="model">
      <div class="model-item">
        <h2>Mô hình Flaship Store</h2>
        <p>Mô hình chuyên phục vụ khách ăn tại chỗ với những tiêu chuẩn cao về không gian. Là nơi lý tưởng cho các gia đình, sinh nhật với khu vui chơi, phòng tiệc mini.</p>
        <div class="images">
          <img src="./img/flaship1.png" alt="Flaship Store 1">
        </div>
      </div>
      <div class="model-item">
        <h2>Mô hình Standard Store</h2>
        <p>Mô hình cửa hàng fast-food tiêu chuẩn, có không gian vừa phải, phù hợp với nhiều cấu trúc mặt bằng, kết hợp giữa phục vụ khách hàng tại chỗ và giao hàng.</p>
        <div class="images">
          <img src="./img/standard1.png" alt="Standard Store 1">
        </div>
      </div>
      <div class="model-item">
        <h2>Mô hình Express Store</h2>
        <p>Mô hình cửa hàng nhỏ, chỉ phục vụ bán mang đi và giao hàng. Mô hình dành cho khu vực trung tâm, có nhiều văn phòng, chung cư có nhiều hạn chế về mặt bằng.</p>
        <div class="images">
          <img src="./img/express1.png" alt="Express Store 1">
        </div>
      </div>
    </div>
  </div>

  <div class="investor">
    <div class="investor-benefits">
      <h2 class="section-title">QUYỀN LỢI <span>NHÀ ĐẦU TƯ</span></h2>
      <div class="benefits">
        <div class="benefit-item">
          <img src="./img/icon1.png" alt="Chứng nhận nhượng quyền">
          <div>
            <h3>Chứng nhận nhượng quyền Otoké Chicken</h3>
            <p>Được sử dụng thương hiệu Otoké Chicken tại Việt Nam để mở cửa hàng và quảng bá sản phẩm.</p>
          </div>
        </div>
        <div class="benefit-item">
          <img src="./img/icon2.png" alt="Chuyển giao công nghệ">
          <div>
            <h3>Nhận chuyển giao công nghệ & công thức chế biến</h3>
            <p>Được chuyển nhượng toàn bộ hệ thống máy móc và công thức chế biến món ăn.</p>
          </div>
        </div>
        <div class="benefit-item">
          <img src="./img/icon3.png" alt="Tư vấn setup">
          <div>
            <h3>Tư vấn setup cửa hàng</h3>
            <p>Được hỗ trợ tư vấn setup, trang trí cửa hàng theo đúng phong cách Otoké Chicken.</p>
          </div>
        </div>
        <div class="benefit-item">
          <img src="./img/icon4.png" alt="Hỗ trợ giấy phép">
          <div>
            <h3>Hỗ trợ giấy phép</h3>
            <p>Được hỗ trợ giấy phép kinh doanh, vệ sinh an toàn thực phẩm, giấy tờ nhượng quyền.</p>
          </div>
        </div>
        <div class="benefit-item">
          <img src="./img/icon5.png" alt="Đào tạo nhân sự">
          <div>
            <h3>Đào tạo nhân sự, quản lý</h3>
            <p>Đào tạo nhân viên từ pha chế, tác phong phục vụ... cho tới quy trình vận hành, quản lý cửa hàng.</p>
          </div>
        </div>
        <div class="benefit-item">
          <img src="./img/icon6.png" alt="Hỗ trợ thời gian đầu">
          <div>
            <h3>Hỗ trợ thời gian đầu</h3>
            <p>Được hỗ trợ tổ chức khai trương, chương trình khuyến mãi. Tư vấn về PR, Marketing, kế hoạch phát triển cho cửa hàng.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="investment-process">
    <h2 class="section-title">QUY TRÌNH <span>ĐẦU TƯ</span></h2>
    <div class="steps">
      <div class="step">
        <img src="./img/icon7.png" alt="Đăng ký">
        <div>
          <h3>Bước 1: Đăng ký</h3>
          <p>Đăng ký nhận thông tin nhượng quyền.</p>
        </div>
      </div>
      <div class="step">
        <img src="./img/icon8.png" alt="Trao đổi và tư vấn">
        <div>
          <h3>Bước 2: Trao đổi và tư vấn</h3>
          <p>Otoké Chicken sẽ liên hệ gặp mặt để trao đổi thêm về nhu cầu và định hướng. Tư vấn lựa chọn địa điểm, mô hình cửa hàng phù hợp.</p>
        </div>
      </div>
      <div class="step">
        <img src="./img/icon9.png" alt="Đàm phán và ký kết">
        <div>
          <h3>Bước 3: Đàm phán và ký kết</h3>
          <p>Gặp mặt trực tiếp giữa 2 bên, nghe tư vấn cụ thể và giải đáp các câu hỏi.</p>
        </div>
      </div>
      <div class="step">
        <img src="./img/icon10.png" alt="Đặt cọc & nhận thiết kế">
        <div>
          <h3>Bước 4: Đặt cọc & nhận thiết kế</h3>
          <p>Otoké Chicken sẽ làm việc với đối tác để lên thiết kế cửa hàng. Thời gian: 1-2 tuần.</p>
        </div>
      </div>
      <div class="step">
        <img src="./img/icon11.png" alt="Thi công">
        <div>
          <h3>Bước 5: Thi công</h3>
          <p>Otoké Chicken tư vấn đơn vị thi công, hỗ trợ giám sát và nghiệm thu. Thời gian thi công: 4-6 tuần.</p>
        </div>
      </div>
      <div class="step">
        <img src="./img/icon12.png" alt="Tuyển dụng & đào tạo">
        <div>
          <h3>Bước 6: Tuyển dụng & đào tạo</h3>
          <p>Hỗ trợ đăng tuyển, tổ chức đào tạo nhân sự của đối tác và tạo điều kiện thực hành ngay tại cửa hàng. Thời gian đào tạo: 4 tuần.</p>
        </div>
      </div>
      <div class="step">
        <img src="./img/icon13.png" alt="Khai trương">
        <div>
          <h3>Bước 7: Khai trương cửa hàng</h3>
          <p>Otoké Chicken hỗ trợ truyền thông, sắp xếp nhân sự hỗ trợ trong 1 tuần kể từ khi khai trương.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="registration">
    <div class="registration-container">
      <div class="registration-content">
        <h2 class="section-title">ĐĂNG KÍ <span>NHẬN THÔNG TIN</span></h2>
        <p class="description">
          Otoké Chicken luôn chào đón các cá nhân có chung định hướng phát triển những sản phẩm chất lượng, mô hình dịch vụ chuyên nghiệp.<br><br>
          Hãy hợp tác với Otoké Chicken để cùng chúng tôi chinh phục thị trường gà rán Việt Nam.<br><br>
          Liên hệ: <strong>Hotline 19009480</strong><br><br>
          Hoặc để lại thông tin tại đây, chúng tôi sẽ liên hệ.
        </p>
      </div>
      <div class="registration-form">
        <form id="infoForm">
          <div class="form-row">
            <input type="text" id="name" placeholder="Họ và tên" required>
            <input type="text" id="phone" placeholder="Số điện thoại" required>
          </div>
          <div class="form-row">
            <input type="email" id="email" placeholder="Email" required>
          </div>
          <div class="form-row">
            <input type="text" id="address" placeholder="Địa chỉ">
          </div>
          <div class="form-row">
            <textarea id="note" placeholder="Note"></textarea>
          </div>
          <button type="submit" class="btn-submit">ĐĂNG KÝ NHẬN THÔNG TIN</button>
        </form>
      </div>
    </div>
  </div>
  <div class="content">
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-logo">
          <img src="./img/logo.png" alt="Otoké Chicken Logo">
        </div>
        <div class="footer-info">
          <p>
            <img src="./img/location.png" alt="Location Icon" class="icon">
            34 Trần Hưng Đạo, P. Phạm Ngũ Lão, Q.1, Tp. Hồ Chí Minh
          </p>
          <p>
            <img src="./img/phone.png" alt="Phone Icon" class="icon">
            Hotline 19009480
          </p>
          <p>
            <img src="./img/web.png" alt="Website Icon" class="icon">
            <a href="https://www.otokechicken.vn/" target="_blank">www.otokechicken.vn</a>
          </p>
          <p>
            <img src="./img/mail.png" alt="Email Icon" class="icon">
            callcenter@otokechicken.vn
          </p>
          <p>
            <img src="./img/fb.png" alt="Facebook Icon" class="icon">
            <a href="https://www.facebook.com/otokechicken/" target="_blank">www.facebook.com/otokechicken</a>
          </p>
        </div>
      </div>
    </footer>
  </div>
  <srcipt src="../../home/final.js"></srcipt>
  <script src="../contact.js"></script>
  <script src="../../utils/search.js"></script>
</body>

</html>