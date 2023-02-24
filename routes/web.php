<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Slideshow\Index as Slideshow;
use App\Http\Livewire\Slideshow\Image\Edit as ImageEdit;
use App\Models\FuneralHome;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('funeral-homes/{funeral_home}/subscription-status', function (FuneralHome $funeral_home) {
    return $funeral_home->subscription_status() ? 'Grant' : 'Deny';
});

// Slideshow
Route::get('slideshow/edit', Slideshow::class)->name('ui.slideshow.edit');
Route::get('slideshow/image/{image}', ImageEdit::class)->name('slideshow.image.edit');
Route::post('slideshow/image/save', [ImageController::class, 'save'])->name('slideshow.image.save');

Route::post('image-cropper', [ImageController::class, 'cropImage'])->name('image-cropper');

require __DIR__ . '/admin.php';
require __DIR__ . '/client.php';
