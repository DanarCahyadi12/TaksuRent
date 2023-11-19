<?php 

class Login_admin extends Controller {
    public function index() {
        $datas['title'] = "Login sebagai admin";
        $this->view('admin/login', $datas);
    }
}