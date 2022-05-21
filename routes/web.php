<?php

//Rutas del proyecto

Route::get('/', 'EmpleadoController@index')->name('home');
Route::post('crear', 'EmpleadoController@store')->name('crear.store');
Route::get('/crear', 'EmpleadoController@create')->name('crear');
/*
Route::get('/crear', 'AlumnoController@create')->name('crear');

Route::patch('crear/{id}/actualiza', 'AlumnoController@update')->name('crear.update');

Route::get('crear/{id}', 'AlumnoController@edit')->name('crear.edit');
Route::delete('crear/{id}', 'AlumnoController@destroy')->name('crear.destroy');*/
/*

Route::patch('crear/{id}/actualiza', 'CrearController@update')->name('crear.update');






/*
Route::resource('/', 'HomeController');
Route::resource('/crear', 'CrearController');
Route::resource('/venta', 'VentaController');
*/
