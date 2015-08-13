<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 2:23
 */

namespace Nasa\Model\Direction;

/**
 * Интерфейс зависимости направления
 *
 * Interface DirectionProviderInterface
 * @package Nasa\Model\Direction
 */
interface DirectionProviderInterface 
{
    /**
     * @return DirectionInterface
     */
    public function getDirection();

    /**
     * @param DirectionInterface $direction
     * @return $this
     */
    public function setDirection($direction);
}