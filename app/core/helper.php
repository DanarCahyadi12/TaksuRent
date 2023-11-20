<?php

function url($path) {
    return BASE_URL . "/" .$path;
}


function getProtocol() {
   return  isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
}


function formatDate($date) {
    $months = ['Januari', 'Februari','Maret','April','Mei','Juni','Juli','August','September','Oktober','November','Desember'];
    $month = explode('-',$date)[1];
    return explode('-',$date)[2] ." ". $months[$month-1] ." " . explode('-',$date)[0];
}