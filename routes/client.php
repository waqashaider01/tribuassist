<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Slideshow\Image\Edit as ImageEdit;

// Tributes
use App\Http\Livewire\Client\Tributes\Create as TributesCreate;
use App\Http\Livewire\Client\Tributes\Edit as TributesEdit;
use App\Http\Livewire\Client\Tributes\Show as TributesShow;
use App\Http\Livewire\Client\Tributes\Slideshow as TributesSlideshow;
use App\Http\Livewire\Client\Tributes\Index as Tributes;

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

Route::get('tributes/manage/{tribute}', function () {
    echo 'Tribute manage';
})->name('ui.tribute.manage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Tributes
    Route::prefix('tributes')
        ->name('tributes')
        ->group(function () {
            Route::get('/', Tributes::class);
            Route::get('create', TributesCreate::class)->name('.create');
            Route::get('{tribute}', TributesShow::class)->name('.show');
            Route::get('{tribute}/edit', TributesEdit::class)->name('.edit');
            Route::get('{tribute}/slideshow', TributesSlideshow::class)->name('.slideshow');
        });
});

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
