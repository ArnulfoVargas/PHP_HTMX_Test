<?php 
    class pageController{
        public function home(){
            echo"home";
        }

        public function about(){
            echo"about";
        }

        public function test(){
            include_once("./views/test.php");
        }
    }