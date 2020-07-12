<?php

namespace App\Services\ImageManipulator;

use App\Constants\Constants;
use Illuminate\Http\UploadedFile;
use App\Services\ImageManipulator\Interfaces\ImageInterface;
use App\Services\ImageManipulator\Spatie\ImageSpatieAdapter;
use App\Services\ImageManipulator\Interfaces\ImageFactoryInterface;
use App\Services\ImageManipulator\Intervention\ImageInterventionAdapter;

/**
 * Class ImageFactory
 *
 * @package App\Services\ImageManipulator
 */
class ImageFactory implements ImageFactoryInterface
{
    /**
     * @param UploadedFile $uploadedFile
     *
     * @return ImageInterface
     */
    public function makeImage(UploadedFile $uploadedFile): ImageInterface
    {
        if (config('services.image_manipulation.type') == Constants::INTERVENTION) {
            return new ImageInterventionAdapter($uploadedFile);
        }

        return new ImageSpatieAdapter($uploadedFile);
    }
}
