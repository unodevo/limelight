<?php 

// Starting the session
session_start();

// Check if the user is logged in, if yes then logout
if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] === true) {
    // Unset all session values 
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
}

// Redirect to login page
header('Location: admin_login.php');
exit;

?>
