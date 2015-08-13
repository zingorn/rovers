<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:00
 */

namespace Nasa\Model\Rover;
use Nasa\Model\Coordinate\PositionProviderInterface;
use Nasa\Model\InputAdapter\InputAdapterInterface;
use Nasa\Model\Direction\DirectionProviderInterface;
use Nasa\Model\Coordinate\CoordinateInterface;
use Nasa\Model\Direction\DirectionInterface;

/**
 * Примитивный робот
 *
 * Class Rover
 * @package Nasa\Model\Rover
 */
class Rover extends AbstractRover implements
    PositionProviderInterface,
    InputAdapterInterface,
    DirectionProviderInterface
{
    /**
     *
     * @var CoordinateInterface
     */
    protected $position;

    /**
     * @var InputAdapterInterface
     */
    protected $inputAdapter;

    /**
     * @var DirectionInterface
     */
    protected $direction;

    /**
     * @return mixed
     */
    public function getInputAdapter()
    {
        return $this->inputAdapter;
    }

    /**
     * @param mixed $inputAdapter
     * @return $this
     */
    public function setInputAdapter($inputAdapter)
    {
        $this->inputAdapter = $inputAdapter;
        return $this;
    }

    /**
     * @return CoordinateInterface
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param CoordinateInterface $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return DirectionInterface
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param DirectionInterface $direction
     * @return $this
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
        return $this;
    }
}