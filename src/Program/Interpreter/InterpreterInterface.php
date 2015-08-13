<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 23:08
 */

namespace Nasa\Program\Interpreter;

/**
 * Интерфейс интерпритатора кода программ
 *
 * Interface InterpreterInterface
 * @package Nasa\Program\Interpreter
 */
interface InterpreterInterface 
{
    /**
     * @param mixed $value
     * @return mixed
     */
    public function interpret($value);
}