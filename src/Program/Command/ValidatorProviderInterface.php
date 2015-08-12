<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:34
 */

namespace Nasa\Program\Command;

/**
 * TODO: define methods addValidator, removeValidator
 *
 * Interface ValidatorProviderInterface
 * @package Nasa\Program\Command
 */
interface ValidatorProviderInterface 
{
    /**
     * @return array
     */
    public function getValidatorsSpecification();
}