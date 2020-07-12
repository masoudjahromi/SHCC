<?php

namespace App\Services\ImageManipulator\Interfaces;

/**
 * Interface ManipulatorProviderInterface
 *
 * @package App\Services\ImageManipulator\Interfaces
 */
interface ManipulatorProviderInterface
{
    /**
     * @param string $type
     *
     * @return mixed
     */
    public function getManipulator(string $type);
}
