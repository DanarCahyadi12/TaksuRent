<?php

function url($path) {
    return BASE_URL . "/" .$path;
}


function getProtocol() {
   return  isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
}
