<?php

namespace App\Providers;

use App\Contracts\File\IFileRepository;
use App\Contracts\File\IFileService;
use App\Repository\File\FileRepository;
use App\Services\File\FileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IFileService::class, FileService::class);
        $this->app->bind(IFileRepository::class, FileRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
