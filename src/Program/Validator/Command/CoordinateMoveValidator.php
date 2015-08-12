<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 0:12
 */

namespace Nasa\Program\Validator\Command;

use Nasa\Model\Coordinate\CoordinateInterface;
use Nasa\Model\Coordinate\PositionProviderInterface;
use Nasa\Program\Context\ContextAwareInterface;
use Nasa\Program\Context\ContextInterface;
use Nasa\Program\Context\ScopeAwareInterface;
use Nasa\Program\Validator\AbstractValidator;
use Nasa\Program\Validator\ValidatorInterface;

/**
 * Class CoordinateMoveValidator
 * @package Nasa\Program\Validator\Command
 */
class CoordinateMoveValidator extends AbstractValidator implements ContextAwareInterface
{
    const INVALID_OBJECT_TYPE = 'INVALID_OBJECT_TYPE';
    const INVALID_SCOPE = 'INVALID_SCOPE';

    /**
     * @var array
     */
    protected $messages = array(
        self::INVALID_OBJECT_TYPE => 'Invalid object type',
        self::INVALID_SCOPE => 'Invalid scope',
    );

    /**
     * @var array
     */
    protected $errors = array();

    /** @var  ContextInterface */
    protected $context;

    /**
     * @param ContextInterface $context
     * @return mixed
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @param $object
     * @return bool
     */
    public function isValid($object)
    {
        $isValid = true;

        if (!$object instanceof PositionProviderInterface) {
            $this->addError(self::INVALID_OBJECT_TYPE);
            return $isValid;
        }

        // validate scope in context
        if ($this->context instanceof ScopeAwareInterface) {
            $scope = $this->context->getScope();
            if (!$scope->isValidScope($object->getPosition())) {
                $this->addError(self::INVALID_SCOPE);
                return false;
            }
        }

    }
}