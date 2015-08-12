<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:02
 */
namespace Nasa\Program;

use Nasa\Model\Rover\RoverInterface;
use Nasa\Program\Command\CommandInterface;
use Nasa\Program\Context\ContextInterface;
use Nasa\Program\Context\ValidateCommandInterface;
use Nasa\Program\Interpreter\InterpreterInterface;
use Nasa\Program\Interpreter\SimpleMoveInterpreter;
use Nasa\Program\Validator\Exception\InvalidCommand;

/**
 * Конечная программа передвижениея ровера
 * По умолчанию читает строку вида: LMLMLMLMM и выполняет команды Direction\RotateCommand и Coordinate\MoveCommand
 *
 * Class MoveProgram
 * @package Nase\Program
 */
class MoveProgram implements ProgramInterface
{
    /**
     * @var ContextInterface
     */
    protected $context;

    /**
     * @var string
     */
    protected $input;

    /**
     * @var string
     */
    protected $output;

    /**
     * @var CommandInterface[]
     */
    protected $commands;

    /**
     * @var InterpreterInterface
     */
    protected $interpreter;

    /**
     * @var bool
     */
    protected $throwInvalidCommand = false;

    /**
     * @param RoverInterface $rover
     * @return $this
     */
    public function run(RoverInterface $rover)
    {
        $context = $this->getContext();

        $commands = $this->getCommands();
        $context->setCurrentObject($rover);

        /** @var CommandInterface $command */
        foreach ($commands as $command) {
            if ($context instanceof ValidateCommandInterface
                && !$context->validateCommand($command))
            {
                if ($this->isThrowInvalidCommand()) {
                    throw new InvalidCommand(get_class($command) . ' is invalid in this context. Reason: ' . $c);
                }
                continue;
            }
            $command->execute($rover);
        }

        $this->output = sprintf('%s %s', $rover->getPosition(), $rover->getDirection());
        return $this;
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param string $input
     * @return mixed
     */
    public function setInput($input)
    {
        $this->input = $input;
        return $this;
    }

    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        if ($this->commands === null) {
            $this->commands = $this->getInterpreter()->interpret($this->getInput());
        }
        return $this->commands;
    }

    /**
     * @param array $commands
     * @return $this
     */
    public function setCommands($commands)
    {
        $this->commands = $commands;
        return $this;
    }

    /**
     * @return InterpreterInterface
     */
    public function getInterpreter()
    {
        if ($this->interpreter === null) {
            $this->interpreter = new SimpleMoveInterpreter();
        }
        return $this->interpreter;
    }

    /**
     * @param InterpreterInterface $interpreter
     * @return $this
     */
    public function setInterpreter($interpreter)
    {
        $this->interpreter = $interpreter;
        return $this;
    }

    /**
     * @return ContextInterface
     */
    public function getContext()
    {
        return $this->context;
    }

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
     * @return boolean
     */
    public function isThrowInvalidCommand()
    {
        return $this->throwInvalidCommand;
    }

    /**
     * @param boolean $throwInvalidCommand
     * @return $this
     */
    public function setThrowInvalidCommand($throwInvalidCommand)
    {
        $this->throwInvalidCommand = $throwInvalidCommand;
        return $this;
    }
}