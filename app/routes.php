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
Route::post("/categoria-get","categoriaController@get");
Route::post("/isAdmin","loginController@isAdmin");
Route::get("/productos/{busqueda}","productoController@search");
Route::post("/carrito-get-cantidad","productoController@getCantidad");
Route::get("/productos-categoria/{id}","productoController@findById")->where("id",'[0-9]+');
Route::post("/carrito-add",'productoController@add');
Route::get("/carrito","productoController@showCarrito");
Route::get("/showCarrito",'productoController@getCarrito');
Route::get("/emptyCarrito","productoController@emptyCarrito");
Route::post("/carrito-quit","productoController@quit");
Route::post("/carrito-more-one","productoController@more");
Route::post("/send-cotizacion","productoController@send");
Route::post("/send-request","productoController@sendRequest");

Route::group(["before"=>"auth"],function(){
	Route::post("/addSection",'carouselController@addSeccion');
	Route::post("carousel-remove",'carouselController@delete');
	Route::post("/producto-upload","productoController@upload");
	Route::post("/producto-changeImage","productoController@changeImage");
	Route::post("/producto-remove","productoController@remove");
	Route::post("/categoria-upload","categoriaController@upload");
	Route::post("/categoria-changeImage","categoriaController@changeImage");
	Route::post("/categoria-remove","categoriaController@remove");
});

Route::group(["before"=>"guest"],function(){
	Route::match(["POST","GET"],'/login','loginController@login');
});
