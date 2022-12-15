<?php

namespace App\Http\Controllers;

use App\Models\SlideshowImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function save(Request $request)
    {
        try {
            $base64data = $request->data;
            $isValidData = $this->is_base64_encoded($base64data);
            if ($isValidData) {
                $image_parts = explode(";base64,", $base64data);
                $newImagePath = 'slideshow/edited-images/jayed-' . time() . '.png';
                Storage::put($newImagePath, base64_decode($image_parts[1]));

                $image = SlideshowImage::find($request->image_id);
                Storage::delete($image->path);
                $image->path = $newImagePath;
                $image->save();

                return [
                    'success' => true
                ];
            } else {
                return [
                    'success' => false
                ];
            }
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }

    function is_base64_encoded($data)
    {
        if (Str::contains($data, 'base64')) {
            return true;
        } else {
            return false;
        }
    }
}
