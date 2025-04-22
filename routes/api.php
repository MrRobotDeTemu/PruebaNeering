<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\userController;

Route::get('/users', [userController::class, 'index']);

Route::post('/users',  [userController::class, 'store']);

Route::put('/users/{id}', function () {
    return "editando users";
});

Route::delete('/users/{id}', function () {
    return "eliminando users";
});