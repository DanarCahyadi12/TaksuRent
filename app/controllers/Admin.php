<?php 

class Admin extends Controller {
    public function index() {
        $datas['title'] = "Admin Page";
        $this->view('templates/header',$datas);
        $this->view('admin/index');
        $this->view('templates/footer');
    }
}