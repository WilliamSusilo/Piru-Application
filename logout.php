<?php 

session_start();

// sdeleting session
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

?>