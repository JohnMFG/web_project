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



Route::view('/', 'pages.home');           //naršyklės lange įvedus svetainės adresą bus matomas vaizdas home, esantis kataloge pages
Route::view('/home', 'pages.home');       //naršyklės lange įvedus svetainės adresą + '/home' (pvz., http://localhost:8000/home) bus matomas vaizdas home
Route::view('/about', 'pages.about');     //naršyklės lange įvedus svetainės adresą + '/about' bus matomas vaizdas about
Route::view('/contacts', 'pages.contacts');
Route::view('/admin', 'admin.dashboard'); //naršyklės lange įvedus svetainės adresą + '/admin' bus matomas vaizdas dashboard
Route::get('/phone/models', App\Http\Controllers\PhonesController::class);
Route::get('/phone/choose', App\Http\Controllers\PhonesChooseController::class);
Route::get('/phone/reserve/{pid}', [App\Http\Controllers\PhonesChooseController::class, 'addPhone']);
Route::get('/phone/user_phones', [App\Http\Controllers\PhonesChooseController::class, 'checkPhones']);
Route::get('/admin/future_users', [App\Http\Controllers\Admin\FutureUsersController::class, 'list']);

/*
Route::get('/admin/phones', [App\Http\Controllers\Admin\PhonesController::class, 'index']);
Route::get('/admin/phones/create', [App\Http\Controllers\Admin\PhonesController::class, 'create']);
Route::post('/admin/phones', [App\Http\Controllers\Admin\PhonesController::class, 'store']);
Route::get('/admin/phones/{id}', [App\Http\Controllers\Admin\PhonesController::class, 'show']);
Route::get('/admin/phones/{id}/edit', [App\Http\Controllers\Admin\PhonesController::class, 'edit']);
Route::patch('/admin/phones/{id}', [App\Http\Controllers\Admin\PhonesController::class, 'update']);
Route::delete('/admin/phones/{id}', [App\Http\Controllers\Admin\PhonesController::class, 'destroy']); */


Route::get('redirects', App\Http\Controllers\HomeController::class);
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::resource('/admin/phones', \App\Http\Controllers\Admin\PhonesController::class);
    Route::resource('/admin/users', \App\Http\Controllers\Admin\UsersController::class);
    Route::resource('/admin/roles', \App\Http\Controllers\Admin\RolesController::class);


});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
