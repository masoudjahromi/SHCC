<?php

namespace App\Services\ImageManipulator;

use App\Services\ImageManipulator\Interfaces\ImageInterface;
use App\Services\ImageManipulator\Interfaces\ManipulatorInterface;

/**
 * Class FilterAdderManipulator
 *
 * @package App\Services\ImageManipulator
 */
class FilterAdderManipulator implements ManipulatorInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'filter';
    }

    /**
     * @param ImageInterface $image
     * @param string         $value
     *
     * @return ImageInterface
     */
    public function manipulate(ImageInterface $image, string $value): ImageInterface
    {
        return $image->setFilter();
    }
}
