<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Slideshow\Index as Slideshow;
use App\Http\Livewire\Slideshow\Image\Edit as ImageEdit;
use App\Models\FuneralHome;
use Illuminate\Support\Facades\Artisan;

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

Route::get(
    'funeral-homes/{funeral_home}/subscription-status',
    function (FuneralHome $funeral_home) {
        return $funeral_home->subscription_status() ? 'Grant' : 'Deny';
    }
);

// Slideshow
Route::prefix('slideshow')
    ->name('slideshow.')
    ->group(function () {
        Route::get('edit', Slideshow::class)->name('edit');

        Route::prefix('image')
            ->name('image.')
            ->group(function () {
                Route::get('{image}', ImageEdit::class)->name('edit');
                Route::post('save', [ImageController::class, 'save'])->name('save');
            });
    });

Route::post('image-cropper', [ImageController::class, 'cropImage'])->name('image-cropper');

Route::get(
    'artisan/{command?}/{passcode?}',
    function ($command = 'optimize:clear', $passcode = null) {

        if (!$passcode || !$passcode == "jayedh232") {
            return "Unauthorized activity detected from " . request()->ip() . ' IP address.';
        }

        Artisan::call($command);
        return "The command " . $command . " has been successfully executed.";
    }
);


require __DIR__ . '/admin.php';
require __DIR__ . '/client.php';
