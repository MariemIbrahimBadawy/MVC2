<?php
use App\controllers\TestController;
use App\controllers\UserController;
use App\Route;

Route::get('test', TestController::class,'testFunc');
// Route::get('/test/create', UserController::class, 'CreateUser');
Route::get('users', UserController::class, 'CreateUser');
// echo $_SERVER['REQUEST_URI'];