<?php

class Register_operator extends Controller {
    public function index() {
        $datas['title'] = 'Register sebagai operator   ';
        $this->view('backoffice/operator/register-operator', $datas);
    }
}