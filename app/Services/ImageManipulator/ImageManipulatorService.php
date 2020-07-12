<?php

namespace App\Services\ImageManipulator;

use Illuminate\Http\UploadedFile;
use App\Services\ImageManipulator\Interfaces\ManipulatorInterface;
use App\Services\ImageManipulator\Interfaces\ImageFactoryInterface;
use App\Services\ImageManipulator\Interfaces\ManipulatorProviderInterface;
use App\Services\ImageManipulator\Interfaces\ImageManipulatorServiceInterface;

/**
 * Class ImageManipulatorService
 *
 * @package App\Services\ImageManipulator
 */
class ImageManipulatorService implements ImageManipulatorServiceInterface
{
    /**
     * @var string
     */
    private $imagePath;
    /**
     * @var ImageFactoryInterface
     */
    private $imageFactory;
    /**
     * @var ManipulatorProviderInterface
     */
    private $manipulatorProvider;

    /**
     * ImageManipulatorService constructor.
     *
     * @param ImageFactoryInterface        $imageFactory
     * @param ManipulatorProviderInterface $manipulatorProvider
     * @param string                       $imagePath
     */
    public function __construct(
        ImageFactoryInterface $imageFactory,
        ManipulatorProviderInterface $manipulatorProvider,
        string $imagePath
    ) {
        $this->imageFactory = $imageFactory;
        $this->manipulatorProvider = $manipulatorProvider;
        $this->imagePath = $imagePath;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param array        $operations
     *
     * @return mixed|string
     */
    public function manipulate(UploadedFile $uploadedFile, array $operations)
    {
        $image = $this->imageFactory->makeImage($uploadedFile);
        foreach ($operations as $operation) {
            /**
             * @var $manipulator ManipulatorInterface
             */
            $manipulator = $this->manipulatorProvider->getManipulator($operation->type);
            $image = $manipulator->manipulate($image, $operation->value);
        }

        return $image->save($this->imagePath);
    }
}
