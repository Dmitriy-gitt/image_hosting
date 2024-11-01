<?php

namespace App\Http\Controllers;

use App\Contracts\File\IFileService;
use App\Dto\File\FileDownloadDto;
use App\Services\File\FileService;
use App\Validate\File\FileRequest;
use App\Validate\File\FileUploadRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function __construct(
        protected IFileService  $fileService
    ){
    }

    public function index()
    {
        return view('load.load');
    }

    public function download(FileRequest $request)
    {
        $files = $request->file('files');

        if (!$files) {
            return redirect()->back()->withErrors(['files' => 'Файлы не были получены.']);
        }

        $filename = $this->fileService->download(files: $files);

        return view('load.answer', compact('filename'));

    }

    public function destroy(int|string $id)
    {
        $this->fileService->destroy($id);

        return redirect()->back()->with('success', 'Файл успешно удален.');
    }
}
