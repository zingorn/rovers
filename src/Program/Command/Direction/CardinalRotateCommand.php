<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:17
 */
namespace Nasa\Program\Command\Direction;

use Nasa\Model\Direction\CardinalDirection;
use Nasa\Model\Direction\DirectionProviderInterface;
use Nasa\Model\Rover\RoverInterface;
use Nasa\Program\Command\CommandInterface;
use Nasa\Program\Command\Exception\InvalidArgumentException;

/**
 * Команда поворота по сторонам Света
 *
 * Class RotateCommand
 * @package Nasa\Program\Command
 */
class CardinalRotateCommand implements CommandInterface
{
    const DIRECTION_LEFT = 'direction.left';
    const DIRECTION_RIGHT = 'direction.right';

    /**
     * @var array
     */
    protected $allowDirections = array(
        self::DIRECTION_LEFT,
        self::DIRECTION_RIGHT,
    );

    /**
     * @var string
     */
    protected $direction;

    /**
     * @param array|null $options
     */
    public function __construct($options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * @param array $options
     * @return void
     */
    public function setOptions(array $options)
    {
        if (isset($options['direction'])) {
            $this->setDirection($options['direction']);
        }
    }

    /**
     * @param RoverInterface $object
     * @return mixed
     */
    public function execute($object)
    {
        if (!$object instanceof DirectionProviderInterface) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Direction\DirectionProviderInterface');
        }


        $objectDirection = $object->getDirection();
        $dir = $this->getDirection();

        switch ($objectDirection->getValue()) {
            case CardinalDirection::NORTH:
                $objectDirection->setValue($dir == self::DIRECTION_LEFT ? CardinalDirection::WEST : CardinalDirection::EAST);
                break;

            case CardinalDirection::EAST:
                $objectDirection->setValue($dir == self::DIRECTION_LEFT ? CardinalDirection::NORTH : CardinalDirection::SOUTH);
                break;

            case CardinalDirection::SOUTH:
                $objectDirection->setValue($dir == self::DIRECTION_LEFT ? CardinalDirection::EAST : CardinalDirection::WEST);
                break;

            case CardinalDirection::WEST:
                $objectDirection->setValue($dir == self::DIRECTION_LEFT ? CardinalDirection::SOUTH : CardinalDirection::NORTH);
                break;
        }
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param string $direction
     * @return $this
     */
    public function setDirection($direction)
    {
        if (!in_array($direction, $this->allowDirections)) {
            throw new InvalidArgumentException('Invalid direction for \Nasa\Program\Command\Direction\RotateCommand');
        }
        $this->direction = $direction;
        return $this;
    }
}