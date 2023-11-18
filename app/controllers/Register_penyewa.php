<?php

class Register_penyewa extends Controller {
    public function index() {
        $datas['title'] = 'Register sebagai penyewa';
        $this->view('penyewa/register-penyewa', $datas);
    }

    public function register() {
        if(count($_POST) == 0) return Redirect::to('register-penyewa');
        $user = $this->model('Penyewa_model')->findOneByUsername($_POST['username']);
        if($user) {
            Flasher::setFlasher('<p class="text-danger">Username sudah terdaftar</p>');
            return Redirect::to('register-penyewa');
        }
        $user = $this->model('Penyewa_model')->findOneByTelpon($_POST['username']);
        if($user) {
            Flasher::setFlasher('<p class="text-danger">Nomer telepon sudah terdaftar</p>');
            return Redirect::to('register-penyewa');
        }
        $user = $this->model('Penyewa_model')->findOneByEmail($_POST['email']);
        if($user) {
            Flasher::setFlasher('<p class="text-danger">Email sudah terdaftar</p>');
            return Redirect::to('register-penyewa');
        }
        if(strlen($_POST['password']) < 8) {
            Flasher::setFlasher('<p class="text-danger">Password harus lebih dari 8 karakter</p>');
            return Redirect::to('register-penyewa');
        }

        $result =  $this->model('Penyewa_model')->createPenyewa($_POST);
        if($result) {
            $redirectURL = url('login-penyewa');
            Flasher::setFlasher("<p class='text-success'> Register berhasil. Silahkan <a href='$redirectURL'>login</a> pada akun anda </p>");
            return Redirect::to('register-penyewa');
        }
    }
};