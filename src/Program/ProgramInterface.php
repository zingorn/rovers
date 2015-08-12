<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:02
 */
namespace Nasa\Program;

use Nasa\Model\Rover\RoverInterface;

/**
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
     * @param RoverInterface $rover
     * @return $this
     */
    public function run(RoverInterface $rover);
}