<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\File;


class ViewFileController extends Controller
{
    public function index()
    {
        $files = File::orderBy('name')->orderBy('created_at')->get();

        $files = $files->filter(function ($file) {
            // Проверяем наличие файла в директории public/images
            return File::exists(public_path('images/' . $file->name));
        });
        return view('load.view', compact('files'));
    }

    public function GetOriginalPhoto($filename)
    {
        return response()->file(public_path('images/' . $filename));
    }
}