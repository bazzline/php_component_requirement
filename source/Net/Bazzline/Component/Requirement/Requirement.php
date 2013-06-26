<?php

namespace Net\Bazzline\Component\Requirement;

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
     * Magic setter method to keep this class as generic as possible.
     *
     * @param string $name - property name
     * @param mixed $value - value of property
     * @author sleibelt
     * @since 2013-06-25
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
        $setterMethodName = 'set' . ucfirst($name);

        foreach ($this->collections as $collection) {
            foreach ($collection->getItems() as $item) {
                $itemMethods = array_flip(get_class_methods($item));
                if (isset($itemMethods[$setterMethodName])) {
                    $item->$setterMethodName($value);
                    $collection->addItem($item);
                }
            }
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