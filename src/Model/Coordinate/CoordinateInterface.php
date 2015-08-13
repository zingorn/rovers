<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 21:06
 */

namespace Nasa\Model\Coordinate;

/**
 * Interface CoordinateInterface
 * @package Nasa\Model\Coordinate
 */
interface CoordinateInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @param CoordinateInterface $second
     * @return mixed
     */
    public function isEqualCoordinates($second);
}