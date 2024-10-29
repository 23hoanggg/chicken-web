<?php
$mysqli = require __DIR__ . "/connect.php";

$email = $_POST["email"];

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
        var_dump($email);


        // $mail->setFrom("chickenOtoke@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
                Click <a href="http://localhost/OtokeChicken/BE/AuthenticationPage/resetPassword.php?token=$token">here</a> 
                to reset your password.
            END;

        try {
            $mail->send();
            echo
            "<script>
                alert('Kiểm tra hòm thư của bạn và phục hồi mật khẩu');
                window.location.href = 'loginPage.php';
            </script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found or no changes made.";
    }
} else {
    echo "Error updating token: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
