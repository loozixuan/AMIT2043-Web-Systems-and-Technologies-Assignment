<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 

// Redirect to login page after click logout
header("location: serverLogin.php");
echo"<h3>{$_SESSION['login_user']}, you're sucessfully log out</h3>";
exit;
?>