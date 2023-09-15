<?php 

class Auth {
    public static function isLogin() {
        return Session::exits('user') ? true : false;
    }

    public function permission($sessionName,$hasAccess) {
        $user = Session::get($sessionName);
        $level = $user['level'];
        return $level == $hasAccess ? true : false;
    }
}