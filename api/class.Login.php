<?php

class Login {
    public static function getLoggedInUser() {
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
        return null;
    }
    public static function logout() {
        unset($_SESSION['user']);
    }
    public static function isLoggedIn($uname, $false_redir) {
        if($_SESSION['user']['username']==$uname) {
            return true;
        }
        return false;
    }
}