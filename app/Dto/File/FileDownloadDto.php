<?php

namespace App\Dto\File;

use Spatie\LaravelData\Data;
class FileDownloadDto extends Data
{
    public function __construct(
        public string $extension,
        public string $filename,
        public string $path,
    ){}
}
