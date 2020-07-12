<?php

namespace App\Services\ImageManipulator\Spatie;

use Spatie\Image\Image;
use Illuminate\Http\UploadedFile;
use App\Services\ImageManipulator\AbstractImage;
use App\Services\ImageManipulator\Interfaces\ImageInterface;

/**
 * Class ImageSpatieAdapter
 *
 * @package App\Services\ImageManipulator\Spatie
 */
class ImageSpatieAdapter extends AbstractImage
{
    /**
     * @var Image
     */
    private $image;

    /**
     * ImageSpatieAdapter constructor.
     *
     * @param UploadedFile $image
     */
    public function __construct(UploadedFile $image)
    {
        parent::__construct($image);
        $this->image = Image::load($image);
    }

    /**
     * @param string $text
     *
     * @return ImageInterface
     */
    public function setText(string $text): ImageInterface
    {
        return $this;
    }

    /**
     * @return ImageInterface
     */
    public function setFilter(): ImageInterface
    {
        $this->image->greyscale();

        return $this;
    }

    /**
     * @param string $imagePath
     */
    protected function saveImage(string $imagePath): void
    {
        $this->image->save($imagePath);
    }
}
