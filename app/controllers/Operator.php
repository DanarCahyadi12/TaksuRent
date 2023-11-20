<?php 

class Operator extends Controller {
    public function index() {

        if(!Auth::operator()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login-operator');
        }
        $datas['title'] = "Operator Page";
        $this->view('templates/users/header',$datas);
        $this->view('backoffice/operator/index');
        $this->view('templates/users/footer');
    }


    public function giveResponse($id = null) {
        if(is_null($id)) {
            return Redirect::to('operator');
        }
    }

}