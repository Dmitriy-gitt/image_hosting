<?php
namespace App\Http\Controllers;

use ZipArchive;
use File;
use App\Models\File as ModelFile;

class ZipFileController extends Controller
{
    public function download($id)
    {
        $zip = new ZipArchive;
        $file = ModelFile::findOrFail($id);
        $fileName = 'myNewFile.zip';
    
        if ($zip->open(public_path($fileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $filePath = public_path('images/' . $file->name);
            if (file_exists($filePath)) {
                $zip->addFile($filePath, basename($filePath));
            }
            $zip->close();
        }
    
        return response()->download(public_path($fileName));
    }
}