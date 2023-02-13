<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
