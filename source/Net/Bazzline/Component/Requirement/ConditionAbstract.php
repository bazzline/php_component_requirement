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
        $this->classMethodsPerItem = array();
    }

    /**
     * {$inheritDoc}
     */
    public function addItem(IsMetInterface $item)
    {
        $this->items->attach($item);
        $this->classMethodsPerItem = array();

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
            if ($item instanceof ConditionInterface) {
                $item->$methodName($value);
            } else {
                if ($this->itemSupportsMethodCall($item, $methodName)) {
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

    /**
     * Checks if item implements method name
     *
     * @param IsMetInterface $item
     * @param string $methodName
     * @return bool
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-07-20
     */
    protected function itemSupportsMethodCall(IsMetInterface $item, $methodName)
    {
        $itemHash = spl_object_hash($item);

        if (empty($this->classMethodsPerItem)) {
            $itemMethods = array_flip(get_class_methods($item));
            $this->classMethodsPerItem[$itemHash] = $itemMethods;
        }

        return (isset($this->classMethodsPerItem[$itemHash][$methodName]));
    }
}
