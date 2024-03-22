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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/items/{item}/qr', 'ItemController@showOwner')->name('item.showOwner');

Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
   
    Route::resource('/roles', 'RoleController');

    Route::resource('/admins', 'AdminController');

    Route::resource('/items', 'ItemController');

    Route::resource('/products', 'ProductController');

    Route::resource('/users', 'UserController');

    Route::resource('/categories', 'CategoryController');

    Route::resource('/brands', 'BrandController');

    Route::resource('/departments', 'DepartmentController');

    Route::resource('permissions', 'PermissionController');

    Route::get('/edit-profile', 'UserController@editProfile')->name('user.profile.edit');
    Route::put('/update-profile', 'UserController@updateProfile')->name('user.profile.update');
    Route::get('/edit-password', 'UserController@editPassword')->name('user.password.edit');
    Route::put('/update-password', 'UserController@updatePassword')->name('user.password.update');
    // Route::put('/users/{user}', 'UserController@update')->name('user.update');

});

Route::get('/test', 'ProductController@test');


