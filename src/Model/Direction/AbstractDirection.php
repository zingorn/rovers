<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 21:36
 */

namespace Nasa\Model\Direction;

/**
 * Абстрактная сущность направления
 *
 * Class AbstractDirection
 * @package Nasa\Model
 */
abstract class AbstractDirection implements DirectionInterface
{
    protected $value;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}