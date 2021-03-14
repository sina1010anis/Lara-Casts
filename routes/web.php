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

Route::get('/', function () {return view('Front.index');});
Route::get('/logout', function () {return \Illuminate\Support\Facades\Auth::logout();});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\Controller::class, 'test']);
Route::prefix('admin')->middleware(['admin','auth'])->group(function (){
    Route::get('/new/channel' , [\App\Http\Controllers\adminController::class , 'newChannel'])->name('admin.new_channel');
    Route::post('/new/channel/create' , [\App\Http\Controllers\adminController::class , 'newChannelCreate'])->name('admin.new_channel_create');
    Route::get('/channel' , [\App\Http\Controllers\adminController::class , 'channelList'])->name('admin.channel_list');
    Route::get('/channel/{id}/edit' , [\App\Http\Controllers\adminController::class , 'editChannel'])->name('admin.editChannel');
    Route::put('/channel/{id}/update' , [\App\Http\Controllers\adminController::class , 'updateChannel'])->name('admin.updateChannel');
});
