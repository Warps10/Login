<?php
// Expire the username cookie to "log out" the user
setcookie("username", "", time() - 3600, "/");
header('Location: index.html');
exit;
?>