<?php

    ini_set("displays_error", "1");

    define("DIR", "C:/xampp/htdocs/mvc/");

    require DIR . "vendor/autoload.php";

    require DIR . "bootstrap.php";


    if($_ENV["CARE"] == "true"){
        require DIR . "views/bakim.php";
        die;
    }

    require DIR . "helpers/router.php";
    require DIR . "router/web.php";


