<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostsController;
use PhpParser\Node\Expr\Ternary;

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


Route::get('/', function () {
    return view('index');
});

/*
Route::get('/testa', function () {
    dd("Test");
});
*/
/*
Route::post('/testa', function () {
    dd("Test");
});
*/

//Route::match(['get','post'], '/test', [TestConroller::class,'index']);

Route::put('/test', [TestController::class,'guncelle'])->name('guncelle');
Route::delete('test', [TestController::class,'sil'])->name('sil');

Route::any('test-any',[TestController::class, 'anyTest'])->name('anyTest');

//Route::resource('post', PostsController::class);
//Sadece belirttiğimi" fonksiyonları kullanır
//Route::resource('post', PostsController::class)->only(['index','create']);
//Bunların haricinde diğer metotları kullanır
//Route::resource('post', PostsController::class)->except(['index','create']);

//api tarafından
Route::apiResource('api-tests', PostsController::class);

Route::get('/posts/{lang}/{id?}', [PostsController::class, 'getPost']);

Route::prefix('admin')->middleware('auth')->group(function (){

    Route::get('/', [PostsController::class, 'index'])->name('admin.index');
    Route::get('posts', [PostsController::class, 'index'])->name('admin.index');
});

/*
Route Türleri

Route::get
Route::post form ve apilerden gelebilir
En sık kullandığımız istek türleridir

Route::match
Route::put  metot olarak put olmak zorundadır put ile güncelleme işlemleri yapılır. GÜNCELLEME İŞLEMLERİNDE KULLANILIR.
Form methodunu post olarak belirleyip blade içinde  PUT Methodunu aşağıdaki şekilde tanımla.

<form action="{{ route('guncelle')}}" method="POST">
    @csrf
    @method('PUT')
  {{-- {{ method_field('PUT')}} --}}
  {{--  <input type="text" name="_method" value="PUT"> --}}

    <input type="text" name="name" value="TEST">
    <button type="submit">Gönder</button>
</form>

Route::delete dilme işlemlerimizi yaparız

Route Dosyaları
api.php -> apilerimizin çalıştıracağımızın rotalarımıızın bulunduğu yer.
web.php -> web sitelerimizin çalışacağı
*/
