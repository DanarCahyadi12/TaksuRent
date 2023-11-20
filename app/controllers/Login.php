<?php 

class Login extends Controller {
    public function index() {
        $datas['title'] = "Login sebagai admin atau operator";
        $this->view('backoffice/login', $datas);
    }

    
    public function login() {
        if(count($_POST) == 0) return Redirect::to('login');

        $usernameOrEmail = $_POST['email_username'];
        $password = $_POST['password'];

        $user = $this->model('Users_model')->findOneByEmailOrUsername($usernameOrEmail);
        if(!$user) {
            Flasher::setFlasher('<p class="text-danger">Username, email atau password salah</p>');
            return Redirect::to('login');
        }
        $hashedPassword = $user['password'];
        $passwordMatch = password_verify($password, $hashedPassword);
        if(!$passwordMatch) {
            Flasher::setFlasher('<p class="text-danger">Username, email atau password salah</p>');
            return Redirect::to('login');
        }

        $user = [
            'id'=> $user['id'],
            'username'=> $user['username'],
            'email'=> $user['email'],
            'role' => $user['level'],
        ];

        
        if($user['role']) {
            Session::set('admin',$user);
            Redirect::to('admin');
            
        }else{
            Session::set('operator',$user);
            Redirect::to('operator');
        }
        



    }

    
}