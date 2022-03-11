<?php 


    namespace App;

    class router{

        private static $name;
        private static $args;

        public static function __callStatic($name, $args)
        {

            self::$name = $name;
            self::$args = $args;
        
            self::HttpStatus();

        }

        public static function HttpStatus()
        {


            if(self::$name == "get"):
                self::getService();
            elseif(self::$name == "post"):
                self::postService();
            endif;

        }

        public static function getService()
        {

            $page = isset($_GET["page"]) ? $_GET["page"] : null;

            $className  = self::$args[1][0];
            $methodName = self::$args[1][1];

            if(self::$args[0] == $page){
                (new $className)->$methodName();
            }

            
        }

        public static function postService()
        {
            echo "post service";
        }


    }