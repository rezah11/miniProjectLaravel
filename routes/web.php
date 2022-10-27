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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('homePage');
Route::get('/email',[\App\Http\Controllers\HomeController::class,'sendMail'])->name('email');
Route::get('/showMail',[\App\Http\Controllers\HomeController::class,'showTestMail'])->name('showMail');
Route::get('/sendUserMail',[\App\Http\Controllers\HomeController::class,'senMailUsers'])->name('sendMailUser');
Route::get('/markdown',[\App\Http\Controllers\HomeController::class,'markdownTest'])->name('markdownMail');
Route::get('/article',[\App\Http\Controllers\HomeController::class,'article'])->name('article');


Auth::routes();

Route::get('/', [\App\Http\Controllers\mainController::class, 'Home'])->name('home');
Route::get('/link/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('linkId');
//Route::get('/dashboard', [\App\Http\Controllers\mainController::class, 'dashboard'])->name('dashboard');
Route::group(['prefix'=>'links'],function (){
    Route::get('/index', [\App\Http\Controllers\mainController::class, 'index'])->name('links');
    Route::delete('/delete', [\App\Http\Controllers\mainController::class, 'remove'])->name('destroy');
    Route::get('/edit/{id}', [\App\Http\Controllers\mainController::class, 'edit'])->name('edit-link');
    Route::put('/update', [\App\Http\Controllers\mainController::class, 'update'])->name('update-link');
    Route::get('/create', [\App\Http\Controllers\mainController::class, 'create'])->name('create-link');
    Route::post('/store', [\App\Http\Controllers\mainController::class, 'store'])->name('store-link');
    Route::get('/changeState/{id}', [\App\Http\Controllers\mainController::class, 'changeState'])->name('changeState-link');
    Route::post('/status/', [\App\Http\Controllers\mainController::class, 'status'])->name('status-link');
    Route::get('/statusShow/', [\App\Http\Controllers\mainController::class, 'allStatus'])->name('status-show');
    Route::post('/check', [\App\Http\Controllers\mainController::class, 'check'])->name('check-link');
});
Route::group(['prefix'=>'users','middleware'=>'auth'],function (){
   Route::get('/index',[\App\Http\Controllers\userController::class,'index'])->name('allUsers');
   Route::delete('/delete',[\App\Http\Controllers\userController::class,'remove'])->name('deleteUser');
   Route::get('/createUser',[\App\Http\Controllers\userController::class,'create'])->name('createUser');
   Route::post('/storeUser',[\App\Http\Controllers\userController::class,'store'])->name('storeUser');
   Route::get('/editUser/{id}',[\App\Http\Controllers\userController::class,'edit'])->name('editUser');
   Route::put('/updateUser',[\App\Http\Controllers\userController::class,'update'])->name('updateUser');
});

Route::get('/test',[\App\Http\Controllers\LinkController::class,'test'])->name('test');
