<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:36
 */

namespace Nasa\Program\Validator;
use Nasa\Program\Validator\Exception\InvalidArgumentException;
use Nasa\Program\Validator\Exception\InvalidWrapperClass;

/***
 * Class ValidatorFactory
 * @package Nasa\Program\Validator
 */
class ValidatorFactory
{
    /**
     * @param array $params
     * @return mixed
     * @throws InvalidWrapperClass
     */
    public static function create(array $params)
    {
        if (!isset($params['type'])) {
            throw new InvalidArgumentException('Type key is required');
        }

        $class = 'Nasa\\Program\\Validator\\' . ucfirst($params['type']);
        if (!class_exists($params['type']) && !class_exists($class)) {
            throw new InvalidWrapperClass('Class not found for '. $params['type']);
        }

        $className = class_exists($params['type']) ? $params['type'] : $class;

        $validator = array_key_exists('options', $params) ? new $className($params) : new $className;
        return $validator;
    }
}