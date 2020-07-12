<?php

namespace App\Services\ImageManipulator\Interfaces;

/**
 * Interface ManipulatorInterface
 *
 * @package App\Services\ImageManipulator\Interfaces
 */
interface ManipulatorInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param ImageInterface $image
     * @param string         $value
     *
     * @return ImageInterface
     */
    public function manipulate(ImageInterface $image, string $value): ImageInterface;
}
