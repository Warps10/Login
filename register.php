<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['registerUsername'];
    $password = $_POST['registerPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password === $confirmPassword) {
        $stmt = $conn->prepare("INSERT INTO admin (user, pass) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password); // Use $password directly
        $stmt->execute();
        $stmt->close();

        header('Location: index.html?register_success=true');
        exit;
    } else {
         header('Location: index.html?register_error=true');
        exit;
}
}
?>