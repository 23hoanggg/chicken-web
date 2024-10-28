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
    <div class="form-container" id="signIn">
        <section class="form-left">
            <h1 class="form-title">Đăng nhập</h1>
            <hr>
        </section>
        <section class="form-right">
            <form method="post" action="logicAuth.php">
                <div class="input-group">
                    <input type="email" name="email" id="loginEmail" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="loginPassword" placeholder="Mật khẩu" required>
                </div>
                <input type="submit" class="btn" value="ĐĂNG NHẬP" name="signIn">
            </form>
            <div class="links">
                <p class="recover">
                    <a href="recoverPass.php" id="recoverTab">Quên mật khẩu ?</a>
                </p>
                <p>Hoặc</p>
                <p class="recover">
                    <a href="registerPage.php" id="registerTav">Đăng ký</a>
                </p>
            </div>
        </section>
    </div>
    <!-- <div style="display:none;" id="recoverPassword">
        <div>
            <section class="form-left">
                <h1 class="form-title">Phục hồi mật khẩu</h1>
            </section>
            <form action="logicAuth.php" method="POST">
                <input type="email" name="email" id="loginEmail" placeholder="Email" require>
                <input type="submit" class="btn" value="Gửi" name="recoverPass">
            </form>
            <div class="links">
                <p class="recover">
                    <a id="cancelTab">Hủy</a>
                </p>
            </div>
        </div>
    </div> -->
    <!-- <script src="recover.js"></script> -->
</body>

</html>