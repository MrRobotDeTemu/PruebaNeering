<?php

Route::get('/users', function () {
    return "users list";
});

Route::post('/users', function () {
    return "creando users";
});

Route::put('/users/{id}', function () {
    return "editando users";
});

Route::delete('/users/{id}', function () {
    return "eliminando users";
});