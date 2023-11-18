<?php 

class Motor extends Controller {
    public function detail($id = null) {
        if(is_null($id)) return Redirect::to('');
        $motocycle = $this->model('Motocycle_model')->getDetailMotocycle($id);
            $datas['title'] = 'Detail motor';
            $datas['motocycle'] = $motocycle;
            $this->view('penyewa/detail-motor', $datas);
        
    }

}