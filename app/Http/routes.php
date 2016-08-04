<?php

//Rutas autentificación
Route::auth();

//Rutas estaticas
Route::get('/', ['as' => 'portada', 'uses' => 'HomeController@index']);
Route::get('/historia.html', ['as' => 'historia', 'uses' => 'HomeController@historia']);
Route::get('/webcam.html', ['as' => 'webcam', 'uses' => 'HomeController@webcam']);

//Rutas contacto
Route::get('/contacto.html', ['as' => 'contacto', 'uses' => 'HomeController@contacto']);
Route::get('/legal.html', ['as' => 'legal', 'uses' => 'HomeController@legal']);
Route::get('/cookies.html', ['as' => 'cookies', 'uses' => 'HomeController@cookies']);

//Rutas Tiempos
Route::get('/tiempos/lista.html', ['as' => 'tiempos', 'uses' => 'TiempoController@lista']);