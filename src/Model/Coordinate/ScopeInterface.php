<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 2:03
 */

namespace Nasa\Model\Coordinate;

/**
 * Interface ScopeInterface
 * @package Nasa\Model\Coordinate
 */
interface ScopeInterface
{
    /**
     * @param mixed $coordinate
     * @return mixed
     */
    public function isValidScope($coordinate);

    /**
     * @param array $options
     * @return mixed
     */
    public function setOptions(array $options);
}