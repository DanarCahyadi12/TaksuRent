<?php 

class Transaksi extends Controller {
public function index() {
        if(!Auth::user()) {
            Flasher::setFlasher('<p class="text-danger">Silahkan login pada akun anda terlebih dahulu</p>');
            return Redirect::to('login-penyewa');
        }
        $datas['title'] = 'Transaksi';
        $datas['transaksi'] = $this->model('Transaksi_model')->getTransaction(Auth::user()['id']);
        $this->view('penyewa/transaksi',$datas);

    }
}