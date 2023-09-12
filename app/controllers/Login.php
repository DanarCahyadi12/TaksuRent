<?php


class Login extends Controller {
    public function index(){
        $datas['title'] = 'Login';
        $this->view('templates/Header',$datas);
        $this->view('login');
        $this->view('templates/Footer');   
     }

     public function auth(){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $user = $this->model('UserModel')->getUserByEmail($_POST['email']);
            if(!$user){
                Flasher::setFlasher('Email atau password salah','login','error');
                Redirect::to('');
                return;
            }

            $hashedPassword = $user['password'];
            if(!password_verify($_POST['password'],$hashedPassword)){
                Flasher::setFlasher('Email atau password salah','login','error');
                Redirect::to('login');
                return;
            }
            $user = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'level' => $user['level'],

            ];

            Session::set('user',$user);
            $user['level'] ? Redirect::to('admin') : Redirect::to('dashboard');

        }
     }
}
