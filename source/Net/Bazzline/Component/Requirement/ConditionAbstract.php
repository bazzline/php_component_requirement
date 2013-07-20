<?php

namespace Net\Bazzline\Component\Requirement;

use InvalidArgumentException;
use SplObjectStorage;

/**
 * Class ConditionAbstract
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
abstract class ConditionAbstract implements IsMetInterface, ConditionInterface
{
    /**
     * @var \SplObjectStorage|IsMetInterface[]
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $items;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-20
     */
    protected $classMethodsPerItem;

    /**
     * Constructor of the class
     */
    public function __construct()
    {
        $this->items = new SplObjectStorage();
    }

    /**
     * {$inheritDoc}
     */
    public function addItem(IsMetInterface $item)
    {
        $this->items->attach($item);

        return $this;
    }

    /**
     * Magic call method to keep this class as generic as possible.
     *
     * @param string $methodName - name of the method
     * @param mixed $arguments - value
     * @return $this
     * @throws \InvalidArgumentException
     * @author sleibelt
     * @since 2013-06-25
     */
    public function __call($methodName, $arguments)
    {
        if (count($arguments) != 1) {
            throw new InvalidArgumentException(
                'Only one argument value should be provided.'
            );
        }
        $value = current($arguments);

        foreach ($this->items as $item) {
            if ($item instanceof \Net\Bazzline\Component\Requirement\ConditionInterface) {
                $item->$methodName($value);
            } else {
                //is array empty?
                // -> fill array
                //test in array
                //move to separate method
                $itemMethods = array_flip(get_class_methods($item));
                if (isset($itemMethods[$methodName])) {
                    $item->$methodName($value);
                    $this->addItem($item);
                }
            }
        }

        return $this;
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }
}
