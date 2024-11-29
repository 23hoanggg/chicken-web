<?php
session_start();
?>

<head>

	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /><![endif]-->
	<!--[if lt IE 9]><script src="//hsta tic.net/0/0/global/design/theme-default/html5shiv.js"></script><![endif]-->
	<!--<meta content='width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0' name='viewport' />-->
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=0" name="viewport">
	<title>
		Tin tức - Gà Rán Otoké
	</title>
	<link rel="stylesheet" href="../../utils/header.css">
	<link rel="stylesheet" href="../../utils/footer.css">
	<link rel="stylesheet" href="styles.css">
	<!-- <link rel="stylesheet" href="../../utils/search.css"> -->
	<link rel="stylesheet" href="../../home/final.js">
	<link rel="stylesheet" href="../contact.css">

	<!--+++++++++++++++++++++++++  CSS ++++++++++++++++++++++++-->
	<link href="//theme.hstatic.net/1000242782/1000838257/14/styles.css?v=596" rel="stylesheet" type="text/css"
		media="all">
	<!--+++++++++++++++++++++++++  JS ++++++++++++++++++++++++-->

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

	<div class="">
		<main class="">
			<div id="blog">
				<div class="container-fluid">
					<div class="row breadcrumb-shop">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
							<ol class="breadcrumb breadcrumb-arrows" itemscope=""
								itemtype="http://schema.org/BreadcrumbList">
								<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
									<a href="/" target="_self" itemprop="item"><span itemprop="name">Trang
											chủ</span></a>
									<meta itemprop="position" content="1">
								</li>

								<li class="active" itemprop="itemListElement" itemscope=""
									itemtype="http://schema.org/ListItem">
									<span itemprop="item" content="https://otokechicken.vn/blogs/tin-tuc"><strong
											itemprop="name">Tin tức</strong></span>
									<meta itemprop="position" content="2">
								</li>
							</ol>
						</div>
					</div>
					<div class="row wrapper-row pd-page">
						<div class="col-md-3 col-sm-12 col-xs-12 ">
							<div class="sidebar-blog">
								<div class="news-latest">
									<div class="sidebarblog-title title_block">
										<h2>Bài viết mới nhất<span class="fa fa-angle-down"></span></h2>
									</div>
									<div class="list-news-latest layered">
										<div class="item-article clearfix">

											<div class="post-image">
												<a href="/blogs/tin-tuc/ron-rang-chao-nha-moi-rinh-uu-dai-cuc-hoi"><img
														src="//file.hstatic.net/1000242782/article/z5892879790854_ea3e223a99cff7c50ec0d9cb2a2305dd_114fc37e2d864fc2becf11b5202d951b_large.jpg"
														alt="RỘN RÀNG CHÀO NHÀ MỚI - RINH ƯU ĐÃI CỰC HỜI"></a>
											</div>

											<div class="post-content">
												<h3>
													<a href="/blogs/tin-tuc/ron-rang-chao-nha-moi-rinh-uu-dai-cuc-hoi">RỘN
														RÀNG CHÀO NHÀ MỚI - RINH ƯU ĐÃI CỰC HỜI</a>
												</h3>
												<span class="author">
													<a href="/blogs/tin-tuc/ron-rang-chao-nha-moi-rinh-uu-dai-cuc-hoi">OTOKE
														ADMIN</a>
												</span>
												<span class="date">
													03.10.2024
												</span>
											</div>
										</div>

										<div class="item-article clearfix">

											<div class="post-image">
												<a href="/blogs/tin-tuc/hanh-trinh-moi"><img
														src="//file.hstatic.net/1000242782/article/441320930_472138265333345_2976942894269866029_n_0164521300314e849498cf46824a0b66_large.jpg"
														alt="MỘT HÀNH TRÌNH MỚI CỦA GÀ RÁN OTOKÉ"></a>
											</div>

											<div class="post-content">
												<h3>
													<a href="/blogs/tin-tuc/hanh-trinh-moi">MỘT HÀNH TRÌNH MỚI CỦA GÀ
														RÁN OTOKÉ</a>
												</h3>
												<span class="author">
													<a href="/blogs/tin-tuc/hanh-trinh-moi">OTOKE ADMIN</a>
												</span>
												<span class="date">
													17.05.2024
												</span>
											</div>
										</div>
										<div class="item-article clearfix">

											<div class="post-image">
												<a
													href="/blogs/tin-tuc/thong-bao-ngung-hoat-dong-otoke-chicken-dao-duy-tu"><img
														src="//file.hstatic.net/1000242782/article/1d70a197-3d70-459d-942d-d08e7500da0f_3aa84b2d19e947bda77dc77fdb57d42e_large.jpeg"
														alt="THÔNG BÁO NGƯNG HOẠT ĐỘNG OTOKE CHICKEN ĐÀO DUY TỪ"></a>
											</div>

											<div class="post-content">
												<h3>
													<a
														href="/blogs/tin-tuc/thong-bao-ngung-hoat-dong-otoke-chicken-dao-duy-tu">THÔNG
														BÁO NGƯNG HOẠT ĐỘNG OTOKE CHICKEN ĐÀO DUY TỪ</a>
												</h3>
												<span class="author">
													<a
														href="/blogs/tin-tuc/thong-bao-ngung-hoat-dong-otoke-chicken-dao-duy-tu">Content</a>
												</span>
												<span class="date">
													01.02.2023
												</span>
											</div>
										</div>
										<div class="item-article clearfix">

											<div class="post-image">
												<a href="/blogs/tin-tuc/lich-hoat-dong-tet-quy-mao-2023"><img
														src="//file.hstatic.net/1000242782/article/535c0765-d98c-4590-9d93-d58bb6591ae7_dfa5256c02d64e0ea36ec6da7aad4606_large.jpeg"
														alt="🧨LỊCH HOẠT ĐỘNG TẾT QUÝ MÃO 2023"></a>
											</div>

											<div class="post-content">
												<h3>
													<a href="/blogs/tin-tuc/lich-hoat-dong-tet-quy-mao-2023">🧨LỊCH HOẠT
														ĐỘNG TẾT QUÝ MÃO 2023</a>
												</h3>
												<span class="author">
													<a href="/blogs/tin-tuc/lich-hoat-dong-tet-quy-mao-2023">Content</a>
												</span>
												<span class="date">
													20.01.2023
												</span>
											</div>
										</div>
										<div class="item-article clearfix">

											<div class="post-image">
												<a
													href="/blogs/tin-tuc/ngap-tran-khong-khi-halloween-tai-otoke-chicken"><img
														src="//file.hstatic.net/1000242782/article/a50ac73b-2b2c-4159-a958-f45e8ea85251_9103d39d0db24248bae2e21d4cc38028_large.jpeg"
														alt="NGẬP TRÀN KHÔNG KHÍ HALLOWEEN TẠI OTOKE CHICKEN"></a>
											</div>

											<div class="post-content">
												<h3>
													<a
														href="/blogs/tin-tuc/ngap-tran-khong-khi-halloween-tai-otoke-chicken">NGẬP
														TRÀN KHÔNG KHÍ HALLOWEEN TẠI OTOKE CHICKEN</a>
												</h3>
												<span class="author">
													<a
														href="/blogs/tin-tuc/ngap-tran-khong-khi-halloween-tai-otoke-chicken">Content</a>
												</span>
												<span class="date">
													03.11.2022
												</span>
											</div>
										</div>

										<div class="item-article clearfix">

											<div class="post-image">
												<a href="/blogs/tin-tuc/lich-hoat-dong-tet-nham-dan-2022"><img
														src="//file.hstatic.net/1000242782/article/img_20220117_185749_5f62885cd2b0468eb45d8cb1c2405ae4_large.jpg"
														alt="🧨LỊCH HOẠT ĐỘNG TẾT NHÂM DẦN 2022"></a>
											</div>

											<div class="post-content">
												<h3>
													<a href="/blogs/tin-tuc/lich-hoat-dong-tet-nham-dan-2022">🧨LỊCH
														HOẠT ĐỘNG TẾT NHÂM DẦN 2022</a>
												</h3>
												<span class="author">
													<a
														href="/blogs/tin-tuc/lich-hoat-dong-tet-nham-dan-2022">Content</a>
												</span>
												<span class="date">
													17.01.2022
												</span>
											</div>
										</div>

									</div>
								</div>

								<div class="menu-blog">
									<div class="group-menu">
										<div class="sidebarblog-title title_block">
											<h2>Danh mục blog<span class="fa fa-angle-down"></span></h2>
										</div>
										<div class="layered layered-category">
											<div class="layered-content">
												<ul class="tree-menu">

													<li class="">
														<span></span>
														<a class="" href="/otoke-chicken/fe/home/index.php" title="TRANG CHỦ" target="_self">
															TRANG CHỦ
														</a>
													</li>

													<li class="">
														<span></span>
														<a class="" href="/otoke-chicken/fe/introduce/introduce.php"
															title="GIỚI THIỆU" target="_self">
															GIỚI THIỆU
														</a>
													</li>
													<li class="">
														<span></span>
														<a class="" href="/otoke-chicken/be/menu/menu.php" title="MENU" target="_self">
															MENU
														</a>
													</li>
													<li class="">
														<span></span>
														<a class="" href="/otoke-chicken/fe/promotion/promotion.php" title="KHUYẾN MÃI"
															target="_self">
															KHUYẾN MÃI
														</a>
													</li>

													<li class="tree-menu-lv1 has-child  menu-collap ">
														<a class="" title="LIÊN HỆ"
															target="_self">
															<span class="">LIÊN HỆ</span>
															<span class="icon-control"><i
																	class="fa fa-minus"></i></span>
														</a>
														<ul class="tree-menu-sub">

															<li>
																<span></span>
																<a href="/blogs/tin-tuc" class="current"
																	title="Tin Tức">Tin Tức</a>
															</li>

															<li>
																<span></span>
																<a href="/blogs/tuyen-dung" title="Tuyển Dụng">Tuyển
																	Dụng</a>
															</li>

															<li>
																<span></span>
																<a href="/pages/dich-vu-tiec" title="Dịch Vụ Tiệc">Dịch
																	Vụ Tiệc</a>
															</li>

															<li>
																<span></span>
																<a href="/pages/he-thong-cua-hang-otoke-chicken"
																	title="Hệ Thống Cửa Hàng">Hệ Thống Cửa Hàng</a>
															</li>

															<li>
																<span></span>
																<a href="https://www.otokechickenfranchise.com/"
																	title="Nhượng Quyền Thương Hiệu">Nhượng Quyền Thương
																	Hiệu</a>
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
						<div class="col-md-9 col-sm-12 col-xs-12">
							<div class="heading-page clearfix">
								<h1>Tin tức</h1>
							</div>
							<div class="blog-content">
								<div class="list-article-content blog-posts">

									<!-- Begin: Nội dung blog -->
									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/ron-rang-chao-nha-moi-rinh-uu-dai-cuc-hoi"
													class="blog-post-thumbnail"
													title="RỘN RÀNG CHÀO NHÀ MỚI - RINH ƯU ĐÃI CỰC HỜI" rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/z5892879790854_ea3e223a99cff7c50ec0d9cb2a2305dd_114fc37e2d864fc2becf11b5202d951b_grande.jpg"
														alt="RỘN RÀNG CHÀO NHÀ MỚI - RINH ƯU ĐÃI CỰC HỜI">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/ron-rang-chao-nha-moi-rinh-uu-dai-cuc-hoi"
														title="RỘN RÀNG CHÀO NHÀ MỚI - RINH ƯU ĐÃI CỰC HỜI">RỘN RÀNG
														CHÀO NHÀ MỚI - RINH ƯU ĐÃI CỰC HỜI</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: OTOKE ADMIN</span>
													<span class="date">
														<time pubdate="" datetime="2024-10-03">03.10.2024</time>
													</span>
												</div>
												<p class="entry-content">Ngay lúc này không khí mừng nhà mới của Otoké
													đã rộn ràng trên con đường Hoa Cúc, Phú Nhuận. Mời bạn đến chơi
													nhận...</p>
											</div>
										</div>
									</article>

									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/hanh-trinh-moi" class="blog-post-thumbnail"
													title="MỘT HÀNH TRÌNH MỚI CỦA GÀ RÁN OTOKÉ" rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/441320930_472138265333345_2976942894269866029_n_0164521300314e849498cf46824a0b66_grande.jpg"
														alt="MỘT HÀNH TRÌNH MỚI CỦA GÀ RÁN OTOKÉ">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/hanh-trinh-moi"
														title="MỘT HÀNH TRÌNH MỚI CỦA GÀ RÁN OTOKÉ">MỘT HÀNH TRÌNH MỚI
														CỦA GÀ RÁN OTOKÉ</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: OTOKE ADMIN</span>
													<span class="date">
														<time pubdate="" datetime="2024-05-17">17.05.2024</time>
													</span>
												</div>
												<p class="entry-content">CHÍNH THỨC: OTOKÉ CÔNG BỐ NHẬN DIỆN THƯƠNG HIỆU
													MỚI&nbsp;Chân thành cảm ơn tình yêu thương và sự ủng hộ của quý
													khách hàng dành...</p>
											</div>
										</div>
									</article>

									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/thong-bao-ngung-hoat-dong-otoke-chicken-dao-duy-tu"
													class="blog-post-thumbnail"
													title="THÔNG BÁO NGƯNG HOẠT ĐỘNG OTOKE CHICKEN ĐÀO DUY TỪ"
													rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/1d70a197-3d70-459d-942d-d08e7500da0f_3aa84b2d19e947bda77dc77fdb57d42e_grande.jpeg"
														alt="THÔNG BÁO NGƯNG HOẠT ĐỘNG OTOKE CHICKEN ĐÀO DUY TỪ">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/thong-bao-ngung-hoat-dong-otoke-chicken-dao-duy-tu"
														title="THÔNG BÁO NGƯNG HOẠT ĐỘNG OTOKE CHICKEN ĐÀO DUY TỪ">THÔNG
														BÁO NGƯNG HOẠT ĐỘNG OTOKE CHICKEN ĐÀO DUY TỪ</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Content</span>
													<span class="date">
														<time pubdate="" datetime="2023-02-01">01.02.2023</time>
													</span>
												</div>
												<p class="entry-content">OTOKÉ CHICKEN CẢM ƠN CÁC BẠN ĐÃ ĐỒNG HÀNH TRONG
													SUỐT CHẶNG ĐƯỜNG VỪA QUA &nbsp;‼️‼️‼️💌 Từ ngày 31.01.2023, Cửa hàng
													OTOKE CHICKEN ĐÀO DUY...</p>
											</div>
										</div>
									</article>
									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/lich-hoat-dong-tet-quy-mao-2023"
													class="blog-post-thumbnail"
													title="🧨LỊCH HOẠT ĐỘNG TẾT QUÝ MÃO 2023" rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/535c0765-d98c-4590-9d93-d58bb6591ae7_dfa5256c02d64e0ea36ec6da7aad4606_grande.jpeg"
														alt="🧨LỊCH HOẠT ĐỘNG TẾT QUÝ MÃO 2023">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/lich-hoat-dong-tet-quy-mao-2023"
														title="🧨LỊCH HOẠT ĐỘNG TẾT QUÝ MÃO 2023">🧨LỊCH HOẠT ĐỘNG TẾT
														QUÝ MÃO 2023</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Content</span>
													<span class="date">
														<time pubdate="" datetime="2023-01-20">20.01.2023</time>
													</span>
												</div>
												<p class="entry-content">&nbsp;🧧Để phục vụ nhu cầu nhâm nhi Gà rán của
													các Fans, Otoké Chicken đã có lịch hoạt động của các cửa hàng trong
													dịp...</p>
											</div>
										</div>
									</article>
									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/ngap-tran-khong-khi-halloween-tai-otoke-chicken"
													class="blog-post-thumbnail"
													title="NGẬP TRÀN KHÔNG KHÍ HALLOWEEN TẠI OTOKE CHICKEN"
													rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/a50ac73b-2b2c-4159-a958-f45e8ea85251_9103d39d0db24248bae2e21d4cc38028_grande.jpeg"
														alt="NGẬP TRÀN KHÔNG KHÍ HALLOWEEN TẠI OTOKE CHICKEN">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/ngap-tran-khong-khi-halloween-tai-otoke-chicken"
														title="NGẬP TRÀN KHÔNG KHÍ HALLOWEEN TẠI OTOKE CHICKEN">NGẬP
														TRÀN KHÔNG KHÍ HALLOWEEN TẠI OTOKE CHICKEN</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Content</span>
													<span class="date">
														<time pubdate="" datetime="2022-11-03">03.11.2022</time>
													</span>
												</div>
												<p class="entry-content">&nbsp;👉👈 Đêm hội hoá trang Halloween đã đến
													với những bạn nhỏ nhà Otoke. Cùng điểm lại những khoảnh khắc dễ
													thương này nhé.&nbsp;🎉 Cực...</p>
											</div>
										</div>
									</article>


									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/lich-hoat-dong-tet-nham-dan-2022"
													class="blog-post-thumbnail"
													title="🧨LỊCH HOẠT ĐỘNG TẾT NHÂM DẦN 2022" rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/img_20220117_185749_5f62885cd2b0468eb45d8cb1c2405ae4_grande.jpg"
														alt="🧨LỊCH HOẠT ĐỘNG TẾT NHÂM DẦN 2022">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/lich-hoat-dong-tet-nham-dan-2022"
														title="🧨LỊCH HOẠT ĐỘNG TẾT NHÂM DẦN 2022">🧨LỊCH HOẠT ĐỘNG TẾT
														NHÂM DẦN 2022</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Content</span>
													<span class="date">
														<time pubdate="" datetime="2022-01-17">17.01.2022</time>
													</span>
												</div>
												<p class="entry-content">&nbsp;🧧Để phục vụ nhu cầu nhâm nhi Gà rán của
													các Fans, Otoké Chicken đã có lịch hoạt động của các cửa hàng trong
													dịp...</p>
											</div>
										</div>
									</article>

									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/danh-sach-cua-hang-otoke-chicken"
													class="blog-post-thumbnail" title="DANH SÁCH CỬA HÀNG OTOKÉ CHICKEN"
													rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/website_banner_1920x760px_otoke_he_thong_cua_hang-01_f1c3b1568f744efd8098bccc5455d78a_grande.jpg"
														alt="DANH SÁCH CỬA HÀNG OTOKÉ CHICKEN">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/danh-sach-cua-hang-otoke-chicken"
														title="DANH SÁCH CỬA HÀNG OTOKÉ CHICKEN">DANH SÁCH CỬA HÀNG
														OTOKÉ CHICKEN</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Chicken Otoke</span>
													<span class="date">
														<time pubdate="" datetime="2021-03-05">05.03.2021</time>
													</span>
												</div>
												<p class="entry-content">Hệ thống cửa hàng Otoké Chicken: &nbsp;Gà rán
													Otoké Lạc Long Quân Địa chỉ: Số 280 Lạc Long Quân, Phường 10, Quận
													11. &nbsp;&nbsp;Gà rán...</p>
											</div>
										</div>
									</article>

									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/thong-bao-lich-mo-cua-otokechicken-tet-tan-suu-2021"
													class="blog-post-thumbnail"
													title="THÔNG BÁO: Lịch mở cửa OTOKÉCHICKEN, Tết Tân Sửu 2021"
													rel="nofollow">
													<img src="https://file.hstatic.net/1000242782/file/vivu-01_63795b8ec5014bc685fa9a4e36ccbd33_grande.jpg"
														alt="THÔNG BÁO: Lịch mở cửa OTOKÉCHICKEN, Tết Tân Sửu 2021">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/thong-bao-lich-mo-cua-otokechicken-tet-tan-suu-2021"
														title="THÔNG BÁO: Lịch mở cửa OTOKÉCHICKEN, Tết Tân Sửu 2021">THÔNG
														BÁO: Lịch mở cửa OTOKÉCHICKEN, Tết Tân Sửu 2021</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Chicken Otoke</span>
													<span class="date">
														<time pubdate="" datetime="2021-02-04">04.02.2021</time>
													</span>
												</div>
												<p class="entry-content">Tết này vẫn giống Tết xưa, Nhà Otoke Chicken
													vẫn mở cửa xuyên tết để phục vụ Fans món gà rán phủ sốt ngon lừng...
												</p>
											</div>
										</div>
									</article>

									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/otoke-chicken-soft-opening-chi-nhanh-234-to-ngoc-van"
													class="blog-post-thumbnail"
													title="OTOKÉ CHICKEN SOFT OPENING CHI NHÁNH 234 TÔ NGỌC VÂN"
													rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/softtongocvan_d78cba224a1348c2ae61d7d043dc4e37_533fb29bb5b2472ea3db7204bf994b6b_grande.png"
														alt="OTOKÉ CHICKEN SOFT OPENING CHI NHÁNH 234 TÔ NGỌC VÂN">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/otoke-chicken-soft-opening-chi-nhanh-234-to-ngoc-van"
														title="OTOKÉ CHICKEN SOFT OPENING CHI NHÁNH 234 TÔ NGỌC VÂN">OTOKÉ
														CHICKEN SOFT OPENING CHI NHÁNH 234 TÔ NGỌC VÂN</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Chicken Otoke</span>
													<span class="date">
														<time pubdate="" datetime="2020-03-16">16.03.2020</time>
													</span>
												</div>
												<p class="entry-content">😋Tin được không? Otoké Chicken đến với quý
													khách hàng ở Thủ Đức đây!😋Từ 13/3 đến 30/3 Otoké Chicken chi nhánh
													234 Tô Ngọc Vân...</p>
											</div>
										</div>
									</article>

									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/otoke-chicken-thong-bao-lich-hoat-dong-tet-nguyen-dan-2020"
													class="blog-post-thumbnail"
													title="OTOKÉ CHICKEN THÔNG BÁO LỊCH HOẠT ĐỘNG TẾT NGUYÊN ĐÁN 2020"
													rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/to1_86b27f0222c34e478428e55fce8283f3_bfdc17ceb2af4f5e9b80b4269984d7f0_grande.jpg"
														alt="OTOKÉ CHICKEN THÔNG BÁO LỊCH HOẠT ĐỘNG TẾT NGUYÊN ĐÁN 2020">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/otoke-chicken-thong-bao-lich-hoat-dong-tet-nguyen-dan-2020"
														title="OTOKÉ CHICKEN THÔNG BÁO LỊCH HOẠT ĐỘNG TẾT NGUYÊN ĐÁN 2020">OTOKÉ
														CHICKEN THÔNG BÁO LỊCH HOẠT ĐỘNG TẾT NGUYÊN ĐÁN 2020</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Chicken Otoke</span>
													<span class="date">
														<time pubdate="" datetime="2020-01-21">21.01.2020</time>
													</span>
												</div>
												<p class="entry-content">🔥&nbsp;OTOKÉ CHICKEN THÔNG BÁO LỊCH HOẠT ĐỘNG
													TẾT NGUYÊN ĐÁN 2020&nbsp;🔥#OtokéChicken&nbsp;trân trọng gửi các
													khách hàng yêu lịch hoạt động Tết Nguyên Đán 2020!💕&nbsp;Những
													cửa...</p>
											</div>
										</div>
									</article>
									<article class="blog-loop">
										<div class="blog-post row">

											<div class="col-md-4 col-xs-12 col-sm-12">
												<a href="/blogs/tin-tuc/taptap-ung-dung-tich-doi-diem-cho-thanh-vien-otoke-chicken-2020"
													class="blog-post-thumbnail"
													title="TAPTAP - Ứng dụng tích - đổi điểm cho các thành viên Otoké Chicken 2020"
													rel="nofollow">
													<img src="//file.hstatic.net/1000242782/article/2020_9f9600dc593c45deabf9fdfc6244096d_0cc461ee8a2844f2949fcb0d2f7272c0_grande.png"
														alt="TAPTAP - Ứng dụng tích - đổi điểm cho các thành viên Otoké Chicken 2020">
												</a>
											</div>

											<div class="col-md-8 col-xs-12 col-sm-12">
												<h3 class="blog-post-title">
													<a href="/blogs/tin-tuc/taptap-ung-dung-tich-doi-diem-cho-thanh-vien-otoke-chicken-2020"
														title="TAPTAP - Ứng dụng tích - đổi điểm cho các thành viên Otoké Chicken 2020">TAPTAP
														- Ứng dụng tích - đổi điểm cho các thành viên Otoké Chicken
														2020</a>
												</h3>
												<div class="blog-post-meta">
													<span class="author vcard">Người viết: Chicken Otoke</span>
													<span class="date">
														<time pubdate="" datetime="2020-01-14">14.01.2020</time>
													</span>
												</div>
												<p class="entry-content">TÍCH "𝐕𝐔𝐈" TAPTAP - ĐỔI GÀ SẬP SÀN -
													𝐎𝐭𝐨𝐤𝐞́ 𝐂𝐡𝐢𝐜𝐤𝐞𝐧 đã có mặt trên Ứng dụng tích, đổi điểm
													𝐓𝐀𝐏𝐓𝐀𝐏 -Ở chương trình ưu...</p>
											</div>
										</div>
									</article>

								</div>
								<div id="pagination" class="clearfix">

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</main>


		<div class="back-to-top hidden show">
			<a>
				<div class="btt-back">
					<span class="btt-label-back">back to top</span>
					<span class="btt-icon-back"><i class="fa fa-long-arrow-up"></i></span>
				</div>
			</a>
		</div>
	</div>
	<div id="site-nav--mobile" class="site-nav style--sidebar">
		<div id="site-navigation" class="site-nav-container">
			<div class="site-nav-container-last">
				<p class="title">Menu</p>
				<div class="main-navbar">
					<nav class="primary-menu">
						<ul class="menu-collection">


							<li class="navi1"><a href="/otoke-chicken/fe/home/index.php"><span>TRANG CHỦ</span></a></li>



							<li class="navi1"><a href="/otoke-chicken/fe/introduce/introduce.php"><span>GIỚI THIỆU</span></a></li>



							<li class="navi1"><a href="/otoke-chicken/be/menu/menu.php"><span>MENU</span></a></li>



							<li class="navi1"><a href="/otoke-chicken/fe/promotion/promotion.php"><span>KHUYẾN MÃI</span></a></li>



							<li class="navi1 has-sub level0">
								<a href="/">LIÊN HỆ</a>
								<span class="icon-subnav"><i class="fa fa-angle-down"></i></span>
								<ul class=" submenu subnav-children">


									<li class="navi2"><a href="/otoke-chicken/fe/contact/news/news.php">Tin Tức</a></li>

									<li class="navi2"><a href="/blogs/tuyen-dung">Tuyển Dụng</a></li>

									<li class="navi2"><a href="/pages/dich-vu-tiec">Dịch Vụ Tiệc</a></li>

									<li class="navi2"><a href="/pages/he-thong-cua-hang-otoke-chicken">Hệ Thống Cửa
											Hàng</a></li>

									<li class="navi2"><a href="/otoke-chicken/fe/contact/franchise-cooperation/franchise-cooperation.php">Nhượng Quyền
											Thương Hiệu</a></li>

								</ul>
							</li>


						</ul>
						<ul class="menu-about">

							<li><a href="/pages/"><span>Chính sách bảo mật thông tin</span></a></li>

							<li><a href="/search"><span>Tìm kiếm</span></a></li>

							<li class="login">
								<a href="/account/login">
									<span>
										<svg class="svg-account" version="1.1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="510px"
											height="510px" viewBox="0 0 510 510"
											style="enable-background:new 0 0 510 510;" xml:space="preserve">
											<g>
												<g id="account-circle">
													<path
														d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M255,76.5
												 c43.35,0,76.5,33.15,76.5,76.5s-33.15,76.5-76.5,76.5c-43.35,0-76.5-33.15-76.5-76.5S211.65,76.5,255,76.5z M255,438.6
												 c-63.75,0-119.85-33.149-153-81.6c0-51,102-79.05,153-79.05S408,306,408,357C374.85,405.45,318.75,438.6,255,438.6z">
													</path>
												</g>
											</g>
										</svg>
									</span>
									<span>Đăng nhập</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="to-bottom-content">
					<div class="site-copyright">
						<p class="copy">Copyright © 2024 <a href="https://otokechicken.vn">Gà Rán Otoké</a></p>
						<p class="powered"><a target="_blank"
								href="https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=onlinestore">Powered
								by Haravan</a></p>
					</div>
				</div>
			</div>

		</div>
		<div id="site-cart" class="site-nav-container" tabindex="-1">
			<div class="site-nav-container-last">
				<p class="title">Giỏ hàng</p>
				<div class="cart-view clearfix">
					<table id="clone-item-cart" class="table-clone-cart">
						<tbody>
							<tr class="item_2 hidden">
								<td class="img"><a href="" title=""><img src="" alt=""></a></td>
								<td>
									<a class="pro-title-view" href="" title=""></a>
									<span class="variant"></span>
									<span class="pro-quantity-view"></span>
									<span class="pro-price-view"></span>
									<span class="remove_link remove-cart">
									</span>
								</td>
							</tr>
						</tbody>
					</table>
					<table id="cart-view">

						<tbody>
							<tr>
								<td>Hiện chưa có sản phẩm</td>
							</tr>

						</tbody>
					</table>
					<span class="line"></span>
					<table class="table-total">
						<tbody>
							<tr>
								<td class="text-left">TỔNG TIỀN:</td>
								<td class="text-right" id="total-view-cart">0₫</td>
							</tr>
							<tr>
								<td><a href="/cart" class="linktocart button dark">Xem giỏ hàng</a></td>
								<td><a href="/checkout" class="linktocheckout button dark">Thanh toán</a></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<div id="site-search" class="site-nav-container" tabindex="-1">
			<div class="site-nav-container-last">
				<p class="title">Tìm kiếm</p>
				<div class="search-box wpo-wrapper-search">
					<form action="/search" class="searchform searchform-categoris ultimate-search navbar-form">
						<div class="wpo-search-inner">
							<input type="hidden" name="type" value="product">
							<input required="" id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
								class="searchinput input-search search-input" type="text" size="20"
								placeholder="Tìm kiếm sản phẩm...">
						</div>
						<button type="submit" class="btn-search btn" id="search-header-btn">
							<svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 27"
								style="enable-background:new 0 0 24 27;" xml:space="preserve">
								<path
									d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
								</path>
								<rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
									width="4" height="8"></rect>
							</svg>
						</button>
					</form>
					<div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
						<div class="resultsContent"></div>
					</div>
				</div>
			</div>
		</div>

		<button id="site-close-handle" class="site-close-handle" aria-label="Đóng" title="Đóng">
			<span class="hamburger-menu active" aria-hidden="true"><span class="bar animate"></span></span>
		</button>
	</div>
	<div id="site-overlay" class="site-overlay"></div>
	<!-- haravan app -->

	<div class="modal fade modal-productApp" id="alert_km" tabindex="-1" role="dialog" aria-labelledby="alert_km"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close  close-modal-app" data-dismiss="modal" aria-hidden="true">
						<span aria-hidden="true">
							<svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0">
								<path
									d="m10.7 9.2-3.8-3.8 3.8-3.7c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0l-3.8 3.7-3.8-3.7c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l3.8 3.7-3.8 3.8c-.4.4-.4 1 0 1.4.2.2.5.3.7.3.3 0 .5-.1.7-.3l3.8-3.8 3.8 3.8c.2.2.4.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4z">
								</path>
							</svg>
						</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Thông báo khuyến mãi</h4>
				</div>
				<div class="modal-body">
					<p>Số lượng đặt sản phẩm <span style="color: rgb(229, 0, 0)"></span> của bạn chưa đủ để được
						tặng/giảm sản phẩm <span id="prod_km_alert"></span></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn button dark" data-dismiss="modal">Ở lại trang</button>
					<button type="button" class="btn button dark" id="discount-promotion-dismiss-buyxgety"> Vẫn thêm vào
						giỏ hàng</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END - haravan app -->

	<!-- Messenger Plugin chat Code -->
	<div id="fb-root"></div>

	<!-- Your Plugin chat code -->
	<div id="fb-customer-chat" class="fb-customerchat" page_id="522712798069839" attribution="biz_inbox">
	</div>

	<?php
	include '../../utils/footer.php'
	?>
	<script src="../contact.js"></script>
	<script src="../../utils/search.js"></script>
	<script src="../../home/final.js"></script>
</body>

</html>