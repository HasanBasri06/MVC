<?php 

    namespace App\Controllers;

    use App\app;

    class WelcomePage{
        public function index()
        {
            app::view("welcome", ["data" => "Hasan Basri"]);
        }
    }