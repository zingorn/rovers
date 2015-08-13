<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 1:51
 */

namespace Nasa\Program\Context;

use Nasa\Model\Coordinate\ScopeInterface;

/**
 * Интерфейс ожидания границ для контекста
 *
 * Interface ScopeProviderInterface
 * @package Nasa\Program\Context
 */
interface ScopeAwareInterface
{
    /**
     * @param ScopeInterface $scope
     * @return mixed
     */
    public function setScope(ScopeInterface $scope);

    /**
     * @return ScopeInterface
     */
    public function getScope();
}