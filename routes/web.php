<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\app\auth\authController;
use App\Http\Controllers\app\pages;
use App\Http\Controllers\app\pagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/about",[pagesController::class, 'aboutPage'])->name("About.Page");

Route::controller(authController::class)->group(function () {
    Route::get("/","loginPage")->name("Login.Page");

    Route::get("/register","registerPage")->name("register.Page");

    //post
    Route::post("/login", "loginFunc")->name("login.Function");

    Route::post('/register','registerFunc')->name('register.Function');

    //passing dynamic data
    Route::get('/hello/{name}', 'hello')->name('hello.page');

    Route::get('/api/query','QueryTry')->name('QueryTry.api');

});


require __DIR__."/appRoutes.php";