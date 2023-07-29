<?php

use Admin\SliderController;
use Admin\ProductController;
use Admin\ProjectController;
use Admin\UserController;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Project;
use App\User;
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

// Auth
Auth::routes();
Route::post('/logout', 'HomeController@logout')->name('logout');

// Guest
Route::get('/', function () {
    $sliders = Slider::all();
    $products = Product::all();
    $projects = Project::all();
    return view('landing', compact('sliders','products','projects'));
});

// Verifikasi
Route::get('verify-first', function() {
    return view('home');
})
->middleware(['auth'])
->name('verification.notice');


// Admin
Route::prefix('admin')->middleware(['auth','verifyAcc'])->group(function () {
    Route::get('/', function () {
        return redirect('admin/dashboard');
    });


    Route::get('/dashboard', function () {
        $users = count(User::all());
        $products = Product::all();
        $projects = Project::all();
        return view('admin.dashboard', compact('users','products','projects'));
    })->name('admin.dashboard');

    Route::resource('slider', SliderController::class);
    Route::resource('product', ProductController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('user', UserController::class);

});

Route::get('/home', 'HomeController@index')->name('home');
