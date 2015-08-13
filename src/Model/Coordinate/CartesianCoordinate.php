<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 21:07
 */

namespace Nasa\Model\Coordinate;
use Nasa\Model\Exception\InvalidArgumentException;

/**
 * Class CartesianCoordinate
 * @package Nasa\Model\Coordinate
 */
class CartesianCoordinate implements CoordinateInterface
{
    /**
     * @var double
     */
    protected $x;

    /**
     * @var double
     */
    protected $y;

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %s', $this->getX(), $this->getY());
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param float $x
     * @return $this
     */
    public function setX($x)
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param float $y
     * @return $this
     */
    public function setY($y)
    {
        $this->y = $y;
        return $this;
    }

    /**
     * @param CartesianCoordinate $second
     * @return mixed
     */
    public function isEqualCoordinates($second)
    {
        if (!$second instanceof CartesianCoordinate) {
            throw new InvalidArgumentException('Coordinates must implements \Nasa\Model\Coordinate\CartesianCoordinate, ' .
                (is_object($second) ? get_class($second) : gettype($second)) . ' given');
        }

        return $this->getX() == $second->getX() && $this->getY() == $second->getY();
    }


}