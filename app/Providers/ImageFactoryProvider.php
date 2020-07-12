<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ImageManipulator\ImageFactory;
use App\Services\ImageManipulator\Interfaces\ImageFactoryInterface;

class ImageFactoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageFactoryInterface::class, function ($app) {
            return new ImageFactory();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
