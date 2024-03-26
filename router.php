<?php 
    class Router {
        public $controller;
        public $method;

        public function __construct() {
          $this->matchRoute();
        }

        public function matchRoute(){
            $url = explode("/", URL);

            switch (count($url)) {
                case 4:
                    $this->controller = $url[2]."Controller";
                    $this->method = $url[3];
                    break;
                case 3:
                    $this->controller = $url[1] . "Controller";
                    $this->method = $url[2];
                    break;
                case 2:
                    $this->controller = "baseController";
                    $this->method = empty($url[1]) ? "index" : $url[1];
                    break;
            }

            require_once(__DIR__ ."/controllers/".$this->controller.".php");
        }

        public function run(){
            $controller = new $this->controller();
            $method = $this->method;
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                require_once("./views/404.php");
            }
        }
    }