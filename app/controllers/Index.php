<?php 

class Index extends Controller {
    public function index() {
        $datas['title'] = "Taksu rent | sewa motor";
        $datas['motocycles'] = $this->getMotocycle();
        $this->view('templates/header',$datas);
        $this->view('penyewa/index',$datas);
        $this->view('templates/footer');
    }

    private function getMotocycle() {
        $motocycles = $this->model('Motocycle_model')->findManyMotocycle(); 
        return $motocycles;
    }
}