<?php

namespace App\Http\Livewire\Client\Tributes;

use App\Models\Order;
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
        try {
            DB::beginTransaction();
            Order::create([
                'tribute_id' => $this->tribute->id
            ]);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }

    public function downloadTxt()
    {
        $tribute = $this->tribute;

        if ($tribute->order->instructions_path && Storage::exists($tribute->order->instructions_path)) {
            return Storage::download($tribute->order->instructions_path);
        } else {
            $first_name = $tribute->first_name;
            $last_name = $tribute->last_name;
            $dob = $tribute->dob;
            $dod = $tribute->dod;
            $contents = $first_name . "\n" . $last_name . "\n" . $dob . "\n" . $dod;

            $fileName = substr($tribute->first_name, 0, 1) . substr($tribute->last_name, 0, 1) . explode('-', $tribute->record_id)[1];

            $filePath = 'orders/' . $tribute->order->id . '/' . $fileName . '.txt';
            Storage::put($filePath, $contents);

            $tribute->order->update([
                'instructions_path' => $filePath
            ]);

            return Storage::download($filePath);
        }
    }

    public function downloadZip()
    {
        $tribute = $this->tribute;

        if ($tribute->order->archive_path && Storage::exists($tribute->order->archive_path)) {
            return Storage::download($tribute->order->archive_path);
        } else {
            // Make new ZIP archive
            $zip = new ZipArchive;
            $fileName = substr($tribute->first_name, 0, 1) . substr($tribute->last_name, 0, 1) . explode('-', $tribute->record_id)[1];
            $filePath = 'orders/' . $tribute->order->id . '/' . $fileName . '.zip';

            $this->tribute->order->update([
                "archive_path" => $filePath,
            ]);

            // Processing ZIP
            if ($zip->open(public_path('storage/' . $filePath), ZipArchive::CREATE) === true) {
                $images = $tribute->images()->orderBy('serial_number', 'asc')->get();

                // Adding images
                $tempTxtFiles = [];
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
                    $txtPath = 'temporary-files/' . $tribute->id . '/' . $fileName . '.txt';
                    $tempTxtFiles[] = $txtPath;
                    Storage::put($txtPath, $image->comment);
                    $zip->addFile(public_path('storage/' . $txtPath), $fileName . '.txt');
                }

                $zip->close();

                // Delete temporary TXT files
                foreach ($tempTxtFiles as $file) {
                    Storage::delete($file);
                }
            } else {
                dd('Something went wrong!');
            }

            $tribute->order->update([
                'archive_path' => $filePath
            ]);

            return Storage::download($filePath);
        }
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
        $this->tribute->order->completed = true;
        $this->tribute->order->save();
    }

    public function render()
    {
        return view('livewire.client.tributes.show')->layout('layouts.client');
    }
}
