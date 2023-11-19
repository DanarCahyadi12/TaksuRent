<?php 
class NotFound extends Controller {
    public function index() {
        $datas['title'] = '404 not found';
        $this->view('notfound', $datas);
    }
}