<?php 
class NotFound extends Controller {
    public function index() {
        $datas['title'] = '404 not found';
        $this->view('templates/header', $datas);
        $this->view('notfound');
        $this->view('templates/footer');
    }
}