<?php
session_start();

// Log out
unset($_SESSION['user_id']);
unset($_SESSION['user_pwd']);
unset($_SESSION);
$_SESSION = array();

// redirect
header("location: /?mess=logged out");
exit;