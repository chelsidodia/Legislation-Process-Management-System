<?php
require_once 'session_helper.php';

// Redirect to login page if user isn't logged in
if (!getSessionUsername()) {
    header("Location: views/login.php");
} else {
    header("Location: views/dashboard.php");
}
exit;
?>