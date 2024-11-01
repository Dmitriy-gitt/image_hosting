<?php

namespace App\Services\File;

use App\Contracts\File\IFileRepository;
use App\Contracts\File\IFileService;
use App\Dto\File\FileDownloadDto;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class FileService implements IFileService
{
    public function __construct(
        protected IFileRepository $fileRepository,
    ) {
    }

    public function download(array|UploadedFile $files): array
    {
        $fileDtos = [];

        foreach ($files as $file) {
            $filename = 'file' . time() . '_' . str_replace(['.', '-'], '', uniqid()) . '.' . strtolower($file->getClientOriginalExtension());
            $filename = preg_replace('/[^a-z.]/', '', $filename);
            $fileDto = FileDownloadDto::from([
                'extension' => $file->getClientOriginalExtension(),
                'filename' => $file->getClientOriginalName(),
                'path' => $file->move(public_path() . '/images', $filename),
            ]);

            $this->save($fileDto);
            $fileDtos[] = $fileDto;
        }

        return $fileDtos;
    }

    public function getAllFiles(): Collection
    {
        $files = $this->getFiles();

        $files = $files->filter(function ($file) {
            // Проверяем наличие файла в директории public/images
            return File::exists(public_path('images/' . $file->name));
        });

        return $files;
    }

    public function save(FileDownloadDto $fileDto): bool
    {
        return $this->fileRepository->save($fileDto);
    }

    public function destroy(int|string $id)
    {
        $this->fileRepository->destroy($id);
    }

    public function getFiles(): Collection
    {
        return $this->fileRepository->getFiles();
    }
}
