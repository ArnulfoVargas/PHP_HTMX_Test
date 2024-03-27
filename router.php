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

            foreach ($url as $path){
                if (empty($path)){
                    continue;
                }

                $dir = ROOT."/controllers/".$path."Controller.php";

                if (empty($this->controller)){
                    if (file_exists($dir)) {
                        $this->controller = $path."Controller";
                    }
                } else {
                    $this->method = $path;
                }
            }

            if (empty($this->controller)){
                $this->controller = "baseController";
            }
            if (empty($this->method)){
                $this->method = "index";
            }

            $this->dir = ROOT."/controllers/".$this->controller.".php";

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

            if (str_contains($this->method,"?")){
                $this->method = explode("?", $this->method)[0];
            }

            if (!method_exists($controller, $this->method)) {
                $this->ErrNotFound();
                return;
            } 

            $method = $this->method;
            $controller->$method();
       }

        private function ErrNotFound(){
            require_once(ROOT."/views/404.php");
        }
    }