<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgotPage', function () {
    return view('forgotPage');
});

// FORGOT PASSWORD

Route::post('/otpSend', [UserController::class, 'otpSend'])->name('otpSend');
Route::get('/checkOtp', [UserController::class, 'checkOtp'])->name('checkOtp');
Route::post('/changePass', [UserController::class, 'changePass'])->name('changePass');
Route::post('/confirmOtp', [UserController::class, 'confirmOtp'])->name('confirmOtp');



// ADMIN PANEL

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('adminCheck');
Route::get('/logoutAdmin', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');

Route::get('/manageUser', [AdminController::class, 'manageUser'])->name('manageUser');
Route::get('/addUser', [AdminController::class, 'addUser'])->name('addUser');
Route::post('/storeUser', [AdminController::class, 'storeUser'])->name('storeUser');
Route::get('/DelUserPage/{id}', [AdminController::class, 'DelUserPage'])->name('DelUserPage');

Route::get('/manage_album', [AdminController::class, 'manage_album'])->name('manage_album');
Route::get('/add_album', [AdminController::class, 'add_album'])->name('add_album');
Route::post('/storeAlbum', [AdminController::class, 'storeAlbum'])->name('storeAlbum');
Route::get('/editAlbumPage/{id}', [AdminController::class, 'editAlbumPage'])->name('editAlbumPage');
Route::put('/updateAlbum/{id}', [AdminController::class, 'updateAlbum'])->name('updateAlbum');

Route::get('/manage_song', [AdminController::class, 'manage_song'])->name('manage_song');
Route::get('/add_song', [AdminController::class, 'add_song'])->name('add_song');
Route::post('/storeSong', [AdminController::class, 'storeSong'])->name('storeSong');

Route::get('/deleteAlbum/{id}', [AdminController::class, 'deleteAlbum'])->name('deleteAlbum');
Route::get('/deleteSong/{id}', [AdminController::class, 'deleteSong'])->name('deleteSong');
Route::get('/select', [AdminController::class, 'select'])->name('select');



// USER PANEL

Route::get('/user', [UserController::class, 'user'])->name('user');
Route::get('/userProfile', [UserController::class, 'userProfile'])->name('userProfile');
Route::put('/updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');

Route::get('/musicana', [UserController::class, 'musicana'])->name('musicana')->middleware('authCheck');
Route::get('/album', [UserController::class, 'album'])->name('album');
Route::get('/song', [UserController::class, 'song'])->name('song');
Route::get('/logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');
Route::get('/favSong/{id}', [UserController::class, 'favSong'])->name('favSong');
Route::get('/delFavSong/{id}', [UserController::class, 'delFavSong'])->name('delFavSong');






