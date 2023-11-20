<?php 

class Login_penyewa extends Controller {
    public function index() {
        $datas['title'] = "Login sebagai penyewa";
        $this->view('penyewa/login',$datas);
    }

    public function authentication() {
        if(count($_POST) == 0) return Redirect::to('login-penyewa');

        $usernameOrEmail = $_POST['email_username'];
        $password = $_POST['password'];

        $user = $this->model('Penyewa_model')->findOneByEmailOrUsername($usernameOrEmail);
        if(!$user) {
            Flasher::setFlasher('<p class="text-danger">Username, email atau password salah</p>');
            return Redirect::to('login-penyewa');
        }
        $hashedPassword = $user['password'];
        $passwordMatch = password_verify($password, $hashedPassword);
        if(!$passwordMatch) {
            Flasher::setFlasher('<p class="text-danger">Username, email atau password salah</p>');
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