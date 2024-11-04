<?php
$mysqli = require __DIR__ . "/../../connect.php";

session_start();

if (!isset($_POST["email"]) || empty(trim($_POST["email"]))) {
    $_SESSION['error_message'] = "Email không hợp lệ!";
    header("Location: mail-pass-page.php");
    exit;
}

$email = trim($_POST["email"]);

$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$sql = "UPDATE users
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $token_hash, $expiry, $email);

if ($stmt->execute()) {
    if ($mysqli->affected_rows) {
        $mail = require __DIR__ . "/mailer.php";

        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
                Mở đường dẫn <a href="http://localhost/otoke-chicken/be/authentication-page/handle-mail/renew-pass-page.php?token=$token">Đặt lại mật khẩu</a> 
                để tạo mới mật khẩu cho tài khoản của bạn !!!
            END;

        try {
            $mail->send();
            $_SESSION['sendMail_success'] = true;
            header("Location: mail-pass-page.php");
            exit;
        } catch (Exception $e) {
            $_SESSION['error_message'] = 'Không thể gửi tin nhắn. Lỗi trình gửi thư: ' . $mail->ErrorInfo;
            header("Location: mail-pass-page.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Không tìm thấy email!";
        header("Location: mail-pass-page.php");
        exit;
    }
} else {
    $_SESSION['error_message'] = "Lỗi khi cập nhật mã thông báo: " . $stmt->error;
    header("Location: mail-pass-page.php");
    exit;
}

$stmt->close();
$mysqli->close();
