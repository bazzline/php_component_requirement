<?php

namespace Net\Bazzline\Component\Requirement;

use InvalidArgumentException;
use RuntimeException;
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
    public function addCondition(ConditionInterface $condition)
    {
        $this->conditions->attach($condition);
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

        foreach ($this->conditions as $condition) {
            $condition->$methodName($value);
        }

        return $this;
    }

    /**
     * {$inheritDoc}
     */
    public function isMet()
    {
        if ($this->conditions->count() == 0) {
            throw new RuntimeException('No condition set in this requirement.');
        }

        foreach ($this->conditions as $condition) {
            if (!$condition->isMet()) {
                return false;
            }
        }

        return true;
    }
}