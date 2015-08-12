<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 21:31
 */

namespace Nasa\Model\Direction;
use Nasa\Model\Exception\InvalidArgumentException;

/**
 * Class EasyDirection
 * @package Nasa\Model
 */
class CardinalDirection extends AbstractDirection
{
    const NORTH     = 1;
    const EAST      = 2;
    const SOUTH     = 4;
    const WEST      = 8;

    /**
     * @var array
     */
    protected $translate = array(
        self::NORTH => 'N',
        self::EAST  => 'E',
        self::SOUTH => 'S',
        self::WEST  => 'W',
    );

    /**
     * @return string
     */
    public function __toString()
    {
        if (!array_key_exists($this->getValue(), $this->translate)) {
            throw new InvalidArgumentException($this->getValue() . 'is invalid direction');
        }
        return $this->translate[$this->getValue()];
    }
}