<?php

namespace Net\Bazzline\Component\Requirement;

use InvalidArgumentException;
use SplObjectStorage;

/**
 * Class ConditionAbstract
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-25
 */
abstract class AbstractCondition implements ConditionInterface
{
    /**
     * @var bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    private $isDisabled;

    /**
     * @var \SplObjectStorage|IsMetInterface[]
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-25
     */
    protected $items;

    /**
     * @var array
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-20
     */
    private $methodNamesPerItem;

    /**
     * @var bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    private $returnValueIfIsDisabled;

    /**
     * Constructor of the class
     */
    public function __construct()
    {
        $this->isDisabled = false;
        $this->items = new SplObjectStorage();
        $this->methodNamesPerItem = array();
        $this->setReturnValueIfIsDisabledToTrue();
    }

    /**
     * {$inheritdoc}
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
            if ($item instanceof ConditionInterface) {
                $item->$methodName($value);
            } else {
                if ($this->itemSupportsMethodCall($item, $methodName)) {
                    $item->$methodName($value);
                }
            }
        }

        return $this;
    }

    /**
     * {$inheritdoc}
     */
    public function getItems()
    {
        $items = array();

        foreach ($this->items as $item) {
            $items[] = $item;
        }

        return $items;
    }

    /**
     * @return $this
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    public function disable()
    {
        $this->isDisabled = true;

        return $this;
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    public function isDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * Checks if item implements method name
     *
     * @param IsMetInterface $item
     * @param string $methodName
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-07-20
     */
    protected function itemSupportsMethodCall(IsMetInterface $item, $methodName)
    {
        $hash = spl_object_hash($item);

        if (empty($this->methodNamesPerItem)
            || !isset($this->methodNamesPerItem[$hash])) {
            $itemMethods = array_flip(get_class_methods($item));
            $this->methodNamesPerItem[$hash] = $itemMethods;
        }

        return (isset($this->methodNamesPerItem[$hash][$methodName]));
    }

    /**
     * @return bool
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function getReturnValueIfIsDisabled()
    {
        return $this->isDisabled;
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function setReturnValueIfIsDisabledToFalse()
    {
        $this->returnValueIfIsDisabled = false;
    }

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    protected function setReturnValueIfIsDisabledToTrue()
    {
        $this->returnValueIfIsDisabled = true;
    }
}
