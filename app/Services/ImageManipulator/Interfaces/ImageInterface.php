<?php

namespace App\Services\ImageManipulator\Interfaces;

/**
 * Interface ImageInterface
 *
 * @package App\Services\ImageManipulator\Interfaces
 */
interface ImageInterface
{
    /**
     * @param string $text
     *
     * @return ImageInterface
     */
    public function setText(string $text): ImageInterface;

    /**
     * @return ImageInterface
     */
    public function setFilter(): ImageInterface;

    /**
     * @param string $imagePath
     *
     * @return string
     */
    public function save(string $imagePath): string;
}
