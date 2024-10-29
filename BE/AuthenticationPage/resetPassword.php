<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/connect.php";

$sql = "SELECT * FROM users
        WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Mật khẩu mới</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="authPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form-container">
        <section class="form-left">
            <h1 class="form-title">Mật khẩu mới</h1>
        </section>
        <section class="form-right">
            <form id="reset-password-form" method="post" action="process-reset-password.php" onsubmit="return validateNewPasswordForm()">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

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