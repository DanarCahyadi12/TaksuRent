<?php 

class Index extends Controller {
    public function index() {
        $datas['title'] = "Taksu rent | sewa motor";
        $this->view('templates/header',$datas);
        $this->view('penyewa/index/index');
        $this->view('templates/footer');
    }
}