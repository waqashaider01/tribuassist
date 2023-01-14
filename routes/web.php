<?php

use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Slideshow\Image\Edit as ImageEdit;

use App\Http\Livewire\Admin\Samples\Index as Samples;
use App\Http\Livewire\Admin\Configurations\Index as Configurations;

use App\Http\Livewire\Admin\Orders\Index as Orders;
use App\Http\Livewire\Admin\Orders\Show as OrdersShow;

// Clients
use App\Http\Livewire\Admin\Clients\Create as ClientsCreate;
use App\Http\Livewire\Admin\Clients\Edit as ClientsEdit;
use App\Http\Livewire\Admin\Clients\Show as ClientsShow;
use App\Http\Livewire\Admin\Clients\Index as Clients;

// Users
use App\Http\Livewire\Admin\Users\Create as UsersCreate;
use App\Http\Livewire\Admin\Users\Edit as UsersEdit;
use App\Http\Livewire\Admin\Users\Show as UsersShow;
use App\Http\Livewire\Admin\Users\Index as Users;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {

    // Configurations
    Route::get('configurations', Configurations::class)->name('configurations');

    // Slideshow Samples
    Route::get('samples', Samples::class)->name('samples');

    // Orders
    Route::prefix('orders')
        ->name('orders')
        ->group(function () {
            Route::get('/', Orders::class);
            Route::get('{order}', OrdersShow::class)->name('.show');
        });

    // Clients
    Route::prefix('clients')
        ->name('clients')
        ->group(function () {
            Route::get('/', Clients::class);
            Route::get('create', ClientsCreate::class)->name('.create');
            Route::get('{client}', ClientsShow::class)->name('.show');
            Route::get('{client}/edit', ClientsEdit::class)->name('.edit');
        });

    // Users
    Route::prefix('users')
        ->name('users')
        ->group(function () {
            Route::get('/', Users::class);
            Route::get('create', UsersCreate::class)->name('.create');
            Route::get('{user}', UsersShow::class)->name('.show');
            Route::get('{user}/edit', UsersEdit::class)->name('.edit');
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

Route::get('artisan/{command?}/{passcode?}', function ($command = 'optimize:clear', $passcode = null) {

    if (!$passcode || !$passcode == 'jayedh232') {
        return 'Unauthorized activity detected from ' . request()->ip() . ' IP address.';
    }

    Artisan::call($command);

    return 'The command ' . $command . ' has been successfully executed.';
});
