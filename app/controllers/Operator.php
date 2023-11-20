<?php 

class Operator extends Controller {
    public function index() {

        if(!Auth::operator()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login');
        }
        $datas['title'] = "Operator Page";
        $datas['transaksi'] = $this->model('Transaksi_model')->getMany();
        $datas['operator'] = Auth::operator();
        $this->view('templates/users/header',$datas);
        $this->view('backoffice/operator/index', $datas);
        $this->view('templates/users/footer');
    }


    public function giveResponse($id = null) {
        if(is_null($id)) {
            return Redirect::to('operator');
        }
    }

    public function logout() {
        if(Session::get('operator')) {
            Session::destroy('operator');
        }
    }

}