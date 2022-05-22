<?php

//Rutas del proyecto

Route::get('/', 'EmpleadoController@index')->name('home');
Route::post('crear', 'EmpleadoController@store')->name('crear.store');
Route::get('/crear', 'EmpleadoController@create')->name('crear');
Route::get('crear/{id}', 'EmpleadoController@edit')->name('crear.edit');
Route::patch('crear/{id}/actualiza', 'EmpleadoController@update')->name('crear.update');
Route::delete('crear/{id}', 'EmpleadoController@destroy')->name('crear.destroy');

