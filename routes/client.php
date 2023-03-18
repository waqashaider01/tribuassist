<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

// Tributes
use App\Http\Livewire\Client\Tributes\Create as TributesCreate;
use App\Http\Livewire\Client\Tributes\Edit as TributesEdit;
use App\Http\Livewire\Client\Tributes\Show as TributesShow;
use App\Http\Livewire\Client\Tributes\Index as Tributes;

// Orders
use App\Http\Livewire\Client\Orders\Show as OrdersShow;
use App\Http\Livewire\Client\Orders\Index as Orders;

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
    'client',
])->group(function () {

    // Tributes
    Route::prefix('tributes')
        ->name('tributes')
        ->group(function () {
            Route::get('/', Tributes::class);
            Route::get('create', TributesCreate::class)
                ->middleware('active_subscriber')
                ->name('.create');
            Route::get('{tribute}', TributesShow::class)->name('.show');
            Route::get('{tribute}/edit', TributesEdit::class)
                ->middleware('active_subscriber')
                ->name('.edit');
        });

    // Orders
    Route::prefix('orders')
        ->name('orders')
        ->group(function () {
            Route::get('/', Orders::class);
            Route::get('{tribute}', OrdersShow::class)->name('.show');
        });
});
