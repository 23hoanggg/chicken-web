<?php
include_once __DIR__ . "/../connect.php";
include 'functionProducts.php';
include 'add_to_cart.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu Sản Phẩm</title>
  <link rel="icon" href="../../icon.svg" type="image/svg+xml">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="menu.css" />
</head>

<body>
  <!-- Fixed header -->
  <header class="header">
    <div class="logo">
      <a href="/otoke-chicken/fe/home/home.php">
        <img src="https://theme.hstatic.net/1000242782/1000838257/14/fastorder_02_header_logo.png?v=590"
          alt="Gà Rán Otoke" class="logo-img" />
      </a>
    </div>
  </header>

  <!-- Main content area with 3 columns -->
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <ul class="menu-list">
        <li class="menu-item active">
          <img src="https://file.hstatic.net/1000242782/collection/img_5730_89346f006a004885a5d2fa67a3f10583_thumb.png"
            alt="" />
          <span>Gà Rán - Cơm - Burger</span>
        </li>
        <li class="menu-item">
          <img src="https://file.hstatic.net/1000242782/collection/nhom_san_pham-01_75b077ffb5f94e53bf1f5c7ea09a6a9c_thumb.jpg"
            alt="" />
          <span>Otoké Combo</span>
        </li>
        <li class="menu-item">
          <img src="https://file.hstatic.net/1000242782/collection/nhom_san_pham-02-01-01_c69aa42a5a944a34b1067d35e5fd8e9e_thumb.jpg"
            alt="" />
          <span>Thức ăn kèm</span>
        </li>
        <li class="menu-item">
          <img src="https://file.hstatic.net/1000242782/collection/nhom_san_pham-02-01-013-01_777b166133874099b219774378eb0db5_thumb.jpg"
            alt="" />
          <span>Tráng miệng & Thức uống</span>
        </li>
        <li class="menu-item">
          <img src="https://file.hstatic.net/1000242782/collection/web_2d7d275686304426965755fb666781e6_thumb.jpg"
            alt="" />
          <span>Khuyến mãi</span>
        </li>
      </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
      <div class="search-bar">
        <input type="text" placeholder="Nhập tên hoặc SKU để tìm kiếm sản phẩm..." />
      </div>

      <!-- Gà rán-cơm-bugger -->
      <div>
        <h3 id="Chicken">GÀ RÁN - BURGER - CƠM</h3>
        <div class="product-grid">
          <?php
          // Giả sử Type = 1 là cho Gà rán, Burger, Cơm
          echo displayProducts($conn, 1); // Gọi hàm với Type = 1
          ?>
        </div>
      </div>

      <!-- combo -->
      <div>
        <h3 id="Combo">CÁC PHẦN COMBO</h3>
        <div class="product-grid">
          <?php
          echo displayProducts($conn, 2); // Gọi hàm với Type = 2
          ?>
        </div>
      </div>

      <!-- ăn kèm -->
      <div>
        <h3>THỨC ĂN KÈM</h3>
        <div class="product-grid">
          <?php
          echo displayProducts($conn, 3); // Gọi hàm với Type = 3
          ?>
        </div>
      </div>

      <!-- thức uống -->
      <div>
        <h3>NƯỚC UỐNG</h3>
        <div class="product-grid">
          <?php
          echo displayProducts($conn, 4); // Gọi hàm với Type = 4
          ?>
        </div>
      </div>

      <!-- Khuyến mãi -->
      <div>
        <h3>KHUYẾN MÃI</h3>
        <div>Không tìm thấy sản phẩm</div>
      </div>
    </div>
    <!-- Checkout Section -->
    <div class="checkout">
      <div class="cart-summary">
        <button class="checkout-btn" onclick="window.location.href='checkout.php'">THANH TOÁN</button>
        <?php
        // Kiểm tra giỏ hàng
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          $cart = $_SESSION['cart'];

          // Lấy danh sách ID sản phẩm từ giỏ hàng
          $cart_ids = array_column($cart, 'id');

          // Kiểm tra danh sách ID sản phẩm
          if (!empty($cart_ids)) {
            // Tạo chuỗi ID để sử dụng trong truy vấn SQL
            $id_list = implode(',', array_map('intval', $cart_ids));

            // Truy vấn thông tin sản phẩm từ CSDL
            $sql = "SELECT product_id, product_name, description, price, image_url 
                        FROM products 
                        WHERE product_id IN ($id_list)";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
              // Hiển thị thông tin sản phẩm
              while ($product = $result->fetch_assoc()) {
                // Tìm sản phẩm tương ứng trong giỏ hàng
                foreach ($cart as $cart_item) {
                  if ($cart_item['id'] == $product['product_id']) {
        ?>
                    <div class="product-details">
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

          // Đóng kết nối
          $conn->close();
        } else {
          echo "Giỏ hàng của bạn trống.";
        }
        ?>

      </div>
      <form method="POST" action="place_order.php">
        <input type="hidden" name="action" value="place_order">
        <button type="submit" class="order-btn">ĐẶT HÀNG</button>
      </form>
    </div>

  </div>
  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <div class="footer-logo">
        <img src="https://theme.hstatic.net/1000242782/1000838257/14/fastorder_02_footer_logo.png?v=596" alt="">
        <div class="footer-icon-container">
          <div class="icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
              <path fill="currentColor" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669c1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </div>
          <div class="icon-box">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
              <path fill="currentColor" d="M12 0C8.74 0 8.333.015 7.053.072C5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053C.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913a5.885 5.885 0 0 0 1.384 2.126A5.868 5.868 0 0 0 4.14 23.37c.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558a5.898 5.898 0 0 0 2.126-1.384a5.86 5.86 0 0 0 1.384-2.126c.296-.765.499-1.636.558-2.913c.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913a5.89 5.89 0 0 0-1.384-2.126A5.847 5.847 0 0 0 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071c1.17.055 1.805.249 2.227.415c.562.217.96.477 1.382.896c.419.42.679.819.896 1.381c.164.422.36 1.057.413 2.227c.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227a3.81 3.81 0 0 1-.899 1.382a3.744 3.744 0 0 1-1.38.896c-.42.164-1.065.36-2.235.413c-1.274.057-1.649.07-4.859.07c-3.211 0-3.586-.015-4.859-.074c-1.171-.061-1.816-.256-2.236-.421a3.716 3.716 0 0 1-1.379-.899a3.644 3.644 0 0 1-.9-1.38c-.165-.42-.359-1.065-.42-2.235c-.045-1.26-.061-1.649-.061-4.844c0-3.196.016-3.586.061-4.861c.061-1.17.255-1.814.42-2.234c.21-.57.479-.96.9-1.381c.419-.419.81-.689 1.379-.898c.42-.166 1.051-.361 2.221-.421c1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678a6.162 6.162 0 1 0 0 12.324a6.162 6.162 0 1 0 0-12.324zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4s-1.79 4-4 4zm7.846-10.405a1.441 1.441 0 0 1-2.88 0a1.44 1.44 0 0 1 2.88 0z" />
            </svg>
          </div>
        </div>
      </div>

      <div class="footer-store-system">
        <div class="store-system-box">
          <h3>Hệ thống cửa hàng</h3>
          <ul class="list-location">
            <li><a href="">Hồ Chí Minh</a></li>
            <li><a href="">Đồng Nai</a></li>
            <li><a href="">Phan Thiết</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-customer-support">
        <div class="customer-support-box">
          <h3>Hỗ trợ khách hàng</h3>
          <ul class="list-contact">
            <li>Hotline 19009480</li>
            <li>Mã số doanh nghiệp: 0318255183</li>
            <li>Địa chỉ: 665 Quốc lộ 13, Khu phố 3, Phường Hiệp Bình Phước, TP. Thủ Đức, Việt Nam</li>
            <li>Mail: callcenter@otokechicken.vn</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="license-box">
      <hr>
      <p style="color: white;">Copyright © 2020 Gà Rán Otoké.</p>
    </div>
  </footer>


  <script>
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
      // Lấy giá trị hiện tại của số lượng
      var quantityInput = document.getElementById('quantity-' + productId);
      var quantity = parseInt(quantityInput.value);

      // Cập nhật số lượng theo hành động (tăng hoặc giảm)
      if (action === 'increase') {
        quantity++;
      } else if (action === 'decrease' && quantity > 1) {
        quantity--;
      }

      // Cập nhật lại giá trị trong input
      quantityInput.value = quantity;

      // Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm trong giỏ hàng
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "update_quantity.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function() {
        if (xhr.status == 200) {
          // Nếu cập nhật thành công, tính lại giá
          var priceElement = document.getElementById('price-' + productId);
          var pricePerUnit = parseFloat(priceElement.dataset.price); // Lấy giá sản phẩm từ data-attribute
          priceElement.textContent = (pricePerUnit * quantity).toFixed(2).replace('.', ',') + " VNĐ";
        }
      };
      xhr.send("product_id=" + productId + "&quantity=" + quantity);
    }
  </script>

</body>

</html>