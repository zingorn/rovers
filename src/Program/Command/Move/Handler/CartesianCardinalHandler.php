<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 11:22
 */

namespace Nasa\Program\Command\Move\Handler;


use Nasa\Model\Coordinate\CartesianCoordinate;
use Nasa\Model\Coordinate\PositionProviderInterface;
use Nasa\Model\Direction\CardinalDirection;
use Nasa\Model\Direction\DirectionProviderInterface;
use Nasa\Model\Rover\Rover;
use Nasa\Model\Rover\RoverInterface;
use Nasa\Program\Command\Exception\InvalidArgumentException;
use Nasa\Program\Context\ObjectsProviderInterface;
use Nasa\Program\Context\ScopeAwareInterface;

/**
 * Обработчик команда передвижения в прямоугольной системе координат с ориентацией по сторонам Света.
 *
 * Class CartesianCardinalHandler
 * @package Nasa\Program\Command\Move\Handler
 */
class CartesianCardinalHandler extends AbstractHandler
{
    const VALIDATOR_INVALID_SCOPE = 'validator.invalid.scope';
    const VALIDATOR_OBJECT_EXISTS = 'validator.object.exists';

    /**
     * @var array
     */
    protected $messages = array(
        self::VALIDATOR_INVALID_SCOPE => 'Invalid scope',
        self::VALIDATOR_OBJECT_EXISTS => 'Object exists on position: %s',
    );

    /**
     * @param Rover $object
     * @return mixed
     */
    public function execute($object)
    {
        $this->checkObject($object);
        $this->changePosition($object->getDirection(), $object->getPosition());
    }

    /**
     * @param RoverInterface $object
     * @return void
     */
    protected function checkObject($object)
    {
        if (!$object instanceof DirectionProviderInterface) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Direction\DirectionProviderInterface');
        }
        $direction = $object->getDirection();
        if (!$direction instanceof CardinalDirection) {
            throw new InvalidArgumentException('Object direction must implements \Nasa\Model\Direction\CardinalDirection');
        }
        if (!$object instanceof PositionProviderInterface) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Coordinate\PositionProviderInterface');
        }
        $position = $object->getPosition();
        if (!$position instanceof CartesianCoordinate) {
            throw new InvalidArgumentException('Object coordinates must implements \Nasa\Model\Coordinate\CartesianCoordinate');
        }
    }

    /**
     * @param CardinalDirection $direction
     * @param CartesianCoordinate $position
     * @return void
     */
    protected function changePosition($direction, $position)
    {
        switch ($direction->getValue()) {
            case CardinalDirection::NORTH:
                $position->setY($position->getY() + 1);
                break;

            case CardinalDirection::EAST:
                $position->setX($position->getX() + 1);
                break;

            case CardinalDirection::SOUTH:
                $position->setY($position->getY() - 1);
                break;

            case CardinalDirection::WEST:
                $position->setX($position->getX() - 1);
                break;
        }
    }

    /**
     * @param mixed $object
     * @return bool
     */
    public function isValid($object)
    {
        $isValid = true;

        try {
            $this->checkObject($object);
        } catch (\Exception $e) {
            $this->addError($e->getMessage());
            return false;
        }

        $context = $this->getContext();
        /** @var PositionProviderInterface $object */
        $clonePosition = clone $object->getPosition();
        /** @var DirectionProviderInterface $object */
        $direction = $object->getDirection();
        $this->changePosition($direction, $clonePosition);

        // validate scope
        if ($context instanceof ScopeAwareInterface) {
            $scope = $context->getScope();
            // var_dump($object->getPosition().$object->getDirection(). '->'. $clonePosition , $scope->isValidScope($clonePosition));
            if (!$scope->isValidScope($clonePosition)) {
                $this->addError(self::VALIDATOR_INVALID_SCOPE);
                return false;
            }
        }

        if (!$context instanceof ObjectsProviderInterface || !is_array($context->getObjects())) {
            return $isValid;
        }

        $objects = $context->getObjects();
        /** @var PositionProviderInterface $contextObject */
        foreach ($objects as $contextObject) {
            $equal = $contextObject->getPosition()->isEqualCoordinates($clonePosition);
            if ($equal) {
                $this->addError(sprintf($this->messages[self::VALIDATOR_OBJECT_EXISTS], $contextObject->getPosition()));
                return false;
            }
        }

        return true;
    }

}