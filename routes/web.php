<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('proveedor', 'ProveedorController');

Route::resource('categoria', 'CategoriaController');
Route::resource('almacen', 'AlmacenController');
Route::resource('compra', 'CompraController');

Route::resource('producto', 'ProductoController');

Route::get('grafico','GraficoController@index');
/* reporte de todos los proveedores */
Route::get('imprimeProveedores','PrnController@Imprimeproveedores');

/* reporte de todos los productos */
Route::get('imprimeProductos','PrnController@Imprimeproductos');
/* reporte de POR productos */
Route::get('detalleproducto/{id}','PrnController@detalleproducto');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
});
Route::get('/bienvenido', function () {
    return view('bienvenido');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
