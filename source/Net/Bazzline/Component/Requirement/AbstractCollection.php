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
    }

    /**
     * {$inheritDoc}
     */
    public function getItems()
    {
        return $this->items;
    }
}