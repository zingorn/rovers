<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:02
 */
namespace Nasa\Program;

/**
 * Интефейс программы для роботов
 *
 * Interface ProgramInterface
 * @package Nase\Program
 */
interface ProgramInterface
{
    /**
     * @return string
     */
    public function getInput();

    /**
     * @param string $input
     * @return $this
     */
    public function setInput($input);

    /**
     * @return string
     */
    public function getOutput();

    /**
     * @param mixed $object
     * @return mixed
     */
    public function run($object);
}