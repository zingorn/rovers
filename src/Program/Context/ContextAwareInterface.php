<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:39
 */

namespace Nasa\Program\Context;

/**
 * Интерфейс зависимости контекста
 *
 * Interface ContextAwareInterface
 * @package Nasa\Program\Context
 */
interface ContextAwareInterface
{
    /**
     * @param ContextInterface $context
     * @return mixed
     */
    public function setContext($context);
}