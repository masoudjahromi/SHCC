<?php

namespace App\Services\ImageManipulator;

use App\Services\ImageManipulator\Interfaces\ImageInterface;
use App\Services\ImageManipulator\Interfaces\ManipulatorInterface;

/**
 * Class TextAdderManipulator
 *
 * @package App\Services\ImageManipulator
 */
class TextAdderManipulator implements ManipulatorInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return 'text';
    }

    /**
     * @param ImageInterface $image
     * @param string         $value
     *
     * @return ImageInterface
     */
    public function manipulate(ImageInterface $image, string $value): ImageInterface
    {
        return $image->setText($value);
    }
}
