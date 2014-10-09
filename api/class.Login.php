<?php

class Login {
    public static function getLoggedInUser() {
        return $_SESSION['user'];
    }
    public static function logout() {
        unset($_SESSION['user']);
    }
    public static function isLoggedIn($uname, $redir_path) {
        if($_SESSION['user']['username']==$uname) {
            return true;
        }
        return false;
    }
}