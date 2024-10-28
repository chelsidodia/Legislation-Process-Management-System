<?php
class User {
    private $file = 'data/users.json';

    public function __construct() {
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([]));
        }
    }

    public function getUser($username) {
        $users = json_decode(file_get_contents($this->file), true);
        return $users[$username] ?? null;
    }

    public function addUser($username, $password) {
        $users = json_decode(file_get_contents($this->file), true);
        $users[$username] = password_hash($password, PASSWORD_DEFAULT);
        file_put_contents($this->file, json_encode($users));
    }
}
?>
