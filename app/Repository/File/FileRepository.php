<?php

namespace App\Repository\File;

use App\Contracts\File\IFileRepository;
use App\Dto\File\FileDownloadDto;
use App\Models\File;
use Illuminate\Support\Collection;

class FileRepository implements IFileRepository
{
    public function __construct(
        protected File $model,
    ){}
    public function save(FileDownloadDto $fileDto): bool
    {
        return $this->model->newQuery()->create(['name' => $fileDto->filename])->save();
    }

    public function destroy(int|string $id): bool
    {
        return $this->model->newQuery()->findOrFail($id)->delete();
    }

    public function getFiles(): Collection
    {
        return $this->model->newQuery()->orderBy('name')->orderBy('created_at')->get();
    }
}
