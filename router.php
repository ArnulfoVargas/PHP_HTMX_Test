<?php 
    class Router {
        public $controller;
        public $method;
        private $dir;

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

            $this->dir =  __DIR__ ."/controllers/".$this->controller.".php";

            if (!file_exists( $this->dir )) {
                return;
            }

            require_once($this->dir);
        }

        public function run(){
            if (!class_exists($this->controller)) {
                $this->ErrNotFound();
                return;
            }

            $controller = new $this->controller();

            if (!method_exists($controller, $this->method)) {
                $this->ErrNotFound();
                return;
            } 

            $method = $this->method;
            $controller->$method();
       }

        private function ErrNotFound(){
            require_once(__DIR__."/views/404.php");
        }
    }