<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:30
 */

namespace Nasa\Program\Command\Coordinate\Cartesian;

use Nasa\Model\Coordinate\CartesianCoordinate;
use Nasa\Model\Rover\RoverInterface;
use Nasa\Program\Command\CommandInterface;
use Nasa\Program\Command\Exception\InvalidArgumentException;
use Nasa\Program\Command\ValidatorProviderInterface;

/**
 * Class MoveCommand
 * @package Nasa\Program\Command\Coordinate
 */
class MoveCommand implements CommandInterface, ValidatorProviderInterface
{
    /**
     * @param $object
     * @return mixed
     */
    public function execute($object)
    {
        if (!$object instanceof RoverInterface) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Rover\RoverInterface');
        }
        $position = $object->getPosition();
        if (!$position instanceof CartesianCoordinate) {
            throw new InvalidArgumentException('Position must implements \Nasa\Model\Coordinate\CartesianCoordinate');
        }

    }

    /**
     * @return array
     */
    public function getValidatorsSpecification()
    {
        return array(
            array(
                'type' => 'Nasa\Program\Validator\Command\CoordinateMoveValidator'
            )
        );
    }


}