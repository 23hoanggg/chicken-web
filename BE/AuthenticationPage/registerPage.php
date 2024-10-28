<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo tài khoản - Gà rán Otoké</title>
    <link rel="icon" href="../../icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="authPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="form-container" id="signup">
        <section class="form-left">
            <h1 class="form-title">Tạo tài khoản</h1>
            <hr>
        </section>
        <section class="form-right">
            <form method="post" action="logicAuth.php">
                <div class="input-group">
                    <input type="text" name="fName" id="fName" placeholder="Họ" required>
                </div>
                <div class="input-group">
                    <input type="text" name="lName" id="lName" placeholder="Tên" required>
                </div>
                <div class="input-group">
                    <label for="male">Nam</label>
                    <input type="radio" name="gender" id="male" value="male" required>

                    <label for="female">Nữ</label>
                    <input type="radio" name="gender" id="female" value="female" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                </div>
                <input type="submit" class="btn" value="ĐĂNG KÝ" name="signUp">
            </form>
            <div class="links">
                <p>Bạn đã có tài khoản ?</p>
                <p class="recover">
                    <a href="loginPage.php" id="registerTav">Đăng nhập</a>
                </p>
            </div>
        </section>
    </div>
</body>

</html>