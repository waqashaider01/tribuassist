<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('store', function (Request $request) {
    try {
        DB::beginTransaction();

        $user = User::create($request->all());
        $user->password = bcrypt($user->password);
        $user->save();

        DB::commit();
        return $user;
    } catch (Exception $exception) {
        DB::rollback();
        return $exception->getMessage();
    }

    // return $request->all();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
