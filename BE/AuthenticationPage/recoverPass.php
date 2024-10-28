<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản - Gà rán Otoké</title>
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="authPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="recoverPassword" class="form-container">
        <section class="form-left">
            <h1 class="form-title">Phục hồi mật khẩu</h1>
            <hr>
        </section>
        <div class="form-right">
            <form action="sendPassword.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" id="loginEmail" placeholder="Email" require>
                </div>
                <input type="submit" class="btn" value="Gửi" name="recoverPass">
            </form>
            <div class="links">
                <p class="recover">
                    <a href="loginPage.php" id="cancelTab">Hủy</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>