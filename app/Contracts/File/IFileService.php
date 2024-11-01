<?php

namespace App\Contracts\File;

use App\Dto\File\FileDownloadDto;
use Illuminate\Http\UploadedFile;

interface IFileService
{
    public function download(array|UploadedFile $files): array;

    public function save(FileDownloadDto $fileDto): bool;
}
