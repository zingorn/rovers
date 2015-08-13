<?php
/**
 *
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:07
 */

namespace Nasa\Program\Context;
use Nasa\Model\Coordinate\ScopeInterface;
use Nasa\Program\Command\ValidatorProviderInterface;
use Nasa\Program\Validator\ValidatorFactory;

/**
 * TODO: implement Validator chain
 * Простой контекста
 *
 * Class PlatoContext
 * @package Nasa\Program\Context
 */
class PlatoContext implements
    ContextInterface,
    ObjectsProviderInterface,
    ValidateCommandInterface,
    ScopeAwareInterface
{
    /** @var  ScopeInterface */
    protected $scope;

    /**
     * @var array
     */
    protected $objects;

    /**
     * @var mixed
     */
    protected $currentObject;

    /**
     * @var array
     */
    protected $errorMessages = array();

    /**
     * @return array
     */
    public function getObjects()
    {
        return $this->objects;
    }

    /**
     * @param $objects
     * @return $this
     */
    public function setObjects($objects)
    {
        $this->objects = $objects;
        return $this;
    }

    /**
     * @param $object
     * @return $this
     */
    public function addObject($object)
    {
        $this->objects[] = $object;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentObject()
    {
        return $this->currentObject;
    }

    /**
     * @param mixed $currentObject
     * @return $this
     */
    public function setCurrentObject($currentObject)
    {
        $this->currentObject = $currentObject;
        return $this;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function validateCommand($command)
    {
        $isValid = true;

        if ($command instanceof ValidatorProviderInterface) {
            $validators = $command->getValidatorsSpecification();
            foreach ($validators as $validatorParams) {
                $validator = ValidatorFactory::create($validatorParams);
                if ($validator instanceof ContextAwareInterface) {
                    $validator->setContext($this);
                }

                if (!$validator->isValid($this->getCurrentObject())) {
                    $this->errorMessages = array_merge($this->errorMessages, $validator->getErrors());
                    $isValid = false;
                }
            }
        }

        return $isValid;
    }

    /**
     * @return mixed
     */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

    /**
     * @param ScopeInterface $scope
     * @return mixed
     */
    public function setScope(ScopeInterface $scope)
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return ScopeInterface
     */
    public function getScope()
    {
        return $this->scope;
    }
}