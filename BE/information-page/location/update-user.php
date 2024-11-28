<?php
session_start();
$mysqli = require __DIR__ . '../../../connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = isset($_POST['user_id']) ? intval(trim($_POST['user_id'])) : 0;
    $firstName = isset($_POST['fName']) ? htmlspecialchars(trim($_POST['fName'])) : '';
    $lastName = isset($_POST['lName']) ? htmlspecialchars(trim($_POST['lName'])) : '';
    $locationUser = isset($_POST['location']) ? htmlspecialchars(trim($_POST['location'])) : '';
    $phoneUser = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';

    $stmt = $mysqli->prepare("UPDATE users SET firstName = ?, lastName = ?, locationUser = ?, phoneUser = ? WHERE user_id = ?");
    $stmt->bind_param("ssssi", $firstName, $lastName, $locationUser, $phoneUser, $userId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['update_success'] = true;
        } else {
            $_SESSION['error_message'] = "Không có thay đổi nào được thực hiện.";
        }
    } else {
        $_SESSION['error_message'] = "Lỗi trong quá trình cập nhật.";
    }

    $stmt->close();
    header("Location: ../location/location.php");
    exit();
}

$mysqli->close();
