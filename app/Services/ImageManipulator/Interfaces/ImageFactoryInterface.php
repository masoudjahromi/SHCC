<?php

namespace App\Services\ImageManipulator\Interfaces;

use Illuminate\Http\UploadedFile;

/**
 * Interface ImageFactoryInterface
 *
 * @package App\Services\ImageManipulator\Interfaces
 */
interface ImageFactoryInterface
{
    /**
     * @param UploadedFile $uploadedFile
     *
     * @return mixed
     */
    public function makeImage(UploadedFile $uploadedFile): ImageInterface;
}
