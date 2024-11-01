<?php

namespace App\Contracts\File;

use App\Dto\File\FileDownloadDto;

interface IFileRepository
{
    public function save(FileDownloadDto $fileDto): bool;
}
