<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCtrl;
use App\Http\Controllers\AccCtrl;
use App\Http\Controllers\PublicCtrl;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('logout', function () {
    \Auth::logout();
    return view('login');
});

Route::get('register',[UserCtrl::class,'registerView']);
Route::post('register',[UserCtrl::class,'register'])->name('register');
Route::get('login',[UserCtrl::class,'loginView']);
Route::post('login',[UserCtrl::class,'login'])->name('login');

Route::get('logout', function(){
    \Auth::logout();
    return redirect('/login');
});

Route::get('comments',[PublicCtrl::class,'viewComments']);
Route::get('posts',[PublicCtrl::class,'viewPosts']);

Route::prefix('admin/')->middleware(['auth','isAdmin'])->group(function(){ // Admin authentication with admin prefix
    // Route::get('category',[AccCtrl::class,'catsView']);
    Route::controller(AccCtrl::class)->group(function(){ // Controller Group
        Route::get('category','catsView');
    });

    Route::get('/', function () {
        return view('home');
    });
});