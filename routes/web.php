<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| 
*/

Route::get('/welcome', function () {
    return view('welcome');
});

route::view('/','home.index')->name('inicio');



// Puesto que "editorial" y "autor" no terminan en vocal, la convecion no funciona, por lo que hay 
// que escribir la rutas una por una, a diferencia de "libro" que si termina en vocal y permite la convencion en plural

Route::get('/autores','AutorController@index')->name('autores.index');
Route::get('/autores/create','AutorController@create')->name('autores.create');
Route::post('/autores','AutorController@store')->name('autores.store');
Route::get('/autores/{autor}','AutorController@show')->name('autores.show');
Route::delete('/autores/{autor}','AutorController@destroy')->name('autores.destroy');
Route::get('/autores/{autor}/edit','AutorController@edit')->name('autores.edit');
Route::put('/autores/{autor}','AutorController@update')->name('autores.update');


Route::get('/editoriales','EditorialController@index')->name('editoriales.index');
Route::get('/editoriales/create','EditorialController@create')->name('editoriales.create');
Route::post('/editoriales','EditorialController@store')->name('editoriales.store');
Route::get('/editoriales/{editorial}','EditorialController@show')->name('editoriales.show');
Route::delete('/editoriales/{editorial}','EditorialController@destroy')->name('editoriales.destroy');
Route::get('/editoriales/{editorial}/edit','EditorialController@edit')->name('editoriales.edit');
Route::patch('/editoriales/{editorial}','EditorialController@update')->name('editoriales.update');

Route::resource('/libros','LibroController');


Route::post('/usuarios/login','UsuarioController@login')->name('usuarios.login');
route::get('/usuarios/logout','UsuarioController@logout')->name('usuarios.logout');
route::get('/usuarios/create','UsuarioController@create')->name('usuarios.create');
route::post('/usuarios','UsuarioController@store')->name('usuarios.store');