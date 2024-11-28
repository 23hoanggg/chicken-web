<?php

include_once __DIR__ . "/../../connect.php";

session_start();

// Register
if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $roleUser = 'customer';

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $checkEmail = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "Địa chỉ Email đã tồn tại !";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password_hash, gender, roleUser)
                        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $password_hash, $gender, $roleUser);

        if ($stmt->execute()) {
            $_SESSION['register_success'] = "Giờ hãy đăng nhập để tiếp tục";
            header("Location: register-page.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Error: " . $stmt->error;
        }
    }
    header("Location: register-page.php");
    exit();
}


// Login
if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['login_success'] = true;
            header("Location: login-page.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Email hoặc mật khẩu không chính xác";
        }
    } else {
        $_SESSION['error_message'] = "Không tìm thấy người dùng với email này";
    }
    header("Location: login-page.php");
    exit();
}
