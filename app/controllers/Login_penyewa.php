<?php 

class Login_penyewa extends Controller {
    public function index() {
        $datas['title'] = "Login sebagai penyewa";
        $this->view('templates/header',$datas);
        $this->view('penyewa/login');
        $this->view('templates/footer');
    }

    public function authentication() {
        if(count($_POST) == 0) return Redirect::to('login-penyewa');

        $usernameOrEmail = $_POST['email_username'];
        $password = $_POST['password'];

        $user = $this->model('Penyewa_model')->findOneByEmailOrUsername($usernameOrEmail);
        $hashedPassword = $user['password'];
        $passwordMatch = password_verify($password, $hashedPassword);
        if(!$passwordMatch) {
            Flasher::setFlasher('Username, email atau password salah','login','error');
            return Redirect::to('login-penyewa');
        }

        $user = [
            'id'=> $user['id'],
            'username'=> $user['username'],
            'email'=> $user['email'],
            'no_telpon'=> $user['no_telpon'],
            'alamat'=> $user['alamat'],
            'role' => 'user',
        ];
        Session::set('user',$user);
        Redirect::to('');



    }

}