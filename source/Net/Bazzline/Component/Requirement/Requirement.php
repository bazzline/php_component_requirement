<?php

namespace Net\Bazzline\Component\Requirement;

use InvalidArgumentException;
use SplObjectStorage;

/**
 * Class Requirement
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 */
class Requirement implements RequirementInterface
{
    /**
     * @var \SplObjectStorage|ConditionInterface[]|IsMetInterface[]
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $conditions;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     * @todo how to avoid that?
     */
    public function __construct()
    {
        $this->conditions = new SplObjectStorage();
    }

    /**
     * {$inheritDoc}
     */
    public function addItem(IsMetInterface $item)
    {
        $collection = new AndCondition();
        $collection->addItem($item);
        $this->addCondition($collection);
    }

    /**
     * {$inheritDoc}
     */
    public function addCondition(ConditionInterface $collection)
    {
        $this->conditions->attach($collection);
    }

    /**
     * Magic call method to keep this class as generic as possible.
     *
     * @param string $methodName - name of the method
     * @param mixed $arguments - value
     * @throws InvalidArgumentException
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

        foreach ($this->conditions as $condition) {
            $condition->$methodName($value);
        }
    }

    /**
     * {$inheritDoc}
     */
    public function isMet()
    {
        foreach ($this->conditions as $condition) {
            if (!$condition->isMet()) {
                return false;
            }
        }

        return true;
    }
}