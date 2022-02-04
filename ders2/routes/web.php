<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
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

/*
Route::get('/login', function () {
    return view('auth.login');
});
*/




//Route::get('/',[FrontController::class, 'index'])->name('index');
Route::get('/','FrontController@index')->name('index');
//Route::get('/login', 'FrontController@login')->name('login');

// prefix = ön takma isim. Rotaları gruplama
Route::prefix('admin')->middleware('auth')->group(function ()
{
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/add-post', 'AdminController@showAddPost')->name('admin.addPost');
    Route::post('/add-post','AdminController@addPost');
});



//Route::get('/admin','AdminController@index')->name('admin.index');
//URL e direk /admin yazarak admin giriş yapmamış ise routeya yönlendirmez
//Route::get('/admin','AdminController@index')->name('admin.index')->middleware('auth');
//Route('home',[AdminController::class, 'index'])->name('admin.index');



/*
Eğer Laravel 7 kullanıyorsak aşağıdaki şekildede yapabilirdik
Laravel 8-> Route::get('/',[FrontController::class, 'index'])->name('index');
Laravel 7-> Route::get('/','FrontCOntroller@index')->('index');
Bunu kullanabilmek için App\Providers\RouteServiceProvider.php dosyasını aç
Satır 29 da protected $namespace = 'App\\Http\\Controllers';  komutunun yorum satırını kaldır

Not Laravel 8 de yukarıda use App\Http\Controllers\FrontController; tanımlaması yapmalısın ki
oluşturduğun Route kullanabilesin. Laravel 7 sürümünde bunu yapmana gerek yok direk Route u tanımla
*/
