<?php
require_once 'models/User.php';
require_once 'session_helper.php';

class AuthController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function login($username, $password) {
        $user = $this->user->getUser($username);
        if ($user && password_verify($password, $user)) {
            setSessionAndCookie($username);
            redirectTo('views/dashboard.php');
        } else {
            echo "Invalid credentials or user not found.";
        }
    }

    public function register($username, $password) {
        if (!$this->user->getUser($username)) {
            $this->user->addUser($username, $password);
            redirectTo('views/login.php');
        } else {
            echo "User already exists.";
        }
    }
}
?>
