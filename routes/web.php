<?php

Route::get('/', function () {
    return redirect()->route('profesores.index');
})->name('home');

Route::resource('profesores', 'ProfesoresController');

Route::get('publicaciones/asignar', function () {
    return redirect()->route('publicaciones.index');
})->name('publicaciones.asignar');
Route::resource('publicaciones', 'PublicacionesController');

