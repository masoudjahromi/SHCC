<?php

namespace App\Services\ImageManipulator;

use Exception;
use App\Services\ImageManipulator\Interfaces\ManipulatorProviderInterface;

/**
 * Class ManipulatorProvider
 *
 * @package App\Services\ImageManipulator
 */
class ManipulatorProvider implements ManipulatorProviderInterface
{
    /**
     * @var array
     */
    private $manipulators = [];

    /**
     * ManipulatorProvider constructor.
     *
     * @param array $manipulators
     */
    public function __construct(array $manipulators)
    {
        foreach ($manipulators as $manipulator) {
            $this->manipulators[$manipulator->getType()] = $manipulator;
        }
    }

    /**
     * @param string $type
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function getManipulator(string $type)
    {
        if (!isset($this->manipulators[$type])) {
            throw new Exception('Manipulator type is invalid');
        }

        return $this->manipulators[$type];
    }
}
