<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 21:31
 */

namespace Nasa\Model\Direction;

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
        return !array_key_exists($this->getValue(), $this->translate) ? '' : $this->translate[$this->getValue()];
    }

    /**
     * @param string $alias
     * @return CardinalDirection
     */
    public static function createByAlias($alias)
    {
        $instance = new self();
        if (in_array($alias, $instance->translate)) {
            $value = array_search($alias, $instance->translate);
            $instance->setValue($value);
        }
        return $instance;
    }
}