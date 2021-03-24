<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {return view('Front.Section.index_page')->with('index_page' , $index_page = true);});
Route::get('/logout', function () {return \Illuminate\Support\Facades\Auth::logout();});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\Controller::class, 'test']);
Route::post('/test2', [App\Http\Controllers\Controller::class, 'test2']);

Route::get('/search', [App\Http\Controllers\Controller::class, 'search_channel'])->name('search_channel');
Route::get('/google-login', [\App\Http\Controllers\Auth\RegisterController::class,'redirectToProvider'])->name('/google-login');
Route::get('/callback', [\App\Http\Controllers\Auth\RegisterController::class,'handleProviderCallback'])->name('callback');
Route::post('/edit/channel', [\App\Http\Controllers\Controller::class,'editChannel'])->name('editChannel');
Route::get('/channel', [\App\Http\Controllers\Controller::class,'channelView'])->name('channelView');
Route::get('/logout', function (){
    auth()->logout();
})->name('channelView');
Route::get('/view/channel/{name}', [\App\Http\Controllers\Controller::class,'channelViewOne'])->middleware('auth')->name('channelViewOne');
Route::middleware('auth')->get('/new/channel' , [\App\Http\Controllers\adminController::class , 'newChannel'])->name('new_channel');
Route::middleware('auth')->post('/new/channel/create' , [\App\Http\Controllers\adminController::class , 'newChannelCreate'])->name('admin.new_channel_create');

Route::prefix('admin')->middleware(['admin','auth'])->group(function (){
    Route::get('/channel' , [\App\Http\Controllers\adminController::class , 'channelList'])->name('admin.channel_list');
    Route::get('/channel/{id}/edit' , [\App\Http\Controllers\adminController::class , 'editChannel'])->name('admin.editChannel');
    Route::put('/channel/{id}/update' , [\App\Http\Controllers\adminController::class , 'updateChannel'])->name('admin.updateChannel');
    Route::post('/new/{id}/comment' , [\App\Http\Controllers\adminController::class , 'newComment'])->name('admin.newComment');
    Route::post('/reply/comment' , [\App\Http\Controllers\adminController::class , 'replyComment'])->name('admin.replyComment');
});
