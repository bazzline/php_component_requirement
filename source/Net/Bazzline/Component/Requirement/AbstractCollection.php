<?php

namespace Net\Bazzline\Component\Requirement;

use SplObjectStorage;

/**
 * Class RequirementCollection
 *
 * @package Net\Bazzline\Component\Requirement
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-25
 * @todo move basic collection stuff to collection
 */
abstract class AbstractCollection implements IsMetInterface, CollectionInterface
{
    /**
     * @var \SplObjectStorage
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-25
     */
    protected $items;

    /**
     * {$inheritDoc}
     */
    public function addItem(IsMetInterface $item)
    {
        // @TODO how to deal with that check? put it in the constructor?
        if (is_null($this->items)) {
            $this->items = new SplObjectStorage();
        }
        $this->items->attach($item);
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

        foreach ($this->items as $item) {
            $itemMethods = array_flip(get_class_methods($item));
            if (isset($itemMethods[$methodName])) {
                $item->$methodName($value);
                $this->addItem($item);
            }
        }
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }
}