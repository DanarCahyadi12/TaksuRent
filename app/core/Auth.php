<?php 
class Auth {

    public static function allowPermission($level) {
        $user = Session::get('user');
        $role = $user['role'];
        if ($role == $level) return true;
        return false;
        
    }

    public static function user() {
        if(Session::exits('user')) {
            return Session::get('user');
        }
    }

}