<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 23:00
 */

namespace Nasa\Program\Interpreter;

use Nasa\Program\Command\CommandFactory;
use Nasa\Program\Command\Direction\CardinalRotateCommand;
use Nasa\Program\Interpreter\Exception\InvalidArgumentException;

/**
 * Интерпретатор простых программ вида: LMLMLMRMM
 * где L - повернуть налево, R - повернуть направа, M - передвинуться вперед
 *
 * Class SimpleMoveInterpreter
 * @package Nasa\Program\Interpreter
 */
class SimpleMoveInterpreter implements InterpreterInterface
{
    /**
     * @param mixed $value
     * @return array
     * @throws \Nasa\Program\Exception\InvalidWrapperClass
     */
    public function interpret($value)
    {
        $chars = str_split($value);

        $commands = array();
        foreach ($chars as $char) {
            $params = null;
            switch ($char) {
                case 'L':
                case 'R':
                    $type = 'direction-cardinalRotate';
                    $params = array(
                        'direction' => $char === 'L' ? CardinalRotateCommand::DIRECTION_LEFT : CardinalRotateCommand::DIRECTION_RIGHT
                    );
                    break;

                case 'M':
                    $type = 'move-move';
                    break;

                default:
                    throw new InvalidArgumentException("$char not in list (L,R,M)");
            }

            $command = CommandFactory::getCommand(array(
                'type' => $type,
                'options' => $params
            ));
            $commands[] = $command;
        }

        return $commands;
    }

}