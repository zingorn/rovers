<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 2:03
 */

namespace Nasa\Model\Coordinate;
use Nasa\Model\Exception\InvalidArgumentException;

/**
 * Class CartesianScope
 * @package Nasa\Model\Coordinate
 */
class CartesianScope implements ScopeInterface
{
    /**
     * @var double
     */
    protected $minScopeX = 0;

    /**
     * @var double
     */
    protected $minScopeY = 0;

    /**
     * @var double
     */
    protected $maxScopeX = 0;

    /**
     * @var double
     */
    protected $maxScopeY = 0;

    /**
     * @param array $options
     * @return mixed
     */
    public function setOptions(array $options)
    {
        if (isset($options['scopeX']) && is_numeric($options['scopeX'])) {
            $this->setMinScopeX(doubleval($options['scopeX']));
        }
        if (isset($options['scopeY']) && is_numeric($options['scopeY'])) {
            $this->setMinScopeY(doubleval($options['scopeY']));
        }
    }

    /**
     * @param mixed $coordinate
     * @return mixed
     */
    public function isValidScope($coordinate)
    {
        if (!$coordinate instanceof CartesianCoordinate) {
            throw new InvalidArgumentException('Object must implements \Nasa\Model\Coordinate\CartesianCoordinate');
        }

        $isValid = true;
        if ($coordinate->getX() < $this->getMinScopeX() || $coordinate->getX() > $this->getMaxScopeX()
            || $coordinate->getY() < $this->getMinScopeY() || $coordinate->getY() > $this->getMaxScopeY()
        ) {
            $isValid = false;
        }

        return $isValid;
    }

    /**
     * @return int
     */
    public function getMinScopeX()
    {
        return $this->minScopeX;
    }

    /**
     * @param int $minScopeX
     * @return $this
     */
    public function setMinScopeX($minScopeX)
    {
        $this->minScopeX = $minScopeX;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinScopeY()
    {
        return $this->minScopeY;
    }

    /**
     * @param int $minScopeY
     * @return $this
     */
    public function setMinScopeY($minScopeY)
    {
        $this->minScopeY = $minScopeY;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaxScopeX()
    {
        return $this->maxScopeX;
    }

    /**
     * @param float $maxScopeX
     * @return $this
     */
    public function setMaxScopeX($maxScopeX)
    {
        $this->maxScopeX = $maxScopeX;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaxScopeY()
    {
        return $this->maxScopeY;
    }

    /**
     * @param float $maxScopeY
     * @return $this
     */
    public function setMaxScopeY($maxScopeY)
    {
        $this->maxScopeY = $maxScopeY;
        return $this;
    }
}