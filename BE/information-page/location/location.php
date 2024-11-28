<?php
session_start();
include_once __DIR__ . "/../../connect.php";

$row = null;
if (!isset($_SESSION['email'])) {
    header("Location: ../../authentication-page/handle-auth/login-page.php");
    exit();
} else {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Không tìm thấy thông tin người dùng";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Địa chỉ - gà rán Otoké</title>
    <link rel="stylesheet" href="location.css">
    <link rel="stylesheet" href="../../../fe/utils/header.css">
    <link rel="stylesheet" href="../../../fe/utils/footer.css">
    <link rel="stylesheet" href="../../../fe/contact/contact.css">
    <link rel="icon" href="../../../icon.svg" type="image/svg+xml">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include '../../../fe/utils/header.php';
    ?>
    <?php
    if (isset($_SESSION['update_success']) && $_SESSION['update_success'] === true) {
        echo "<script>
            swal('Cập nhật thành công!', '', 'success')
            .then(() => {
            
                window.location.href = '../information/information.php';
            });
          </script>";
        unset($_SESSION['update_success']);
    }

    if (isset($_SESSION['error_message'])) {
        echo "<script>
            swal('Lỗi cập nhật!', '" . $_SESSION['error_message'] . "', 'error')
            .then(() => {
                window.location.href = '../information/information.php';
            });
          </script>";
        unset($_SESSION['error_message']);
    }
    ?>


    <div class="info-container">
        <section class="info-title">
            <h1 class="title-info-container">Tài khoản của bạn</h1>
            <hr class="hr-location">
        </section>
        <div class="info-box">
            <section class="info-menu">
                <h3 class="title-info-box">TÀI KHOẢN</h3>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                            <path fill="currentColor"
                                d="M28.012 28.023c5.578 0 10.125-4.968 10.125-11.015c0-6-4.5-10.711-10.125-10.711c-5.555 0-10.125 4.805-10.125 10.758c.023 6.023 4.57 10.968 10.125 10.968m0-3.539c-3.422 0-6.352-3.28-6.352-7.43c0-4.077 2.883-7.218 6.352-7.218c3.515 0 6.351 3.094 6.351 7.172c0 4.148-2.883 7.476-6.351 7.476m-14.719 25.22h29.438c3.89 0 5.742-1.173 5.742-3.75c0-6.142-7.735-15.024-20.461-15.024c-12.727 0-20.485 8.883-20.485 15.023c0 2.578 1.852 3.75 5.766 3.75m-1.125-3.54c-.61 0-.867-.164-.867-.656c0-3.844 5.953-11.04 16.71-11.04c10.759 0 16.688 7.196 16.688 11.04c0 .492-.234.656-.843.656Z" />
                        </svg>
                        <a href="../information/information.php">Thông tin tài khoản</a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                            <path fill="currentColor" d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4a2 2 0 0 0 0 4z" />
                        </svg>
                        <a href="../location/location.php">Danh sách địa chỉ</a>
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2" />
                                <path d="M9 12h12l-3-3m0 6l3-3" />
                            </g>
                        </svg>
                        <a href="../../authentication-page/handle-auth/logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </section>
            <section class="info-full">
                <div class="title-location-container">
                    <h3 class="title-info-box"> <?php
                                                if ($row) {
                                                    echo $row['firstName'] . ' ' . $row['lastName'];
                                                }
                                                ?></h3>
                    <button onclick="toggleForm()" style="margin-bottom: 20px; background-color: white;border:none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 21 21">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                d="M17 4a2.121 2.121 0 0 1 0 3l-9.5 9.5l-4 1l1-3.944l9.504-9.552a2.116 2.116 0 0 1 2.864-.125zM9.5 17.5h8m-2-11l1 1" />
                        </svg>
                    </button>
                </div>

                <div class="form-update">
                    <form action="update-user.php" method="post" onsubmit="return validateUpdateForm()">
                        <input type="hidden" name="user_id" value="<?= isset($row['user_id']) ? htmlspecialchars($row['user_id']) : '' ?>">
                        <div class="input-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M332.64 64.58C313.18 43.57 286 32 256 32c-30.16 0-57.43 11.5-76.8 32.38c-19.58 21.11-29.12 49.8-26.88 80.78C156.76 206.28 203.27 256 256 256s99.16-49.71 103.67-110.82c2.27-30.7-7.33-59.33-27.03-80.6ZM432 480H80a31 31 0 0 1-24.2-11.13c-6.5-7.77-9.12-18.38-7.18-29.11C57.06 392.94 83.4 353.61 124.8 326c36.78-24.51 83.37-38 131.2-38s94.42 13.5 131.2 38c41.4 27.6 67.74 66.93 76.18 113.75c1.94 10.73-.68 21.34-7.18 29.11A31 31 0 0 1 432 480Z" />
                            </svg>
                            <input type="text" id="fName" name="fName" placeholder="Họ" value="<?= isset($row['firstName']) ? htmlspecialchars($row['firstName']) : '' ?>">
                            <span id="fNameError" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M332.64 64.58C313.18 43.57 286 32 256 32c-30.16 0-57.43 11.5-76.8 32.38c-19.58 21.11-29.12 49.8-26.88 80.78C156.76 206.28 203.27 256 256 256s99.16-49.71 103.67-110.82c2.27-30.7-7.33-59.33-27.03-80.6ZM432 480H80a31 31 0 0 1-24.2-11.13c-6.5-7.77-9.12-18.38-7.18-29.11C57.06 392.94 83.4 353.61 124.8 326c36.78-24.51 83.37-38 131.2-38s94.42 13.5 131.2 38c41.4 27.6 67.74 66.93 76.18 113.75c1.94 10.73-.68 21.34-7.18 29.11A31 31 0 0 1 432 480Z" />
                            </svg>
                            <input type="text" id="lName" name="lName" placeholder="Tên" value="<?= isset($row['lastName']) ? htmlspecialchars($row['lastName']) : '' ?>">
                            <span id="lNameError" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                <path fill="currentColor" d="M8 1.4L6 2.7V1H4v3L0 6.6l.6.8L8 2.6l7.4 4.8l.6-.8z" />
                                <path fill="currentColor" d="M8 4L2 8v7h5v-3h2v3h5V8z" />
                            </svg>
                            <input type="text" id="location" name="location" placeholder="Địa chỉ" value="<?= isset($row['locationUser']) ? htmlspecialchars($row['locationUser']) : '' ?>">
                            <span id="locationError" class="error-message"></span>
                        </div>
                        <div class="input-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <g fill="currentColor">
                                    <path d="M22 12A10.002 10.002 0 0 0 12 2v2a8.003 8.003 0 0 1 7.391 4.938A8 8 0 0 1 20 12h2ZM2 10V5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H6a8 8 0 0 0 8 8v-2a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5C7.373 22 2 16.627 2 10Z" />
                                    <path d="M17.543 9.704A5.99 5.99 0 0 1 18 12h-1.8A4.199 4.199 0 0 0 12 7.8V6a6 6 0 0 1 5.543 3.704Z" />
                                </g>
                            </svg>
                            <input type="text" id="phone" name="phone" placeholder="Số điện thoại" value="<?= isset($row['phoneUser']) ? htmlspecialchars($row['phoneUser']) : '' ?>">
                            <span id="phoneError" class="error-message"></span>
                        </div>
                        <div class="btn-action">
                            <button type="submit" class="update-btn">Cập nhật</button>
                            <button type="button" onclick="toggleForm()" class="cancel-btn">Hủy</button>
                        </div>
                    </form>
                </div>

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
    <?php
    include '../../../fe/utils/footer.php';
    ?>
    <script src="updateForm.js"></script>
    <script src="../../../fe/contact/contact.js"></script>
    <script src="../../../fe/utils/search.js"></script>
    <script src="../../../fe/home/final.js"></script>
</body>

</html>