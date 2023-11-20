<?php

class Register extends Controller {
    public function index() {
        $datas['title'] = 'Register sebagai operator   ';
        $this->view('backoffice/register', $datas);
    }

    public function register() {
        if(count($_POST) == 0) return Redirect::to('register');
        $user = $this->model('Users_model')->findOneByUsername($_POST['username']);
        if($user) {
            Flasher::setFlasher('<p class="text-danger">Username sudah terdaftar</p>');
            return Redirect::to('register');
        }
        $user = $this->model('Users_model')->findOneByEmail($_POST['email']);
        if($user) {
            Flasher::setFlasher('<p class="text-danger">Email sudah terdaftar</p>');
            return Redirect::to('register');
        }
        if(strlen($_POST['password']) < 8) {
            Flasher::setFlasher('<p class="text-danger">Password harus lebih dari 8 karakter</p>');
            return Redirect::to('register');
        }
        
        $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $datas = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashedPassword,
            'role' => $_POST['role'],
        ];
        $result =  $this->model('Users_model')->create($datas);
        if($result) {
            $redirectURL = url('login');
            Flasher::setFlasher("<p class='text-success'> Register berhasil. Silahkan <a href='$redirectURL'>login</a> pada akun anda </p>");
            return Redirect::to('register');
        }
    }
}