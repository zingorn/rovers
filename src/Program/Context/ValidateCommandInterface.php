<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:32
 */

namespace Nasa\Program\Context;

/**
 * Interface ValidateCommandInterface
 * @package Nasa\Program\Context
 */
interface ValidateCommandInterface 
{
    /**
     * @param $command
     * @return mixed
     */
    public function validateCommand($command);

    /**
     * @return array
     */
    public function getErrorMessages();
}