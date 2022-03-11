<?php 

    namespace App;

    use App\router as Route;
    use App\Controllers\UserController;
    use App\Controllers\WelcomePage;

    Route::get("users", [UserController::class, "findAll"]);
    Route::get("user_delete", [UserController::class, "deleteUser"]);
    Route::get("update_user", [UserController::class, "updateUser"]);