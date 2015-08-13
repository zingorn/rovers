<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 11:15
 */

namespace Nasa\Program\Command\Move;

use Nasa\Model\Rover\RoverInterface;

/**
 * Interface MoveHandlerInterface
 * @package Nasa\Program\Command\Move
 */
interface MoveHandlerInterface
{
    /**
     * @param RoverInterface $object
     * @return mixed
     */
    public function execute($object);
}