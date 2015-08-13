<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 2:29
 */

namespace Nasa\Program\Validator;

/**
 * Абстрактный валидатор
 *
 * Class AbstractValidator
 * @package Nasa\Program\Validator
 */
abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @var array
     */
    protected $messages = array();

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param string $error
     * @return array
     */
    public function addError($error)
    {
        $this->errors[] = !array_key_exists($error, $this->messages) ? $error : $this->messages[$error];
        return $this->errors;
    }
}