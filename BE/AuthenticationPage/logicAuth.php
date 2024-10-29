<?php

include 'connect.php';

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
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password_hash, gender, roleUser)
                        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $password_hash, $gender, $roleUser);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Register successfully.');
                    window.location.href = 'loginPage.php';
                </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
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
            session_start();
            $_SESSION['email'] = $row['email'];

            // header("Location: information.php");
            echo "<script>
                    alert('Login successfully.');
                    window.location.href = '../InformationPage/information.php';
                </script>";
            exit();
        } else {
            echo "Incorrect Email or Password";
        }
    } else {
        echo "Not Found, Incorrect Email or Password";
    }
}
