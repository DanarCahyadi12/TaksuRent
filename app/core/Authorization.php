<?php 
class Authorization {

    public static function allowPermission($level) {
        $user = Session::get('user');
        $role = $user['role'];
        if ($role == $level) return true;
        return false;
        
    }

    public static function isLoggedIn($name) {
        $isLoggedIn = Session::exits($name);
        return $isLoggedIn ? true : false;
    }
}