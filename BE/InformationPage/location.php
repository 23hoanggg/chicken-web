<?php
session_start();
include_once __DIR__ . "/../connect.php";

$row = null;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Không tìm thấy thông tin người dùng";
    }
} else {
    echo "Vui lòng đăng nhập";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa chỉ - gà rán Otoké</title>
    <link rel="stylesheet" href="location.css">
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === true) {
        echo "<script>
            swal('Cập nhật thành công!', '', 'success')
            .then(() => {
                window.location.href = 'information.php';
            });
          </script>";
        unset($_SESSION['update_success']);
    }

    if (isset($_SESSION['error_message'])) {
        echo "<script>
            swal('Lỗi cập nhật!', '" . $_SESSION['error_message'] . "', 'error')
            .then(() => {
                window.location.href = 'information.php';
            });
          </script>";
        unset($_SESSION['error_message']);
    }
    ?>
    
    <div class="info-container">
        <section class="info-title-box">
            <h1 class="title-info-container">Tài khoản của bạn</h1>
            <hr>
        </section>
        <div class="info-box">
            <section class="info-menu">
                <h3 class="title-info-box">TÀI KHOẢN</h3>
                <ul>
                    <li>
                        <a href="information.php">Thông tin tài khoản</a>
                    </li>
                    <li>
                        <a href="location.php">Danh sách địa chỉ</a>
                    </li>
                    <li>
                        <a href="../AuthenticationPage/logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </section>
            <section class="info-full">
                <h3 class="title-info-box">Địa chỉ của bạn</h3>
                <section>
                    <button>Thay đổi thông tin</button>
                    <div class="form-update">
                        <form action="updateUser.php" method="post">
                            <input type="hidden" name="id" value="<?= isset($row['id']) ? htmlspecialchars($row['id']) : '' ?>">
                            <div class="input-group">
                                <input type="text" name="fName" placeholder="Họ" value="<?= isset($row['firstName']) ? htmlspecialchars($row['firstName']) : '' ?>">
                            </div>
                            <div class="input-group">
                                <input type="text" name="lName" placeholder="Tên" value="<?= isset($row['lastName']) ? htmlspecialchars($row['lastName']) : '' ?>">
                            </div>
                            <div class="input-group">
                                <input type="text" name="location" placeholder="Địa chỉ" value="<?= isset($row['locationUser']) ? htmlspecialchars($row['locationUser']) : '' ?>">
                            </div>
                            <div class="input-group">
                                <input type="text" name="phone" placeholder="Số điện thoại" value="<?= isset($row['phoneUser']) ? htmlspecialchars($row['phoneUser']) : '' ?>">
                            </div>
                            <button type="submit">Cập nhật</button>
                            <button>Hủy</button>
                        </form>
                    </div>
                </section>
                <div class="account-info">
                    <?php
                    if ($row) {
                        echo $row['firstName'] . ' ' . $row['lastName'];
                        echo '<br>Địa chỉ: ' . $row['locationUser'];
                        echo '<br>Số điện thoại: ' . $row['phoneUser'];
                    }
                    ?>
                </div>
            </section>
        </div>
    </div>
    <script src="updateForm.js"></script>
</body>

</html>
