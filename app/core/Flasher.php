<?php

class Flasher{

    public static function setFlasher($message,$action,$type){
        $_SESSION['flasher'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type
        ];
    }

    public static function getFlasher(){
        if(isset($_SESSION['flasher'])) return  $_SESSION['flasher'];
    }

    public static function destroyFlasher() {
        unset($_SESSION['flasher']);
    }

    public static function exits(){
        return isset($_SESSION['flasher']) ? true : false;
    }
}