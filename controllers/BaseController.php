<?php 
    class baseController {
        public function index(){
            require_once("./views/home.php");
        }

        public function login(){
            echo "login";
        }

    }