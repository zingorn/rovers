<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 2:21
 */

namespace Nasa\Model\Coordinate;

/**
 * Interface PositionProviderInterface
 * @package Nasa\Model\Coordinate
 */
interface PositionProviderInterface
{
    /**
     * @return CoordinateInterface
     */
    public function getPosition();

    /**
     * @param CoordinateInterface $position
     * @return $this
     */
    public function setPosition($position);
}