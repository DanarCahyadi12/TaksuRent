<?php 
class Auth {


    public static function user() {
        if(Session::exits('user')) {
            return Session::get('user');
        }
    }

    public static function operator() {
        if(Session::exits('operator')) {
            return Session::get('operator');
        }
    }

    public function admin() {
        if(Session::exits('admin')) {
            return Session::get('admin');
        }
    }

}