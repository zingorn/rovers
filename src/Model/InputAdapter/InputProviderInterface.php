<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 2:22
 */

namespace Nasa\Model\InputAdapter;

/**
 * Интерфейс зависимости прибора ввода
 *
 * Interface InputProviderInterface
 * @package Nasa\Model\InputAdapter
 */
interface InputProviderInterface
{
    /**
     * @return InputAdapterInterface
     */
    public function getInputAdapter();

    /**
     * @param InputAdapterInterface $adapter
     * @return $this
     */
    public function setInputAdapter($adapter);
}