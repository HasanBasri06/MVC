<?php 

    namespace App\Controllers;

    use App\app;
    use App\Models\user;

    class UserController{
        
        public function findAll()
        {

            $users = (new user((new user)::table("students")))::findAll();

            app::view("user", ["data" => $users]);
                                              
        }


        public function deleteUser()
        {
            
            $delete_user = (new user((new user)::table("students")))::delete(["id", 16]);

            app::view("user", ["result" => $delete_user]);


        }

        public function updateUser()
        {
            $data = (new user((new user((new user)::table("students")))::where(["id", "1"])))::update(["name", "Fatihe Bascam"]);

            app::view("user", ["user_update" => $data]);
        }
    }