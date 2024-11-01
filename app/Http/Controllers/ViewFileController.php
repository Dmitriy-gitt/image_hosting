<?php
namespace App\Http\Controllers;

use App\Contracts\File\IFileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\File;


class ViewFileController extends Controller
{

    public function __construct(
        protected IFileService  $fileService
    ){
    }
    public function index()
    {
        $files = $this->fileService->getAllFiles();

        return view('load.view', compact('files'));
    }

    public function GetOriginalPhoto($filename)
    {
        return response()->file(public_path('images/' . $filename));
    }
}
