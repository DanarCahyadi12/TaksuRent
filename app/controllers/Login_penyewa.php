<?php 

class Login_penyewa extends Controller {
    public function index() {
        $datas['title'] = "Login sebagai penyewa";
        $this->view('templates/header',$datas);
        $this->view('penyewa/login');
        $this->view('templates/footer');
    }
}