<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:17
 */
namespace Nasa\Program\Command;

/**
 * Interface CommandInterface
 * @package Nasa\Program\Command
 */
interface CommandInterface
{
    /**
     * @param $object
     * @return mixed
     */
    public function execute($object);
}