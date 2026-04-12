<?php

// Load the auth file so the session starts
require "add/auth.php";

// Start the session so PHP knows which one to destroy
session_start();

// Clear all session variables
$_SESSION = [];

// 3. Destroy the session cookie and data on the server
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// Send them back to the login page with a success message
header("Location: login.php?message=loggedout");
exit;

// Stop the script from executing any further code
exit;