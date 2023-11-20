<?php 

class Operator extends Controller {
    public function index() {
        $datas['title'] = "Operator Page";
        $this->view('templates/users/header',$datas);
        $this->view('backoffice/operator/index');
        $this->view('templates/users/footer');
    }
}