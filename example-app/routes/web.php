<?php

use App\CacheInterface;
use App\Http\Controllers\LinksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

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

 class IpFilter{
     private $ip;
     public function __construct($ip)
     {
         $this->ip = $ip;
     }
 }

 class Cache {

     public function set($key,$value){

     }
     public function get($key){

     }
 }

 App::bind('IpFilter', function($app){
        return new IpFilter($app->make('request')->getClientIp());
 });
App::bind('App\CacheInterface','App\CacheFile');

Route::get('/ipfilter', function (Illuminate\Contracts\Cache\Repository  $cacheInterface) {
      dd($cacheInterface);
});


/**
 *  Get
 */
Route::get('links/create',
[
    LinksController::class,'create'
]);

/**
 *  Post
 */
Route::post('links/create',
[
    LinksController::class,'store'
])->name('createLink');


Route::get('links/',
[
    LinksController::class,'index'
]);

Route::get('/{id}',
[
    LinksController::class,'show'
])->where('id','[0-9]+')
  ->name('linkshow');

//   Route::get('/{id}', function () {
//     return 'Bonne redirection !';
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',
    [UserController::class ,'formBuilderShow']
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('a-propos',
    [
         PageController::class,'about'
    ]
)->name('about');
