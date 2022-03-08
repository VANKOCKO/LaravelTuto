<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Route::get('/about',function(){
      echo "About Page ! ";
});


/**
 *  Category Route
 */

// show all  Categories
Route::get('/category/all',
   [
         CategoryController::class,'allCat'
    ])->name('all.category');

// add Category
Route::post('/category/add',
   [
         CategoryController::class,'addCat'
    ])->name('store.category');


// edit Category
Route::post('/category/edit',
   [
         CategoryController::class,'editCat'
    ]);



/**
 *  Authentifcation Route
 */
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    /**
     *  recuperation par les entites
     * Affichage sur le template de la date est : $created_at->diffForHumans()
     */
    //$users = User::all();


    /**
     *Recuperation par Query Builder
     */
    $users = DB::table('users')->get();

    return view('dashboard', [
           'users' => $users
    ]);
})->name('dashboard');
