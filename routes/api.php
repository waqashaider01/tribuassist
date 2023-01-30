<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('crop-image', function (Request $request) {
    try {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://154.53.57.37',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            // CURLOPT_POSTFIELDS => array('file' => new CURLFILE('/Users/jayedhasan232/Downloads/IMG_20220621_153313744.jpg')),
            CURLOPT_POSTFIELDS => array('file' => new CURLFILE('/Users/jayedhasan232/Downloads/IMG_20220621_145822065.jpg')),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response);

        $imageUrl = 'http://' . $response->image_url;

        // Store Image
        $contents = file_get_contents($imageUrl);
        $imageName = Str::random(10) . ".jpg";
        $path = Storage::put("images/" . $imageName, $contents);
        $url = asset('storage/images/' . $imageName);
        return $url;
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
