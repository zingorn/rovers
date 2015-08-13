<?php
/**
 * 
 * User: zingorn
 * Date: 13.08.2015
 * Time: 11:01
 */

namespace Nasa\Program\Command\Move;

use Nasa\Program\Command\CommandInterface;
use Nasa\Program\Command\ValidatorProviderInterface;

/**
 * Команда передвижения
 * Данная команда требует от объекта расположение на системе координат и направление движения
 * По этим данным создает Команду Движения(Handler) для изменения положения объекта
 *
 * Class MoveCommand
 * @package Nasa\Program\Command\Move
 */
class MoveCommand implements CommandInterface, ValidatorProviderInterface
{
    /**
     * @var MoveHandlerFactory
     */
    protected $handlerFactory;

    /**
     * @param $object
     * @return mixed
     */
    public function execute($object)
    {
        $handler = $this->getHandlerFactory()->create($object);
        $handler->execute($object);
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

    /**
     * @return array
     */
    public function getValidatorsSpecification()
    {
        return array(
            array('type' => '\Nasa\Program\Validator\Command\MoveValidator'),
        );
    }
}