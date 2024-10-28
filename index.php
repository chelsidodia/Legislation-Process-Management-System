<?php
require_once 'session_helper.php';


if (!getSessionUsername()) {
    header("Location: views/login.php");
} else {
    header("Location: views/dashboard.php");
}
exit;
?>