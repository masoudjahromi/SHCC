<?php

namespace App\Providers;

use App\Constants\Constants;
use Illuminate\Support\ServiceProvider;
use App\Services\ImageManipulator\ImageFactory;
use App\Services\ImageManipulator\ManipulatorProvider;
use App\Services\ImageManipulator\TextAdderManipulator;
use App\Services\ImageManipulator\FilterAdderManipulator;
use App\Services\ImageManipulator\ImageManipulatorService;
use App\Services\ImageManipulator\Interfaces\ImageManipulatorServiceInterface;

/**
 * Class ImageManipulationsProvider
 *
 * @package App\Providers
 */
class ImageManipulationsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageManipulatorServiceInterface::class, function ($app) {
            $manipulators = [
                new TextAdderManipulator(),
                new FilterAdderManipulator(),
            ];
            return new ImageManipulatorService(
                new ImageFactory(),
                new ManipulatorProvider($manipulators),
                Constants::IMAGE_PATH
            );
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
