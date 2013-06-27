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
     * @var \SplObjectStorage
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $collections;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     * @todo how to avoid that?
     */
    public function __construct()
    {
        $this->collections = new SplObjectStorage();
    }

    /**
     * {$inheritDoc}
     */
    public function addItem(IsMetInterface $item)
    {
        $collection = new AndCollection();
        $collection->addItem($item);
        $this->addCollection($collection);
    }

    /**
     * {$inheritDoc}
     */
    public function addCollection(CollectionInterface $collection)
    {
        $this->collections->attach($collection);
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

        foreach ($this->collections as $collection) {
            $collection->$methodName($value);
        }
    }

    /**
     * {$inheritDoc}
     */
    public function isMet()
    {
        foreach ($this->collections as $collection) {
            if (!$collection->isMet()) {
                return false;
            }
        }

        return true;
    }
}