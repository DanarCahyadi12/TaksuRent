<?php 

class Login_operator extends Controller {
    public function index() {
        $datas['title'] = "Login sebagai admin";
        $this->view('backoffice/login', $datas);
    }

    
    public function login() {
        if(count($_POST) == 0) return Redirect::to('login-operator');

        $usernameOrEmail = $_POST['email_username'];
        $password = $_POST['password'];

        $user = $this->model('Users_model')->findOneOperatorByEmailOrUsername($usernameOrEmail);
        $hashedPassword = $user['password'];
        $passwordMatch = password_verify($password, $hashedPassword);
        if(!$passwordMatch) {
            Flasher::setFlasher('<p class="text-danger">Username, email atau password salah</p>');
            return Redirect::to('login-operator');
        }

        $user = [
            'id'=> $user['id'],
            'username'=> $user['username'],
            'email'=> $user['email'],
            'no_telpon'=> $user['no_telpon'],
            'alamat'=> $user['alamat'],
            'role' => 'operaotr',
        ];
        Session::set('operator',$user);
        Redirect::to('operator');



    }

    
}