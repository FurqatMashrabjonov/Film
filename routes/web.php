<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Film\Create;
use App\Http\Livewire\Admin\Film\ListVideo;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/lg', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});

Route::redirect('/admin', '/admin/dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::prefix('/dashboard')->as('dashboard.')
        ->group(function () {
            Route::get('/', Dashboard::class)->name('index');
        });

    Route::prefix('/video')->as('video.')
    ->group(function (){
        Route::get('/', ListVideo::class)->name('list');
        Route::get('/create', Create::class)->name('create');
    });

});
