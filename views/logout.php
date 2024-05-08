<?php
session_start();

unset($_SESSION['auth']);

setcookie("auth_cookie", "", time() - 3600, "/");

header("Location: login.php");
exit;
?>