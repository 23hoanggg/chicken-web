<?php
session_start();
if (!isset($_SESSION['notification'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <style>
        .alert-box {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            z-index: 1000;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s, transform 0.5s;
        }

        .alert-box.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div class="alert-box"><?php echo $_SESSION['notification']; ?></div>

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const alertBox = document.querySelector('.alert-box');
            alertBox.classList.add('show');

            setTimeout(() => {
                alertBox.classList.remove('show');
                alertBox.remove();
                window.location.href = "<?php echo $_SESSION['redirect_url']; ?>";
            }, 1000);
        });
    </script>
</body>

</html>

<?php
unset($_SESSION['notification']);
unset($_SESSION['redirect_url']);
?>