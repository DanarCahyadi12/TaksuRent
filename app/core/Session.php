<?php
class Session {
    public static function set($name,$datas){
        $_SESSION[$name] = $datas;
    }

    public static function get($name){
        if(isset($_SESSION[$name])) return $_SESSION[$name];
    }
    
    public static function exits($name) {
        return isset($_SESSION[$name]) ?  true : false;
    }

    public static function delete($name){
        unset($_SESSION[$name]);

    }

    public static function destroy($name){
        unset($_SESSION[$name]);
        session_destroy();

    }
}