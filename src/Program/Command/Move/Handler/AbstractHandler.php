<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 12:05
 */

namespace Nasa\Program\Command\Move\Handler;


use Nasa\Program\Command\Move\MoveHandlerInterface;
use Nasa\Program\Context\ContextAwareInterface;
use Nasa\Program\Context\ContextInterface;
use Nasa\Program\Validator\AbstractValidator;

/**
 * Class AbstractHandler
 * @package Nasa\Program\Command\Move\Handler
 */
abstract class AbstractHandler extends AbstractValidator implements MoveHandlerInterface, ContextAwareInterface
{
    /** @var  ContextInterface */
    protected $context;

    /**
     * @param ContextInterface $context
     * @return $this
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return ContextInterface
     */
    public function getContext()
    {
        return $this->context;
    }
}