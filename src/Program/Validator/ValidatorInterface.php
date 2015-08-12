<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:13
 */

namespace Nasa\Program\Validator;
use Nasa\Program\Context\ContextInterface;

/**
 * Interface ValidatorInterface
 * @package Nasa\Program\Validator
 */
interface ValidatorInterface
{
    /**
     * @param $object
     * @return bool
     */
    public function isValid($object);

    /**
     * @return array
     */
    public function getErrors();
}