<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:07
 */

namespace Nasa\Program\Context;

/**
 * Интерфейс контекста выполнеия программы
 *
 * Interface ContextInterface
 * @package Nasa\Program\Context
 */
interface ContextInterface
{
    /**
     * @return mixed
     */
    public function getCurrentObject();

    /**
     * @param mixed $rover
     * @return mixed
     */
    public function setCurrentObject($rover);
}