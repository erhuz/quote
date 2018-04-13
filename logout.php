<?php

session_start();

// Log out
unset($_SESSION);
$_SESSION = array();

// redirect
header("location: /");
exit;