<?php

namespace App\Services\ImageManipulator;

use Illuminate\Http\UploadedFile;
use App\Services\ImageManipulator\Interfaces\ImageInterface;

/**
 * Class AbstractImage
 *
 * @package App\Services\ImageManipulator
 */
abstract class AbstractImage implements ImageInterface
{
    /**
     * @var string
     */
    private $format;

    /**
     * AbstractImage constructor.
     *
     * @param UploadedFile $image
     */
    public function __construct(UploadedFile $image)
    {
        $this->format = $image->getClientOriginalExtension();
    }

    /**
     * @param string $imagePath
     *
     * @return string
     */
    public function save(string $imagePath): string
    {
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0775, true);
        }
        $fileName = time() . '.' . $this->format;
        $imagePath = $imagePath . $fileName;
        $this->saveImage($imagePath);

        return $imagePath;
    }

    /**
     * @param string $imagePath
     *
     * @return mixed
     */
    abstract protected function saveImage(string $imagePath): void;
}
