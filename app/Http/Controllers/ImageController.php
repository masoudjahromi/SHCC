<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Http\Requests\ImageUploadRequest;
use App\Services\ImageManipulator\Interfaces\ImageManipulatorServiceInterface;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{
    /**
     * Upload an image API
     *
     * @param ImageUploadRequest               $imageUploadRequest
     * @param ImageManipulatorServiceInterface $imageManipulatorService
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(
        ImageUploadRequest $imageUploadRequest,
        ImageManipulatorServiceInterface $imageManipulatorService
    ) {
        $image = request()->file('image');
        $operations = request()->get('operations');
        $result = $imageManipulatorService->manipulate($image, json_decode($operations));

        return response()->json([
            'url' => URL::asset($result),
        ]);
    }
}
