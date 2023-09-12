<?php

class App {
    protected $controller = 'Login';
    protected $method =  'index';
    protected $params= [];
    public function __construct(){
        $uri = $_SERVER['REQUEST_URI'];
        $path = str_replace('index.php', "",$_SERVER['SCRIPT_NAME']);
        $uri = str_replace($path,"",$uri);
        $url = $this->parseUrl($uri);
        
        if(is_null($url)){
            require_once "../app/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller,$this->method],$this->params);
            return;
        }

        if(file_exists("../app/controllers/" . $url[0] . ".php")){
            $this->controller = $url[0];
            unset($url[0]);
        }else{
            require_once "../app/controllers/NotFound.php";
            $this->controller = 'NotFound';
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller,$this->method],$this->params);
            return;    
        }
        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                require_once "../app/controllers/NotFound.php";
                $this->controller = 'NotFound';
                $this->controller = new $this->controller;
                call_user_func_array([$this->controller,$this->method],$this->params);
                return;
            }
        }
        
        if(!empty($url)){
            $this->params = array_values($url);
            
        }
        call_user_func_array([$this->controller,$this->method],$this->params);

    }

    public function parseUrl($url){
        if($url) return explode('/', rtrim(filter_var($url,FILTER_SANITIZE_URL),'/'));
    }
}