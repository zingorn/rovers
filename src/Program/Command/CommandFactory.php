<?php
/**
 * 
 * User: zingorn
 * Date: 12.08.2015
 * Time: 22:42
 */

namespace Nasa\Program\Command;

use Nasa\Program\Exception\InvalidArgumentException;
use Nasa\Program\Exception\InvalidWrapperClass;

/**
 * Фабрика команд для программы
 *
 * Class CommandFactory
 * @package Nase\Program
 */
class CommandFactory 
{
    /**
     * @param array $params
     * @return mixed
     * @throws InvalidWrapperClass
     */
    public static function getCommand(array $params)
    {
        if (!array_key_exists('type', $params)) {
            throw new InvalidArgumentException('Type key is required');
        }

        $options = isset($params['options']) && is_array($params['options']) ? $params['options'] : null;

        $names = preg_split('/[-]/', $params['type']);
        if (!$names) {
            throw new InvalidArgumentException('Invalid type key format');
        }
        $name = implode('\\', array_map('ucfirst', $names));

        $wrapperClass = 'Nasa\\Program\\Command\\' . $name . 'Command';
        if (!is_subclass_of($wrapperClass, 'Nasa\\Program\\Command\\CommandInterface')) {
            throw new InvalidWrapperClass("Class $wrapperClass must implements Nasa\\Program\\Command\\CommandInterface");
        }

        return new $wrapperClass($options);
    }
}