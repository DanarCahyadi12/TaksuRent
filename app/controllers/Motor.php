<?php 

class Motor extends Controller {
    public function detail($id) {
        $motocycle = $this->model('Motocycle_model')->getDetailMotocycle($id);
        $datas['title'] = 'Detail motor';
        $this->view('templates/header', $datas);
        if(!$motocycle) return $this->view('notfound');
        $this->view('penyewa/detail-motor', $datas);
        $this->view('templates/footer', $datas);
    }

}