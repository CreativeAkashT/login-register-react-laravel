<?php

use App\Http\Controllers\UsersController;
use App\Http\Middleware\RedirectIfNotAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(UsersController::class)->group(function(){
    Route::post("/register","register");
    Route::post("/login","login");
});

Route::middleware("auth:sanctum")->group(function(){
    Route::get("/public",[UsersController::class,"publicPage"]);
});
