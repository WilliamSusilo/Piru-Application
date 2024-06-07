<?php 

session_start();

// deleting session
$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

?>