<?php

class Flasher{

    public static function setFlasher($message){
        $_SESSION['flasher'] = [
            'message' => $message,
        ];

    }

    public static function getFlasher() {
        if(isset($_SESSION['flasher'])) {
            echo $_SESSION['flasher']['message'];
            unset($_SESSION['flasher']);
        }
    }

}