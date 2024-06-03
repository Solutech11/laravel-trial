<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\app\auth\authController;

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

Route::get("/about",function(){
    return view("app.pages.about");
})->name("About.Page");

Route::controller(authController::class)->group(function () {
    Route::get("/","loginPage")->name("Login.Page");

    Route::get("/register","registerPage")->name("register.Page");

    //post
    Route::post("/login", "loginFunc")->name("login.Function");

});


require __DIR__."/appRoutes.php";