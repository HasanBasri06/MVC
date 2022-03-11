<?php 

    namespace App\Models\Database;

    class Connect{


        public static function connect()
        {
            try {
                $conn = new \PDO("mysql:host={$_ENV["DB_HOST"]};dbname={$_ENV["DB_NAME"]}", $_ENV["DB_ROOT"], $_ENV["DB_PASSWORD"]);
                return $conn;
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }


    }