<?php

namespace Net\Bazzline\Component\Requirement;

use InvalidArgumentException;
use Net\Bazzline\Component\Lock\RuntimeLock;
use RuntimeException;
use SplObjectStorage;

/**
 * Class Requirement
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2013-06-25
 */
class Requirement implements RequirementInterface
{
    /** @var \SplObjectStorage|ConditionInterface[]|IsMetInterface[] */
    protected $conditions;

    /** @var \Net\Bazzline\Component\Lock\RuntimeLock */
    protected $lock;

    /** @var bool */
    protected $isDisabled;

    /** @var bool */
    private $returnValueIfIsDisabled;

    /**
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-06-25
     */
    public function __construct()
    {
        $this->conditions   = new SplObjectStorage();
        $this->isDisabled   = false;
        $this->lock         = new RuntimeLock();
        $this->lock->setName(get_class($this));
        $this->setReturnValueIfIsDisabledToTrue();
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
     * Validates if given requirement is met
     *
     * @return boolean
     * @throws \RuntimeException
     */
    public function __invoke()
    {
        return $this->isMet();
    }

    /**
     * {$inheritdoc}
     */
    public function addCondition(ConditionInterface $condition)
    {
        if ($this->lock->isLocked()) {
            throw new RuntimeException(
                'Requirement is locked, no new condition could be added.'
            );
        }

        $this->conditions->attach($condition);

        return $this;
    }

    /**
     * Validates if given requirement is met
     *
     * @return boolean
     * @throws \RuntimeException
     */
    public function isMet()
    {
        if ($this->isDisabled()) {
            return $this->getReturnValueIfIsDisabled();
        } else {
            if ($this->conditions->count() == 0) {
                throw new RuntimeException(
                    'No condition set in this requirement.'
                );
            }

            foreach ($this->conditions as $condition) {
                if (!$condition->isMet()) {
                    return false;
                }
            }

            return true;
        }
    }

    /**
     * {$inheritdoc}
     */
    public function isLocked()
    {
        return $this->lock->isLocked();
    }

    /**
     * {$inheritdoc}
     */
    public function lock()
    {
        $this->lock->acquire();

        return $this;
    }

    /**
     * {$inheritdoc}
     */
    public function isDisabled()
    {
        return $this->isDisabled;
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
     * @return null|ConditionInterface[]
     * @author stev leibelt <artodeto@bazzline.net>
     * @since 2013-09-29
     */
    public function getConditions()
    {
        $conditions = array();

        foreach ($this->conditions as $condition) {
            $conditions[] = $condition;
        }

        return $conditions;
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
