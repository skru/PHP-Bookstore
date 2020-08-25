<?php
session_start();

// Unset all of the session variables.
$_SESSION = array();
setcookie(session_name(), '', time() - 42000);
// delete session
session_destroy();
// redirect user to home page and set success GET variable
header('Location: /index.php?success=logout');
?>