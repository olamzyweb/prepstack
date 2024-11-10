<?php
session_start(); // Start the session

// Destroy all session data
session_unset(); // Unset session variables
session_destroy(); // Destroy the session

// Redirect to the login page (or homepage)
header("Location: login.html");
exit(); // Exit to prevent further execution
?>