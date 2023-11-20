<?php 

class Denda extends Controller {
    public function index() {
        if(!Auth::user()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login-penyewa');
        }
        $datas['denda'] = $this->model('Denda_model')->getManyById(Auth::user()['id']);
        $datas['title'] = 'Denda anda';
        $this->view('penyewa/denda', $datas);
    }
}