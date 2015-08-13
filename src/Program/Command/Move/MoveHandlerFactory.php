<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 11:06
 */

namespace Nasa\Program\Command\Move;


use Nasa\Model\Coordinate\PositionProviderInterface;
use Nasa\Model\Direction\DirectionProviderInterface;
use Nasa\Model\Rover\RoverInterface;
use Nasa\Program\Command\Exception\InvalidArgumentException;
use Nasa\Program\Command\Exception\InvalidMoveHandlerWrappedClass;
use Nasa\Program\Command\Move\Handler\AbstractHandler;

/**
 *
 * Class MoveHandlerFactory
 * @package Nasa\Program\Command\Move
 */
class MoveHandlerFactory
{
    /**
     * @var array
     */
    protected static $map = array(
        'Cardinal_Cartesian' => 'Nasa\Program\Command\Move\Handler\CartesianCardinalHandler'
    );

    /**
     * @param RoverInterface $object
     * @return AbstractHandler
     */
    public static function create($object)
    {
        if (!$object instanceof DirectionProviderInterface) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Direction\DirectionProviderInterface');
        }
        $direction = $object->getDirection();
        if (!$object instanceof PositionProviderInterface) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Coordinate\PositionProviderInterface');
        }
        $position = $object->getPosition();

        $directionName = preg_replace(array('/^(Nasa\\\Model\\\Direction\\\)/', '/Direction$/'), '', get_class($direction));
        $positionName = preg_replace(array('/^(Nasa\\\Model\\\Coordinate\\\)/', '/Coordinate$/'), '', get_class($position));

        $mapKey = "{$directionName}_{$positionName}";
        if (!array_key_exists($mapKey, self::$map)) {
            throw new InvalidMoveHandlerWrappedClass("Key $mapKey not found in map");
        }

        $wrappedClass = self::$map[$mapKey];
        if (!class_exists($wrappedClass)) {
            throw new InvalidMoveHandlerWrappedClass("Class $wrappedClass not found");
        }
        $handler = new $wrappedClass();
        if (!$handler instanceof AbstractHandler) {
            throw new InvalidMoveHandlerWrappedClass("Class $wrappedClass must implements " .
                "\\Nasa\\Program\\Command\\Move\\Handler\\AbstractHandler");
        }

        return $handler;
    }

    /**
     * @param array $map
     * @return void
     */
    public static function setHandlerMap($map)
    {
        self::$map = $map;
    }
}