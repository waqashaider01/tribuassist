<?php

use App\Http\Controllers\ImageController;
use App\Http\Livewire\Slideshow\Image\Edit as ImageEdit;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Slideshow
    Route::get('slideshow/image/{image}', ImageEdit::class)->name('slideshow.image.edit');
    Route::post('slideshow/image/save', [ImageController::class, 'save'])->name('slideshow.image.save');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
