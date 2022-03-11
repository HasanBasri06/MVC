<?php 

    namespace App\Result;

    class ErrorResult{
        public function resultMessage(){
            $message = ["message" => "Kulanıcılar Listelendi"];
            return $message;
        }
    }