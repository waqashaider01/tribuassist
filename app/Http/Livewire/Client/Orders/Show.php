<?php

namespace App\Http\Livewire\Client\Orders;

use App\Models\Order;
use App\Models\SlideshowSample;
use App\Models\Tribute;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use ZipArchive;

class Show extends Component
{
    public $tribute;

    public function mount(Tribute $tribute)
    {
        $this->tribute = $tribute;
    }

    public function processOrder()
    {
        $this->tribute->status = 2;
        $this->tribute->save();
    }

    public function downloadTxt()
    {
        $tribute = $this->tribute;

        if ($tribute->instructions_path && Storage::exists($tribute->instructions_path)) {
            return Storage::download($tribute->instructions_path);
        } else {
            $first_name = $tribute->first_name;
            $last_name = $tribute->last_name;
            $dob = $tribute->dob;
            $dod = $tribute->dod;
            $contents = $first_name . "\n" . $last_name . "\n" . $dob . "\n" . $dod;

            $fileName = substr($tribute->first_name, 0, 1) . substr($tribute->last_name, 0, 1) . explode('-', $tribute->record_id)[1];

            $filePath = 'orders/' . $tribute->id . '/' . $fileName . '.txt';
            Storage::put($filePath, $contents);

            $tribute->update([
                'instructions_path' => $filePath
            ]);

            return Storage::download($filePath);
        }
    }

    public function downloadZip()
    {
        $tribute = $this->tribute;

        // Begin: Make new ZIP archive
        $zip = new ZipArchive;
        $fileName = substr($tribute->first_name, 0, 1) . substr($tribute->last_name, 0, 1) . explode('-', $tribute->record_id)[1];
        $filePath = 'orders/' . $tribute->id . '/' . $fileName . '.zip';

        $this->tribute->update([
            "archive_path" => $filePath,
        ]);

        // Begin: Processing ZIP
        if ($zip->open(public_path('storage/' . $filePath), ZipArchive::CREATE) === true) {
            $images = $tribute->images()->orderBy('serial_number', 'asc')->get();


            // Begin: Adding audio files
            $musics = [];

            $uploadedMusics = $tribute->uploadedMusics;
            foreach ($uploadedMusics as $music) {
                $musics[$music->selection_number] = $music->path;
            }

            $libraryMusics = $tribute->libraryMusics();
            foreach ($libraryMusics as $key => $music) {
                $musics[$key] = SlideshowSample::find($music)->path;
            }

            foreach ($musics as $key => $music) {
                $musicExtension = explode('.', $music)[1];
                $zip->addFile(public_path('storage/' . $music), $key . '.' . $musicExtension);
            }
            // End: Adding audio files

            // Begin: Adding images
            $tempTxtFiles = []; // for Comment

            foreach ($images as $image) {
                $imageExtension = explode('.', $image->path)[1];

                if ($image->is_thumbnail) {
                    $fileName = 'thumbnail';
                } else {
                    $fileName = $this->fileNumericName($image->serial_number);
                }

                // Image file
                $zip->addFile(public_path('storage/' . $image->path), $fileName . '.' . $imageExtension);

                // TXT file
                if ($image->comment) {
                    $txtPath = 'temporary-files/' . $tribute->id . '/' . $fileName . '.txt';
                    $tempTxtFiles[] = $txtPath;
                    Storage::put($txtPath, $image->comment);
                    $zip->addFile(public_path('storage/' . $txtPath), $fileName . '.txt');
                }
            }
            // End: Adding images

            $zip->close();

            // Delete temporary TXT files for Comment
            foreach ($tempTxtFiles as $file) {
                Storage::delete($file);
            }
        } else {
            dd('Something went wrong!');
        }

        // End: Processing ZIP

        $tribute->update([
            'archive_path' => $filePath
        ]);

        return Storage::download($filePath);
    }

    public function fileNumericName($position)
    {
        $availablePrefix = 3 - strlen($position);
        for ($i = 0; $i < $availablePrefix; $i++) {
            $position = '0' . $position;
        }
        return $position;
    }

    public function markAsCompleted()
    {
        $this->tribute->status = 3;
        $this->tribute->save();
    }

    public function render()
    {
        return view('livewire.client.orders.show')->layout('layouts.client');
    }
}
