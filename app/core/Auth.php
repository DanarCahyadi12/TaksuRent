<?php 

class Auth {
    public static function isLogin() {
        return Session::exits('user') ? true : false;
    }

}