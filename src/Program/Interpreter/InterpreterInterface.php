<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 23:08
 */

namespace Nasa\Program\Interpreter;
use Nasa\Program\Command\CommandInterface;

/**
 * Interface InterpreterInterface
 * @package Nasa\Program\Interpreter
 */
interface InterpreterInterface 
{
    /**
     * @return mixed
     */
    public function interpret($value);
}