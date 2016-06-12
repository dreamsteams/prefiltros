<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','loginController@inicio');
Route::get('/logout','loginController@logout');
Route::get("/productos",'productoController@show');
Route::get("/categorias",'categoriaController@show');
Route::post("/producto-get","productoController@get");
Route::group(["before"=>"auth"],function(){
	Route::post("/producto-upload","productoController@upload");
	Route::post("/categoria-upload","categoriaController@upload");
	Route::post("/producto-changeImage","productoController@changeImage");
	Route::post("/addSection",'carouselController@addSeccion');
});
Route::group(["before"=>"guest"],function(){
	Route::match(["POST","GET"],'/login','loginController@login');
});
