<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:08
 */

namespace Nasa\Program\Context;

/**
 * Interface ObjectsProviderInterface
 * @package Nasa\Program\Context
 */
interface ObjectsProviderInterface
{
    /**
     * @return mixed
     */
    public function getObjects();

    /**
     * @param array $objects
     * @return mixed
     */
    public function setObjects($objects);

    /**
     * @param array $object
     * @return mixed
     */
    public function addObject($object);
}