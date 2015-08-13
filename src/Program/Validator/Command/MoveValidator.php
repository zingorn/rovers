<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 11:38
 */

namespace Nasa\Program\Validator\Command;


use Nasa\Program\Command\Move\MoveHandlerFactory;
use Nasa\Program\Context\ContextAwareInterface;
use Nasa\Program\Context\ContextInterface;
use Nasa\Program\Validator\AbstractValidator;

/**
 * Валидатор команды перемещения объекта к контексте
 *
 * Class MoveValidator
 * @package Nasa\Program\Validator\Command
 */
class MoveValidator  extends AbstractValidator implements ContextAwareInterface
{
    /** @var  ContextInterface */
    protected $context;

    /**
     * @var MoveHandlerFactory
     */
    protected $handlerFactory;

    /**
     * @param ContextInterface $context
     * @return mixed
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @param $object
     * @return bool
     */
    public function isValid($object)
    {
        $handler = $this->getHandlerFactory()->create($object);
        $handler->setContext($this->context);
        if (!$handler->isValid($object)) {
            $this->errors = $handler->getErrors();
            return false;
        }
        return true;
    }

    /**
     * @return MoveHandlerFactory
     */
    public function getHandlerFactory()
    {
        if ($this->handlerFactory === null) {
            $this->handlerFactory = new MoveHandlerFactory();
        }
        return $this->handlerFactory;
    }

    /**
     * @param MoveHandlerFactory $handlerFactory
     * @return $this
     */
    public function setHandlerFactory($handlerFactory)
    {
        $this->handlerFactory = $handlerFactory;
        return $this;
    }
}