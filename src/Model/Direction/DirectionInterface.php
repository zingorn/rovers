<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 21:31
 */
namespace Nasa\Model\Direction;

/**
 * Интерфейс направления(ориентации)
 *
 * Interface DirectionInterface
 * @package Nasa\Model\Direction
 */
interface DirectionInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $value
     * @return mixed
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function __toString();
}