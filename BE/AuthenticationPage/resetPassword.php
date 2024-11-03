<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = $_POST["token"];
    $token_hash = hash("sha256", $token);

    $mysqli = require __DIR__ . "/../connect.php";


    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null) {
        $_SESSION['error_message'] = "Bạn cần gửi yêu cầu đổi mật khẩu mới";
    } elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
        $_SESSION['error_message'] = "Yêu cầu đã hết hạn";
    } else {
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password_hash = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("ss", $password_hash, $user["id"]);

        if ($stmt->execute()) {
            $_SESSION['resetPass_success'] = true;
        } else {
            $_SESSION['error_message'] = "Lỗi khi cập nhật mật khẩu.";
        }
    }

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mật khẩu mới</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="authPage.css">
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_SESSION['resetPass_success']) && $_SESSION['resetPass_success'] === true) {
        echo "<script>
            swal('Tạo mới mật khẩu thành công!', '', 'success')
            .then(() => {
                window.location.href = 'loginPage.php';
            });
        </script>";
        unset($_SESSION['resetPass_success']);
    }

    if (isset($_SESSION['error_message'])) {
        echo "<script>
            swal('Lỗi đổi mật khẩu!', '" . $_SESSION['error_message'] . "', 'error');
        </script>";
        unset($_SESSION['error_message']);
    }
    ?>
    <div class="form-container">
        <section class="form-left">
            <h1 class="form-title">Mật khẩu mới</h1>
        </section>
        <section class="form-right">
            <form id="reset-password-form" method="post" action="" onsubmit="return validateNewPasswordForm()">
                <input type="hidden" name="token" value="<?= htmlspecialchars($_GET["token"] ?? "") ?>">

                <div class="input-group">
                    <span class="error-message" id="password-error" style="color: red;"></span>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới" required>
                </div>

                <div class="input-group">
                    <span class="error-message" id="confirmation-error" style="color: red;"></span>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                </div>

                <button type="submit" class="btn">Gửi</button>
            </form>
        </section>
    </div>
    <script src="validateForm.js"></script>
</body>

</html>