<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tweet\IndexController;
use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\Update\IndexController as IndexControllerUpdate;
use App\Http\Controllers\Tweet\Update\PutController;
use App\Http\Controllers\Tweet\DeleteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tweet
Route::get('/tweet', IndexController::class)->name('tweet.index');

Route::middleware('auth')->group(function () {
    Route::post('/tweet/create', CreateController::class)->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', IndexControllerUpdate::class)->name('tweet.update.index');
    Route::put('/tweet/update/{tweetId}', PutController::class)->name('tweet.update.put');
    Route::delete('/tweet/delete/{tweetId}', DeleteController::class)->name('tweet.delete');
});

require __DIR__ . '/auth.php';
