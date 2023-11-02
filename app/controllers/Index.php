<?php 

class Index extends Controller {
    public function index() {
        $datas['title'] = "Taksu rent | sewa motor";
        $datas['motocycles'] = $this->getMotocycle();
        if(Session::exits('result_motocycles')) $datas['motocycles'] = Session::get('result_motocycles');
        $this->view('templates/header',$datas);
        $this->view('penyewa/index',$datas);
        $this->view('templates/footer');
        if(Session::exits('result_motocycles')) Session::delete('result_motocycles');
    }

    private function getMotocycle() {
        $motocycles = $this->model('Motocycle_model')->findManyMotocycle(); 
        return $motocycles;
    }
    public function cari() {
        $query = $_POST['search'];
        if(!$query) return Redirect::to('');
        $motocycles = $this->model('Motocycle_model')->searchMotocycles($query);
        Session::set('result_motocycles', $motocycles);
        Redirect::to('');
    }

}   