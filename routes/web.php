<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;
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
    return view('home');
});

Route::resource('/artist', ArtistController::class);
Route::view('/', 'home')->name('home');
Route::get('login', [SpotifyController::class, 'login'])->name('login');
Route::get('playlist', [SpotifyController::class, 'getUserSongs'])->name('playlist');
Route::get('profile', [SpotifyController::class, 'getUser'])->name('profile');
Route::get('playlistsong', [SpotifyController::class, 'getPlaylistSong'])->name('playlistsong');
Route::post('addsong', [SpotifyController::class, 'postPlaylistSong'])->name('addsong');





