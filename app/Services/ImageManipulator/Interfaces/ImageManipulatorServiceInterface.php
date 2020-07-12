<?php

namespace App\Services\ImageManipulator\Interfaces;

use Illuminate\Http\UploadedFile;

/**
 * Interface ImageManipulatorServiceInterface
 *
 * @package App\Services\ImageManipulator\Interfaces
 */
interface ImageManipulatorServiceInterface
{
    /**
     * @param UploadedFile $uploadedFile
     * @param array        $operations
     *
     * @return mixed
     */
    public function manipulate(UploadedFile $uploadedFile, array $operations);
}
