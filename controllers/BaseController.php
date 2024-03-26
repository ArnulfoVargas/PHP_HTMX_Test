<?php 
    class baseController {
        public function index(){
            require_once(ROOT."/views/baseIndex.php");
        }

        public function login(){
            echo "login";
        }

    }