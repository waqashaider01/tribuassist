<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

if (!function_exists('readingTime')) {

    function readingTime($data = '')
    {
        $totalWords = str_word_count(strip_tags($data));
        $avgRead = 275;
        $timeToRead = $totalWords / $avgRead;
        return round($timeToRead, 2);
    }
}

if (!function_exists('isActiveRoute')) {

    function isActiveRoute($nav)
    {
        $currentRoute =  Route::currentRouteName();

        // Old Method
        // $array = explode('.', $currentRoute);
        // return in_array($nav, $array);

        // New Method
        return $currentRoute == $nav;
    }
}

if (!function_exists('deleteLivewireTempFiles')) {

    function deleteLivewireTempFiles()
    {
        $storage = Storage::disk('public');

        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (!$storage->exists($filePathname)) continue;

            $timeStamp = now()->subMinutes(30)->timestamp;
            if ($timeStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }
}
