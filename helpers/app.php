<?php 

    namespace App;

    class app{
        public static function view($view, $data = null){

            if(!empty($data)){
                extract($data);
            }

            require "../views/" . $view . ".php";           
            
        }
    }