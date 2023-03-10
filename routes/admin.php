<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\Configurations\Index as Configurations;

// Samples
use App\Http\Livewire\Admin\Samples\Create as SamplesCreate;
use App\Http\Livewire\Admin\Samples\Edit as SamplesEdit;
use App\Http\Livewire\Admin\Samples\Show as SamplesShow;
use App\Http\Livewire\Admin\Samples\Index as Samples;

// FuneralHomes
use App\Http\Livewire\Admin\FuneralHomes\Create as FuneralHomesCreate;
use App\Http\Livewire\Admin\FuneralHomes\Edit as FuneralHomesEdit;
use App\Http\Livewire\Admin\FuneralHomes\Show as FuneralHomesShow;
use App\Http\Livewire\Admin\FuneralHomes\Index as FuneralHomes;

// Users
use App\Http\Livewire\Admin\Users\Edit as UsersEdit;
use App\Http\Livewire\Admin\Users\Show as UsersShow;
use App\Http\Livewire\Admin\Users\Index as Users;

// Tributes
use App\Http\Livewire\Client\Tributes\Create as TributesCreate;
use App\Http\Livewire\Client\Tributes\Edit as TributesEdit;
use App\Http\Livewire\Client\Tributes\Show as TributesShow;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {

    // Configurations
    Route::get('configurations', Configurations::class)->name('configurations');

    // Slideshow Samples
    Route::prefix('samples')
        ->name('samples')
        ->group(function () {
            Route::get('/', Samples::class);
            Route::get('create', SamplesCreate::class)->name('.create');
            Route::get('{sample}', SamplesShow::class)->name('.show');
            Route::get('{sample}/edit', SamplesEdit::class)->name('.edit');
        });

    // FuneralHomes
    Route::prefix('funeral-homes')
        ->name('funeral_homes')
        ->group(function () {
            Route::get('/', FuneralHomes::class);
            Route::get('create', FuneralHomesCreate::class)->name('.create');
            Route::get('{funeral_home}', FuneralHomesShow::class)->name('.show');
            Route::get('{funeral_home}/edit', FuneralHomesEdit::class)->name('.edit');
        });

    // Users
    Route::prefix('users')
        ->name('users')
        ->group(function () {
            Route::get('/', Users::class);
            Route::get('{user}', UsersShow::class)->name('.show');
            Route::get('{user}/edit', UsersEdit::class)->name('.edit');
        });
});

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
        });
});
