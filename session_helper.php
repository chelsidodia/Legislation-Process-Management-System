<?php
session_start();

function setSessionAndCookie($username) {
    $_SESSION['username'] = $username;
    setcookie('username', $username, time() + (86400 * 30), "/");
}

function getSessionUsername() {
    return $_SESSION['username'] ?? $_COOKIE['username'] ?? null;
}

function redirectTo($location) {
    header("Location: $location");
    exit;
}
?>
