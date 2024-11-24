<?php
include_once __DIR__ . "/../../connect.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản - Gà rán Otoké</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="../../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../utils/authPage.css">
    <link rel="stylesheet" href="../../../fe/contact/contact.css">
    <link rel="stylesheet" href="../../../fe/utils/header.css">
    <link rel="stylesheet" href="../../../fe/utils/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['sendMail_success'])) {
        echo "<script>
            swal('Hãy kiểm tra email của bạn !', '', 'success')
            .then(() => {
                window.location.href = '../handle-auth/login-page.php';
            });
          </script>";
        unset($_SESSION['sendMail_success']);
    }

    if (isset($_SESSION['error_message'])) {
        $error_message = addslashes($_SESSION['error_message']);
        echo "<script>
            swal('Có lỗi xảy ra !', '$error_message', 'error');
          </script>";
        unset($_SESSION['error_message']);
    }
    ?>
    <?php
    include '../../../fe/utils/header.php';
    ?>
    <div id="resetPassword" class="form-container">
        <section class="form-left">
            <h1 class="form-title">Phục hồi mật khẩu</h1>
            <hr class="hr-auth">
        </section>
        <div class="form-right">
            <form action="send-pass-handle.php" method="POST" onsubmit="return validateResetPasswordForm()">
                <div class="input-group">
                    <span class="error-message" id="emailError"></span>
                    <input type="email" name="email" id="loginEmail" placeholder="Email">
                </div>
                <div class="action-group">
                    <div class="action-button">
                        <input type="submit" class="btn" value="Gửi" name="resetPass">
                    </div>
                    <div class="links">
                        <p class="reset">
                            <a href="../handle-auth/login-page.php" id="cancelTab">Hủy</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    include '../../../fe/utils/footer.php';
    ?>
    <script src="../utils/validateForm.js"></script>
    <script src="../../../fe/home/final.js"></script>
    <script src="../../../fe/contact/contact.js"></script>
    <script src="../../../fe/utils/search.js"></script>
</body>

</html>