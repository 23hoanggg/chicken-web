<?php
session_start();
include_once __DIR__ . "/../../connect.php";

if (!isset($_SESSION['email'])) {
    header("Location: ../../authentication-page/handle-auth/login-page.php");
    exit();
}

$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT firstName, lastName, email, locationUser FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản - gà rán Otoké</title>
    <link rel="stylesheet" href="../../../fe/utils/header.css">
    <link rel="stylesheet" href="../../../fe/utils/footer.css">
    <link rel="stylesheet" href="../../../fe/contact/contact.css">
    <link rel="icon" href="../../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="information.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../../../fe/utils/header.php'; ?>

    <div class="info-container">
        <section class="info-title-box">
            <h1 class="title-info-container">Tài khoản của bạn</h1>
            <hr class="hr-information">
        </section>
        <div class="info-box">
            <section class="info-menu">
                <h3 class="title-info-box">TÀI KHOẢN</h3>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                            <path fill="currentColor" d="M28.012 28.023c5.578 0 10.125-4.968 10.125-11.015c0-6-4.5-10.711-10.125-10.711c-5.555 0-10.125 4.805-10.125 10.758c.023 6.023 4.57 10.968 10.125 10.968m0-3.539c-3.422 0-6.352-3.28-6.352-7.43c0-4.077 2.883-7.218 6.352-7.218c3.515 0 6.351 3.094 6.351 7.172c0 4.148-2.883 7.476-6.351 7.476m-14.719 25.22h29.438c3.89 0 5.742-1.173 5.742-3.75c0-6.142-7.735-15.024-20.461-15.024c-12.727 0-20.485 8.883-20.485 15.023c0 2.578 1.852 3.75 5.766 3.75m-1.125-3.54c-.61 0-.867-.164-.867-.656c0-3.844 5.953-11.04 16.71-11.04c10.759 0 16.688 7.196 16.688 11.04c0 .492-.234.656-.843.656Z" />
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
                <h3 class="title-info-box">THÔNG TIN TÀI KHOẢN</h3>
                <div class="account-info">
                    <?php if ($user): ?>
                        <p><?= $user['firstName'] . ' ' . $user['lastName'] ?></p>
                        <p><?= $user['email'] ?></p>
                        <p><?= $user['locationUser'] ?></p>
                        <a href="../location/location.php">Xem địa chỉ</a>
                    <?php else: ?>
                        <p>Không tìm thấy thông tin người dùng</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
    <?php include '../../../fe/utils/footer.php'; ?>
    <script src="../../../fe/contact/contact.js"></script>
    <script src="../../../fe/utils/search.js"></script>
    <script src="../../../fe/home/final.js"></script>
</body>

</html>