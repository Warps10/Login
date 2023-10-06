<?php
include 'db_connection.php';  // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user, pass FROM admin WHERE user = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($storedUsername, $storedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($storedUsername && $password === $storedPassword) {
        // Set a cookie to remember the user
        setcookie("username", $username, time() + 3600, "/"); // Cookie expires in 1 hour

        // Redirect to the dashboard or any other page as needed
        header('Location: dash.php');
        exit;
    } else {
        // Redirect to the login page with an error message
        header('Location: index.html?login_error=true');
        exit;
    }
}
?>