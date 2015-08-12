<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:08
 */

namespace Nasa\Program\Context;


interface ObjectsProviderInterface
{
    public function getObjects();

    public function setObjects($objects);

    public function addObject($object);
}