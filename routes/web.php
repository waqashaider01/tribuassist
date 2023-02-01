<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Slideshow\Index as Slideshow;

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

Route::get('slideshow/edit', Slideshow::class)->name('ui.slideshow.edit');

require __DIR__ . '/client.php';
require __DIR__ . '/admin.php';
