<?php

namespace App\Services\ImageManipulator\Intervention;

use App\Constants\Constants;
use Intervention\Image\Gd\Font;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use App\Services\ImageManipulator\AbstractImage;
use App\Services\ImageManipulator\Interfaces\ImageInterface;
use App\Services\ImageManipulator\Intervention\Filters\DarkFilter;

/**
 * Class ImageInterventionAdapter
 *
 * @package App\Services\ImageManipulator\Intervention
 */
class ImageInterventionAdapter extends AbstractImage
{
    /**
     * @var \Intervention\Image\Image
     */
    private $image;

    /**
     * ImageInterventionAdapter constructor.
     *
     * @param UploadedFile $image
     */
    public function __construct(UploadedFile $image)
    {
        parent::__construct($image);
        $this->image = Image::make($image);
    }

    /**
     * @param string $text
     *
     * @return ImageInterface
     */
    public function setText(string $text): ImageInterface
    {
        $image = $this->image;
        $x = max(14, $image->width() * 0.07);
        $y = max(14, $image->height() * 0.10);
        $image->text($text, $x, $y, function ($font) use ($image) {
            /**
             * @var Font $font
             */
            $font->file(public_path(Constants::FONT_DOHYEON));
            $font->size(max(14, $image->width() * 0.03));
        });

        return $this;
    }

    /**
     * @return ImageInterface
     */
    public function setFilter(): ImageInterface
    {
        $this->image->filter(new DarkFilter(1));

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
